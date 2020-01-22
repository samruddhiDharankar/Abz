<?php
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $password1 = filter_input(INPUT_POST, 'password1');

    if (!empty($firstName)) {
        if(!empty($email)) {
            if(!empty($password1)) {
                $host = "localhost";
                $username = "root";
                $dbpassword = "";
                $dbname = "data";

                //DB connection
                $conn=new mysqli($host,$username,$dbpassword,$dbname);

                if(mysqli_connect_error()) {
                    die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
                }
                else {
                    $sql="INSERT INTO customer(firstName,lastName,email,password1) values ('$firstName','$lastName','$email','$password1')";
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