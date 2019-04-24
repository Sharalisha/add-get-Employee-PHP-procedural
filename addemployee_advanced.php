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
   
   $query = "SELECT w1673560_compCode FROM w1673560_company";
   $res = mysqli_query($conn, $query);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title> Add a New Employee </title>
      <style>
         input[type=text], select{
         padding: 5px 20px;
         border: 1px solid blue;
         border-radius: 5px;
         }
         input[type=email]{
         padding: 5px 20px;
         border: 1px solid blue;
         border-radius: 5px;
         }
         input[type=number]{
         padding: 5px 40px;
         border: 1px solid blue;
         border-radius: 5px;
         }
         form{
         border-style: solid;
         margin: 0 800px 0 40px;
         padding: 40px;
         background-color: #cbdaf2;
         }
         label{
         font-size: 19px;
         }
         button{
         background-color: #17263d;
         color: white;
         border-radius: 10px;
         padding: 10px;
         text-align: center;
         font-size: 15px;
         cursor: pointer;
         margin-right: 87px;
         }
         button:hover{
         background-color: #304970;
         color: white ;
         }
         h1{
         font-size: 30px; color: blue;
         }
         p{
         font-size: 19px;  
         }
      </style>
   </head>
   <body>
      <?php
         echo "  <h1>  <strong> Add a New Employee </strong></h1> ";
         echo "  <hr> ";
          
         echo "  <p> Fill the form below to add a new employee : </p> ";
         
         echo "  <form method=post action=getemployee.php autocomplete=off>";
          
         echo "  <label for=id> *Employee ID </label> &nbsp; &nbsp; &nbsp; &nbsp; ";  
         echo "  <input type=number name=empId required size=35> <br> <br>"; 
                
         echo "  <label for=name> *Full Name </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
         echo "  <input type=text name=fullName required size=25> <br> <br>";
         
         echo "  <label for=position> *Position </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
         echo "  <input type=text name=empPosition required size=25> <br> <br> ";
         
         echo "  <label for=email> *Email </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
         echo "  <input type=email name=empEmail required size=25> <br> <br>";
         
         echo "  <label for=cCode> *Company Code </label> &nbsp; &nbsp; ";
         echo "  <select name=companycode>";
         while($row = $res->fetch_assoc()) { 
         ?>
      <option value="<?php echo $row['w1673560_compCode']; ?>"><?php echo $row['w1673560_compCode']; ?></option>
      <?php }
         echo "   </select> <br> <br>  <br>";
         
         echo "   <button type=submit> Add Employee </button> &nbsp; &nbsp; ";
         echo "   <button type=reset> Clear Button </button>";
         echo "   </form> ";
         echo "   </body>";
         ?>
   </body>
</html>