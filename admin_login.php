<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Login</title>

   <link rel="stylesheet" type="text/css" href="mystyle.css">

</head>
<body>
   <div class="container">
      
      <h2>Admin Login Page</h2>
      <br>
      <form action="" method="post">
         <input class="ip" type="text" name="email" placeholder="Enter Email" required>
         <br>
         <input class="ip" type="password" name="password" placeholder="Enter Password" required>
         <br>

         <input class="btn" type="submit" name="submit" value="Submit">

      </form>

      
      
   </div>


   <?php

   session_start();// sessions are created to store vlaues and take them to another page. here we are storing email and name and displaying them on dashborad page

   if (isset( $_POST['submit'])){
      $con = mysqli_connect("localhost","root","","sms");

      $sql = "SELECT * FROM `login` WHERE `email` = '$_POST[email]'";
      $result = mysqli_query($con, $sql);
      while($row = mysqli_fetch_assoc($result)){

         if($row['email']==$_POST['email']){

            if($row['password']==$_POST['password']){
               $_SESSION['email'] = $row['email']; //storing values in session to be used later on dashboard page.
               $_SESSION['name'] = $row['name'];    
               header("Location:admin_dashboard.php");
            }
            else{
               echo "Wrong Password";
            }
         }
         else{
            echo "Wrong Email Id";
         }
      }
   }
   ?>
</body>
</html>