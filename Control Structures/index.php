<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Control Structures</title>
</head>
<body>


	<!-- Control Structures 
       if statement
       if else statment
       if else if statement
       switch

	-->
	<!-- Code Execution
       Sequential -> reading code from top to bottom

       Decision -> will read the code if you give a 
       condition

	 -->


	 <?php
        //Decision

        /*if statement
          if(condition){
	        code
          }
          if the condition is true it will execute the code. if not, it will skip the code

        */
         if(true){
         	echo "This code is executed";
         	echo "<br>";
         }


        /*if else statement
         if the condition is meet it will execute the code under if. if not, else code will be executed.
        */

         if (false){
         	echo "if else statement is true";
         }else {
         	echo "if else statement is false";
         	echo "<br>";
         }


         /*if else if statement

         if the first condition is meet it will execute the code under if statement. if not, it will check the condition of the next if statement.
         if no condition was met it will execute the else statement
         */

         if(true){
         	echo "if statement was met";
         }else if(false){
         	echo "first else if statement condition was met";

         }else {
         	echo "no condition are met";
         }
          echo "<br>";

          $condition = ['text'];
          $condition1 = false;
          //&& if there is false will execute false
          //|| if there is true, will execute true first
          //xor if one condition is contradicting, it will result true. if same true/true or false/false; it will result false

          if ($condition xor $condition1){
          	echo "true";
          }else {
          	echo "false";
          }

          echo "<br>";

          /*Switch*/

          $today = "sunday";

          switch ($today) {
          	case "sunday":
          	echo "Rest Day";
          	break;

          	case "tuesday":
          	echo "wash day";
          	break;

          	default:
          	echo "coding day";
          	break;
          }
          echo "<br>";

          //next line
            //continue- is scaping number in the condition
          for($i = 0; $i < 15; $i++){
              if($i == 6){
              	continue;
              }
              echo $i;
              echo "<br>";
          }

	  ?>

	
</body>
</html>