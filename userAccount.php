<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();

require 'config/config.php';
require 'config/db.php';

if (!$conn) {
    die(mysqli_error($conn));
}

for ($i = 0; $i < 100; $i++) {
    $email = $faker->email;
    $lastName = $faker->lastName;
    $firstName = $faker->firstName;
    $userName =
        strtolower($firstName) . '.' . strtolower($lastName) . rand(1, 100);
    $password = password_hash($faker->password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO useraccount (email, lastName, firstName, userName, password) 
            VALUES ('$email', '$lastName', '$firstName', '$userName', '$password')";

    mysqli_query($conn, $sql);
}

?>
