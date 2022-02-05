Note ::
1. Given task is done with core php and MYSQL
2. Composer have been used to handle the dependencies 
3. Twig have been used for template
4. Bootstrap have been used for Admin and frontend
5. All the html files are inside the views folder, admin backend is in admin folder and backend for frontpage is in root folder
6. For Twig dependency run command "composer install"

//For Database connection and table creation
1. Create a database and add the database name in connection.php file in root folder.
2. After adding database name in connection.php go to url "http://localhost/kotukosecond/table.php" to create table

//For Admin panel
1. Go to url "http://localhost/kotukosecond/admin/display.php" 
2. All the books will be listed there with update and delete feature.
3. To create a new book click on create button on top.

//For Frontend
1. Go to url "http://localhost/kotukosecond/index.php"
2. All the books added from admin panel is listed there and details can be viewed by clicking on book title
