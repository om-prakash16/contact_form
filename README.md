# PHP Contact Form - Beauty Salon

This is a PHP-based contact form for a beauty salon. It allows visitors to send inquiries to the salon owner.

### Required


- PHP server
- MySQL database
- Web server (like Apache)


### Features

- Simple HTML form with fields for Full Name, Phone Number, Email, Subject, and Message.
- Backend validation in Pure PHP (no JavaScript).
- MySQL database integration to store form submissions.
- Email notifications sent to the site owner on successful submission.
- Prevents duplicate submissions by avoiding page refresh.

### Setup Instructions

1. **Database Setup:**

   - Create a MySQL database with the name `om`.
   - Import the `contact.sql` file provided in the project directory to create the `contact` table.




2. **Server Configuration: **

   - Ensure your PHP server (e.g., Apache) is running.
   - Place the project files in your web server's root directory (e.g., htdocs for XAMPP).
   - Configure the database connection by updating the following lines in index.php:

     ```php
     $servername = 'localhost';
     $username = 'root';
     $password = '';
     $dbname = "om";
     ```

3. **Usage:**

   - Visit the project in your web browser (e.g., `http://localhost/ Beauty_Salon`).
   - Fill out the contact form and submit it.
   - Validations will check for required fields, email format, phone number format, and more.
   - Successful submissions will be stored in the database, and an email notification will be sent to the salon owner.

### Submission Guidelines

- Provide all the necessary PHP, HTML, and SQL code files.
- Include this README file explaining how to set up the database and run the application.

### Notes

- This project uses only Core PHP, with no external frameworks or libraries.
- JavaScript is not used in this assessment, as specified.

