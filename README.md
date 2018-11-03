# College CMS

## Introduction
A minimal CMS for college management. It's done as a part of a learner project to understand various concept of PHP, OOP-PHP, Javascript, HTML5, CSS3, Bootstrap, MySQL and general workflow.

## Languages Used
1. PHP [OOP-Style]
2. Javascript
3. HTML5

## Styling
1. CSS3

## Frameworks
1. Bootstrap

## Functionalities Implemented
1. Admin Section:
    1. Add Students
    2. Delete Students
    3. Add Subjects
    4. Delete Subjects
    5. Add Courses
    6. Delete Courses
    7. Update Student Marks
    8. Declare Results for Student

2. Student Section:
    1. Register
    2. Verify Account
    3. Login
    4. Update Information
    5. See Result

3. Browse:
    1. Home with Slider Images
    2. About
    3. Facilities [use of lightbox for image showcasing]
    4. Campus Event
    5. Contact Admin
    6. Career Enquiry

## Steps
1. Go to app/config->config.php
2. Put your DB_NAME, DB_USER, DB_PASSWORD, DB_HOST, URLROOT.
3. Put the directory into htdocs folder of XAMPP, WAMP, MAMP, etc.
4. Go to public/db and import the db file to phpmyadmin directly. No need to create new database.
5. Go to http://localhost/ccms/ to run the app.

## Future Functions
1. HTML Editor - tinymice [for updating frontend pages]
2. Zone Wise Time Info to be displayed for student [in results say]
3. Google Location [in About Section]
4. Google reCaptcha
5. Star Rating [In Events + College Rating]
6. SMS section [Mass SMS to all students] - Admin Panel

## Note
 You will have to edit .htaccess file in public folder if you're deploying it anywhere else. Currently, Rewrite is /shareposts/public which means it is accessing shareposts/public folder of htdocs. Change it according to your server.