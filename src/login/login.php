<?php
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (!empty($firstName)) {
        if(!empty($email)) {
            if(!empty($password)) {
                $host = "localhost";
                $username = "root";
                $dbpassword = "";
                $dbname = "login";

                //DB connection
                $conn=new mysqli($host,$username,$dbpassword,$dbpassword);

                if(mysqli_connect_error()) {
                    die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
                }
                else {
                    $sql="INSERT INTO customer(firstName,lastName,email.password) values ('$firstName','$lastName','$email','$password')";
                    if($conn->query($sql)) {
                        echo "record inserted successfully";
                    }
                    else {
                        echo "error ". $sql ."<br>". $conn->error;
                    }
                    $conn->close();
                }
            }
            else {
                echo "password cannot be empty ";
            }
        }
        else {
            echo "email cannot be empty ";
        }
    }
    else {
        echo "first name cannot be empty ";
        die();
    }

    
?>