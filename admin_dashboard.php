<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>
   <link rel="stylesheet" href="mystyle2.css">

   <?php
   session_start();  // sessions are created to store vlaues and take them to another page. here we are storing email and name and displaying them on dashborad page

   $con = mysqli_connect("localhost","root","","sms");
   ?>

</head>
<body>
   <section class="header"> 
      <h1> Student Management   System <span><a href="logout.php"> Logout</a></span>
      </h1> 
      <br>
      <br>
      Name:<?php echo $_SESSION['name'];?> &nbsp Email: 
      <?php echo $_SESSION['email'];?>

   </section>
   <div class="container">
      <div class="left_container">
         <form action="" method="post">
            <ul>
               <li>
                  <input class="btn" type="submit" name="search_student" value="Search Student">
               </li>
               <li>
                  <input class="btn" type="submit" name="edit_student" value="Edit Student">
               </li>
               <li>
                  <input  class="btn"type="submit" name="add_new_student" value="Add New Student">
               </li>
               <li><input class="btn" type="submit" name="delete" value="Delete"></li>
            </ul>
         </form>
      </div>
      <div class="right_container">
       
         <?php
            if(isset($_POST['search_student']))
            {
               ?>
               <form action="" method="post"> 
                  Roll No:<input class="ip"type="text" name="roll_no"placevalue="Enter the Roll No">
                  <input class="btn"type="submit" name="search_by_roll_no_for_search" value="Search">
                      
               </form>
               <?php
            }
            if(isset($_POST['search_by_roll_no_for_search']))
            {
               $sql = "SELECT * FROM `students` WHERE `roll_no` = '$_POST[roll_no]'";
               $result = mysqli_query($con, $sql);
               while($row = mysqli_fetch_assoc($result)){
                  ?>  
                  
                  <table>
                     <tr>
                           <td>Roll No:</td>&nbsp <td><input class="info" type="text" value="<?php echo $row['roll_no']; 
                           ?>"disabled></td>
                     </tr>
                     <tr>
                           <td>Name:</td>&nbsp &nbsp<td><input class="info" type="text" value="<?php echo $row['name']; 
                           ?>"disabled></td>
                     </tr>
                     <tr>
                           <td>Class:</td>&nbsp &nbsp<td><input class="info" type="text" value="<?php echo $row['class']; 
                           ?>"disabled></td><br>
                     </tr>
                     <tr>   
                           <td>Email:</td>&nbsp &nbsp<td><input class="info" type="text" value="<?php echo $row['email']; 
                           ?>"disabled></td><br>
                     </tr>
                     <tr>
                           <td>Remarks:</td> <td><input class="info" type="text" value="<?php echo $row['remarks']; 
                           ?>"disabled></td><br>
                     </tr>      
                  </table>
                    
                  <?php
               }
            }

         ?>
            <?php   
            if(isset($_POST['edit_student']))
            {
               ?>
               <form action="" method="post"> 
                  Roll No:<input class="ip"type="text" name="roll_no"placevalue="Enter the Roll No">
                  <input class="btn"type="submit" name="search_by_roll_no_for_edit" value="Search">
                      
               </form>
               <?php
            }
            if(isset($_POST['search_by_roll_no_for_edit']))
            {
               $sql = "SELECT * FROM `students` WHERE `roll_no` = '$_POST[roll_no]'";
               $result = mysqli_query($con, $sql);
               while($row = mysqli_fetch_assoc($result)){
                  ?>  
                  <form action="admin_edit_student.php" method="post">
                     <table>
                        <tr>
                              <td>Roll No:</td>&nbsp <td><input class="info" type="text" name="roll_no" value="<?php echo $row['roll_no']; 
                              ?>"></td>
                        </tr>
                        <tr>
                              <td>Name:</td>&nbsp &nbsp<td><input class="info" type="text" name="name" value="<?php echo $row['name']; 
                              ?>"></td>
                        </tr>
                        <tr>
                              <td>Class:</td>&nbsp &nbsp<td><input class="info" type="text" name="class" value="<?php echo $row['class']; 
                              ?>"></td><br>
                        </tr>
                        <tr>   
                              <td>Email:</td>&nbsp &nbsp<td><input class="info" type="text" name="email" value="<?php echo $row['email']; 
                              ?>"></td><br>
                        </tr>
                        <tr>
                              <td>Remarks:</td> <td><input class="info"name="remarks" type="text" value="<?php echo $row['remarks']; 
                              ?>"></td><br>
                        </tr>      
                     </table>
                     <br>
                     <input class="btn" type="submit" name="edit_save" value="Save">
                   </form>
                  <?php
               }
            }
         ?>
         <?php
            if(isset($_POST['add_new_student'])){
               ?>
               <h3> Fill the given details </h4>
               <form class="add_details" action="add_student.php" method="post">
                  <table>
                     <tr>
                        <td>
                           Roll No:
                         </td>
                         <td>
                           <input type="text" name="roll_no" required>
                         </td>  
                     </tr>
                     <tr>
                        <td>
                           Name:
                         </td>
                         <td>
                           <input type="text" name="name" required>
                         </td>  
                     </tr>
                     <tr>
                        <td>
                           Class:
                         </td>
                         <td>
                           <input type="text" name="class" required>
                         </td>  
                     </tr>
                     <tr>
                        <td>
                           Email:
                         </td>
                         <td>
                           <input type="text" name="email" required>
                         </td>  
                     </tr>
                     <tr>
                        <td>
                           Password:
                         </td>
                         <td>
                           <input type="text" name="password" required>
                         </td>  
                     </tr>
                     <tr>
                        <td>
                           Remarks:
                         </td>
                         <td>
                           <input type="text" name="remarks" >
                         </td>  
                     </tr>
                     <br>
                     <tr>
                        <td> 
                           <input class= "btn" type="submit" name="add_student" value="Add Student">
                        </td>
                     </tr>
                  </table>
            </form>
                  <?php
            }
         ?>
         <?php
         if(isset($_POST['delete'])){
            ?>
            <h4> Enter Roll no to Delete Student</h4><br>
              <form action="delete_student.php" method="post"> 
                  Roll No:<input class="ip"type="text" name="roll_no">
                  <input class="btn"type="submit" name="delete" value="Delete">
                      
               </form>
               <?php
         }

         ?>
      </div>
   </div>
</body>
</html>