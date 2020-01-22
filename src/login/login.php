<?php
$email = $_POST['email'];
$password1 = $_POST['password1'];
//to prevent mysql injection
$email = stripcslashes($email);
$password1 = stripcslashes($password1);

// $email = mysql_real_escape_string($email);
// $password1 = mysql_real_escape_string($password1);

//DB connection
$host = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "data";

// mysqli_connect("localhost", "root", "");
// mysqli_select_db("data");
$conn=new mysqli($host,$username,$dbpassword,$dbname);


//query

// if ($result = $conn -> query("select * from customer where email='$email' and password1='$password1'") {
//     // echo "Returned rows are: " ;
//     // Free result set
//     mysqli_free_result($result);
//   }
  

// $sql="select * from customer where email='$email' and password1='$password1'";
//     if($conn->query($sql)) {
//         echo "login successfully";
//     }
//     else {
//         echo "error ". $sql ."<br>". $conn->error;
//     }
// $conn->close();
// $query = $conn->prepare("select * from customer where email='$email' and password1='$password1'");
// // $query = "select * from customer where email='$email' and password1='$password1'";
// $results = mysql_query($dbname,$query);
// $row = mysql_num_rows($results);
// if($row['email'] == $email && $row['password1'] == $password1 ) {
//     echo "login successful welcome ";
// }
// else {
//     echo "failed to login";
// }

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password1 = md5($_POST['password1']);
  $stmt = $conn->prepare("SELECT email, password1 FROM customer WHERE email=? AND  password1=? LIMIT 1");
  $stmt->bind_param('ss', $email, $password1);
  $stmt->execute();
  $stmt->bind_result($email, $password1);
  $stmt->store_result();
  if($stmt->num_rows == 1)  //To check if the row exists
      {
          while($stmt->fetch()) //fetching the contents of the row

            {$_SESSION['password1'] = $password1;
             $_SESSION['email'] = $email;
             echo 'Success!';
             exit();
             }
      }
      else {
          echo "INVALID USERNAME/PASSWORD Combination!";
      }
      $stmt->close();
  }
  else 
  {   

  }

?>