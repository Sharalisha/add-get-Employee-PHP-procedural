<!DOCTYPE html>
<html>
   <head>
      <style>
         h1{
         font-size: 30px; color: blue;
         }
         p, tr{
         font-size: 19px;  
         }
      </style>
   </head>
   <?php
      $dbServername = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      
      $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword); //db connection is made
      if (!$conn)
      {
      	die('Could not connect: ' . mysql_error());
      }
      mysqli_select_db ($conn, "sharalisha_w1673560"); 
      
      echo "<body>";
      $pagename="New Employee Confirmation";
      echo "<title>".$pagename."</title>";
      echo "<h1>".$pagename."</h1>";
      echo "   <hr> ";
          
      //capture the value inserted in the form's fields and posted through here
      $empId=$_POST['empId'];
      $empfullName=$_POST['fullName'];
      $empPosition=$_POST['empPosition'];
      $empEmail=$_POST['empEmail'];
      $companyCode=$_POST['companycode'];
      
      //checking if all the mandatory fields are filled
      if (empty($empId) || empty($empfullName) || empty($empPosition) || empty($empEmail) || empty($companyCode)){
      	echo "<p>Please ensure all mandatory fields are filled in!";
      }else{
      $query="insert into w1673560_employee (w1673560_empId,w1673560_empFullName,w1673560_empPosition,w1673560_empEmail,w1673560_compCode) values('$empId','$empfullName','$empPosition','$empEmail','$companyCode')";
          $result=mysqli_query($conn,$query);
      	if ($result){ 
              
      echo "<body>";  
      echo "<p>Your new employee has been added successfully</p>";
      echo "<table border=0 cellpadding=9>";
      echo "<tr><td><strong> *Added employee id: </strong></td>";
      echo "<td>$empId</td></tr>";
      echo "<tr><td> <strong> *Added full name: </strong></td>";
      echo "<td>$empfullName</td></tr>";
      echo "<tr><td> <strong> *Added position: </strong></td>";
      echo "<td>$empPosition</td></tr>";
      echo "<tr><td> <strong> *Added email: </strong></td>";
      echo "<td>$empEmail</td></tr>";
      echo "<tr><td> <strong> *Added company code: </strong></td>";
      echo "<td>$companyCode</td></tr>";
      echo "</body>";  
      	}
            // else check individual error codes and display appropriate message
      else
      	{
      		echo "<p>There is an error with the employee detailsyou entered.";
      		//error code for breach of PK constraint
      		if (mysqli_errno($conn)==1062){
      			echo "<br>The value entered for the new employee ID is already used, Please re-enter another value";
      		}
      		//error code for breach of FK constraint, this is not really needed as its adrop down list for company code selection. 
      		if (mysqli_errno($conn)==1452)
      		{
      			echo "<br>The value entered for the company code is not valid 
      			as it does not reference an existing value. Please re-enter.";
      		}
      		
      		//error code for inserting values that is not a valid number in company code, 
      		if (mysqli_errno($conn)==1054){
      			echo "<br>Value entered for the company code is not valid. Please re-enter.";			
      		}
      		
      		//error code for inserting character that is problematic for SQL query
      		if (mysqli_errno($conn)==1064){
      			echo "<br>Values entered for the employee details are not valid. Please re-enter.";			
      		}
      		
      	}
      }
      echo "</body>";
      ?>
</html>