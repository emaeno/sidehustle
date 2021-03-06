<?php

    if (isset($_POST["submit"])) {
        
        session_start();
        
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["gender"] = $_POST["gender"];

    }

// define variables and set to empty values
    $nameErr = $emailErr = $genderErr = "";
    $name = $email = $gender = "";
         
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        }else {
            $name = test_input($_POST["name"]);
        }
            
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        }else {
            $email = test_input($_POST["email"]);
               
// check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            }
        }
               
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        }else {
            $gender = test_input($_POST["gender"]);
            }
        }
         
         function test_input($data) {
            $data = htmlspecialchars($data);
            return $data;
        }
?>

<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body>
     
      <h2><b>WEB DESIGN TUTORIAL</b></h2>

      <p><i>Please enter your details to sign up for your tutorial.</i></p>
      
      <p><span class = "error">* required field.</span></p>
          
      <form method = "post" action = "welcome.php">
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
                                  
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
				
            <td>
               <input type = "submit" name = "submit" value = "sign up"> 
            </td>
				
         </table>
			
      </form>
   
   </body>
</html>