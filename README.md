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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1,
        h2,
        h3 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Job Application Form</h1>

        <h2>Overview</h2>
        <p>This project is a simple web application that allows users to submit job applications online. It's built
            using Laravel, HTML, CSS, Bootstrap, and JavaScript.</p>

        <h2>Features</h2>
        <ul>
            <li>User-friendly interface designed with HTML, CSS, and Bootstrap.</li>
            <li>Backend validation and security measures implemented using Laravel.</li>
            <li>MySQL database integration for storing job application data.</li>
            <li>File upload functionality with a maximum file size of 2 MB, restricted to PDF files.</li>
        </ul>

        <h2>Installation</h2>
        <ol>
            <li>Clone the repository to your local machine.</li>
            <li>Install project dependencies using Composer.</li>
            <li>Configure the database settings in the <code>.env</code> file.</li>
            <li>Run database migrations using <code>php artisan migrate</code>.</li>
            <li>Serve the application using <code>php artisan serve</code>.</li>
        </ol>

        <h2>Usage</h2>
        <ol>
            <li>Access the application in your web browser.</li>
            <li>Fill out the job application form with your details.</li>
            <li>Upload your resume in PDF format.</li>
            <li>Submit the form and wait for confirmation.</li>
        </ol>

        <h2>Contributing</h2>
        <p>Contributions to the project are welcome! If you'd like to contribute, fork the repository, make your
            changes, and submit a pull request.</p>

        <h2>License</h2>
        <p>This project is licensed under the MIT License.</p>

        <h2>Contact</h2>
        <p>Feel free to reach out with any questions or feedback! You can contact me at <a href="mailto:youremail@example.com">your email</a> or connect with me on <a href="#">social media platform</a>.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
