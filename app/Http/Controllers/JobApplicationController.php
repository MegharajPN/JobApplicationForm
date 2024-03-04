<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobApplicationController extends Controller
{
    public function submitForm(Request $request)
    {


        try {
        // Start a database transaction
        DB::beginTransaction();

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required',
            'role' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048', // Max file size is 2MB
            'company.*' => 'nullable|string',
            'position.*' => 'nullable|string',
            'fromDate.*' => 'nullable|date',
            'toDate.*' => 'nullable|date|after_or_equal:fromDate.*',
            'location.*' => 'nullable|string',
            'degree.*' => 'required|string',
            'field.*' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Serialize workExperience and education fields
        $workExperience = [];
        $education = [];

        if($request->input('company') != null){
            for ($i=0; $i < count($request->input('company')); $i++) { 
                $workExperience[] = [
                    'company' => $request->input('company')[$i],
                    'position' => $request->input('position')[$i],
                    'fromDate' => $request->input('fromDate')[$i],
                    'toDate' =>  $request->input('toDate') ? $request->input('toDate')[$i] :null,
                ];
            }
        }
        
        for ($i=0; $i < count($request->input('degree')); $i++) { 
            $education[] = [
                'degree' => $request->input('degree')[$i],
                'field' => $request->input('field')[$i],
            ];
        }

        // Store the uploaded file
        $file = $request->file('file');
        $filename = uniqid() . '_' . $file->getClientOriginalName();  // Generate a unique filename for the uploaded file
        $filePath = $file->storeAs('public', $filename); // Store the file in the storage/app/public directory
        $filePath  = env('APP_URL').'/storage/'.$filename;

        // Prepare data for saving to the database
        $data = $request->only(['firstName', 'lastName', 'email', 'mobile', 'address','role']);
        $data['file'] = $filePath;
        $data['workExperience'] = json_encode($workExperience);
        $data['education'] = json_encode($education);

        // Save the form data to the database
        $jobApplication = new JobApplication();
        $jobApplication->fill($data);
        $jobApplication->save();

        // Commit the transaction
        DB::commit();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (ValidationException $e) {
            // Rollback the transaction
            DB::rollBack();

            // Redirect back with validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Log the error
            logger()->error('Error submitting form: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'An error occurred while submitting the form. Please try again later.');
        }
    }
}
