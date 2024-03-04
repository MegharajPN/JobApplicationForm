<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            max-width: 100%;
            /* margin: 25px auto; */
        }

        #jobApplicationForm {
            margin-top: 55px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col" style="display: flex;justify-content: center;align-items: center;background:ghostwhite">
                <img width="500px" height="500px" alt="logo"
                    src="https://devskyshine2.skyshine.in/wp-content/uploads/2022/08/sky-logo.png"></img>
            </div>
            <div class="col" style="height: 100vh;overflow-y:scroll">
                <h2 style="text-align:center;margin-top:20px;">Job Application Form</h2>


                <form id="jobApplicationForm" class="needs-validation" novalidate action="{{ route('submitForm') }}"
                    method="post" enctype="multipart/form-data">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="firstName">First Name</label>
                                <input name="firstName" type="text" class="form-control" id="firstName"
                                    pattern="[A-Za-z]+" title="Only alphabets are allowed" required>
                                <div class="invalid-feedback">Please provide a first name.</div>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName">Last Name</label>
                                <input name="lastName" type="text" class="form-control" id="lastName"
                                    pattern="[A-Za-z]+" title="Only alphabets are allowed" required>
                                <div class="invalid-feedback">Please provide a last name.</div>
                            </div>
                            <div class="col-sm-12 pt-3">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email" required
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                    title="Please enter a valid email address">
                                <div class="invalid-feedback">Please provide a valid email.</div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="mobile">Mobile</label>
                                <input name="mobile" type="text" class="form-control" id="mobile"
                                    pattern="[0-9]{10}"title="Please enter 10 digits mobile number" required>
                                <div class="invalid-feedback">Please provide a mobile number.</div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" id="role" required>
                                    <option value="">Select a role</option>
                                    <option value="Trainee">Trainee</option>
                                    <option value="SDE1">SDE1</option>
                                    <option value="SDE2">SDE2</option>
                                    <option value="Technical Manager">Technical Manager</option>
                                </select>
                                <div class="invalid-feedback">Please select a role.</div>
                            </div>

                            <div class="col-sm-8 pt-3">
                                <label for="file">Upload Resume (PDF only)</label>
                                <input name="file" class="form-control" type="file" id="file" accept=".pdf"
                                    required>
                                <div class="invalid-feedback">Please upload a PDF file.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" name="workExperience" id="workExperienceFields">
                        <div class="row">
                            <div class="col-sm-6 pt-3">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" name="company[]" required>
                                <div class="invalid-feedback">Please provide a company name.</div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="position">Position</label>
                                <input type="text" class="form-control" name="position[]" required>
                                <div class="invalid-feedback">Please provide a position.</div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="fromDate">From Date</label>
                                <input type="date" class="form-control fromDate" name="fromDate[]" required>
                                <div class="invalid-feedback">Please provide a start date.</div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="toDate">To Date</label>
                                <input type="date" class="form-control toDate" name="toDate[]" required>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="currentCompany"
                                        onchange="toggleToDate(this)">
                                    <label class="form-check-label" for="currentCompany">Currently Working</label>
                                </div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" required>
                                <div class="invalid-feedback">Please provide a location.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 pt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="noWorkExperince">
                                    <label class="form-check-label" for="noWorkExperince">
                                        I have no work experience
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" id="addExperience">Add Work Experience</button>

                    <div class="form-group" name="education" id="educationFields">
                        <div class="row">
                            <div class="col-sm-6 pt-3">
                                <label for="degree">Degree / Diploma</label>
                                <input type="text" class="form-control" name="degree[]" required>
                                <div class="invalid-feedback">Please provide a degree or diploma.</div>
                            </div>
                            <div class="col-sm-6 pt-3">
                                <label for="position">Field</label>
                                <input type="text" class="form-control" name="field[]" required>
                                <div class="invalid-feedback">Please provide a field of study.</div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="addEducation">Add Education</button>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 pt-3">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3" required></textarea>
                                <div class="invalid-feedback">Please provide an address.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="submitForm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            $('#addExperience').click(function() {
                var experienceFields = `
                    <div class="row">
                        <div class="col-sm-6 pt-3">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company[]" required>
                            <div class="invalid-feedback">Please provide a company name.</div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position[]" required>
                            <div class="invalid-feedback">Please provide a position.</div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <label for="fromDate">From Date</label>
                            <input type="date" class="form-control fromDate" name="fromDate[]" required>
                            <div class="invalid-feedback">Please provide a start date.</div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <label for="toDate">To Date</label>
                            <input type="date" class="form-control toDate" name="toDate[]" required>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="currentCompany"
                                    onchange="toggleToDate(this)">
                                <label class="form-check-label" for="currentCompany">Currently Working</label>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" required>
                            <div class="invalid-feedback">Please provide a location.</div>
                        </div>
                    </div>
                `;
                $('#workExperienceFields').append(experienceFields);
            });

            $('#addEducation').click(function() {
                var educationFields = `
                    <div class="row">
                        <div class="col-sm-6 pt-3">
                            <label for="degree">Degree / Diploma</label>
                            <input type="text" class="form-control" name="degree[]" required>
                            <div class="invalid-feedback">Please provide a degree or diploma.</div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <label for="position">Field</label>
                            <input type="text" class="form-control" name="field[]" required>
                            <div class="invalid-feedback">Please provide a field of study.</div>
                        </div>
                    </div>
                `;
                $('#educationFields').append(educationFields);
            });

            $('#submitForm').click(function() {
                var form = $('#jobApplicationForm')[0];
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });

            // Custom validation for file input
            $('#file').change(function() {
                var fileInput = $(this)[0];
                var fileName = fileInput.files[0].name;
                var idxDot = fileName.lastIndexOf(".") + 1;
                var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                if (extFile !== "pdf") {
                    alert("Only PDF files are allowed!");
                    $(this).val('');
                }
            });

            // Function to toggle work experience fields based on the checkbox state
            $('#noWorkExperince').change(function() {
                var isChecked = $(this).is(':checked');
                var workExperienceFields = $('#workExperienceFields').find('input, select, textarea');
                workExperienceFields.prop('disabled', isChecked);
                if (isChecked) {
                    workExperienceFields.val('');
                    $('#addExperience').prop('disabled', isChecked)
                    workExperienceFields.removeAttr('required');
                } else {
                    $('#addExperience').prop('disabled', isChecked)
                    workExperienceFields.attr('required', 'required');
                }
            });

            // Event listener to update "To Date" field when "From Date" field changes
            $('#jobApplicationForm').on('change', '.fromDate', function() {
                var toDateInput = $(this).closest('.row').find('.toDate');
                toDateInput.attr('min', $(this).val());
                toDateInput.val('');
            });
        });

        function toggleToDate(checkbox) {
            var toDateInput = $(checkbox).closest('.col-sm-6').find('.toDate');
            toDateInput.prop('disabled', checkbox.checked);
            if (checkbox.checked) {
                toDateInput.val('');
                toDateInput.removeAttr('required');
            } else {
                toDateInput.attr('required', 'required');
            }
        }
    </script>
</body>

</html>
