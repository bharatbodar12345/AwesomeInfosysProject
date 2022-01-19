<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database="your_db_name";
 
$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$create_Employees_table_query="CREATE TABLE `$database`.`employees` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , `contact_no` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$create_Employees_table=mysqli_query($conn,$create_Employees_table_query);

$create_Users_table_query="CREATE TABLE `$database`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$create_Users_table=mysqli_query($conn,$create_Users_table_query);
 
?>