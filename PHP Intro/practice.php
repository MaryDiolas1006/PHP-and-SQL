<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Practice Intro PHP</title>
</head>
<body>

	<?php 
     $variable_name = 'Mary';

     echo "Hello {$variable_name}. How are You?";
     echo "<br>";

     $friends = [
         ['TingSheng', 30],
         ['Zest', 32],
         ['Eefy', 33]

	   ];

	   foreach($friends as $friend){

	   	echo "$friend[0] ";
	   }
	   echo '<br>';

         

         //associative
	   $profile = [
         
         'name' => 'TingSheng',
         'age' => 30,
         'hobby' => "coding"
 
	   ];
        
        function person ($name, $age, $hobby ) {

        	?>
        	<ul>
        		<li>He is <?php echo $name ?>. He is <?php echo $age ?> years old. His hobby is <?php echo $hobby ?>.</li>
        	</ul>

        	<?php
        }

        person($profile['name'], $profile['age'], $profile['hobby']);

         echo "<br>";
           
           //using foreach loop
          $my_array = ["Mary", "TingSheng", "Zest"];

          echo "<h1>My Girlfriend is $my_array[0]</h1>";
          echo "<h1>My Boyfriend is $my_array[1]</h1>";
          echo "<h1>And My friend is $my_array[2]</h1>";

          foreach($my_array as $arr){

          	echo "<h4>$arr is adventurous</h4>";

          }
            echo "<br>";

           $fruits = ["apple", "banana", "mango"];

           foreach($fruits as $fruit){

           	echo $fruit;
           	echo "<br>";
           }

	?>
	
</body>
</html>