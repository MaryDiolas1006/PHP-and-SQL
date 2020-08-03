<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Intro</title>
</head>
<body>

	<h1>Welcome to PHP introduction</h1>

    <!-- delimiter php code syntaxt < ? opening  ?> closing  --> 
	<?php echo "this is my first php statement"; ?>

	<h4>This is html code</h4>

	<?php echo '<h2>Hello!</h2>'; ?>

	<!-- Multiple php statement inside one delimiter -->
     <!--two way writing php  -->
	<?php 
	echo '<h3>Echoed</h3>';
	echo( '<p> Another php staments </p>'); 
	?>


	<!-- Comments in PHP -->

  <?php

  // Declare variable
  $variable_name = 'value';

  // using/accessing variable
  echo $variable_name;

	 // updating variables

	$variable_name = 'new_value';
	echo $variable_name;

	//deleting/unsetting variable
	unset($variable_name);
	echo $variable_name;
	echo '<br>';


	// Rules
	/*should start using dollor sign and followed by alphabet*/

  // $name
  // $1
  // no spaces in between
  //use underscore instead
 // $variable_name;


//Data Types
	//Integer
	   //whole number
	// -3, -2, -1, 1, 2, 3, 5, 7, 8
	echo 100000;
	echo '<br>';

	//Float
	   //decimal numbers
	   // double or real numbers
	$total_money = 5000.98e2;
	echo $total_money;
	echo '<br>';


	//String

	   //text
	//enclosed in single or double qutation

	   echo "Hello";
	   echo 'Hi';
	   echo '<br>';

	   //concatenation
	   $name = "Mary";
	   echo "Hello! I am" . $name;

	   echo '<br>';
       
       //other way of concatenation
	   echo "Hello $name";
	     echo '<br>';
	   //or better to use this way with brakets
	    echo "Hello {$name}";
	    echo '<br>';


	//Boolean

	    //true
	    //false

	   $is_admin = true;
	   echo $is_admin;

	   //using for debugging
	   // var_dump($is_admin);

	   //or die and dump
	   // die(var_dump(2, "text", 3.99));//integer
	   
	   //die is finishing the script at this point

	   echo "HI";
	   echo '<br>';


	//Array
     // List if Items
	   //this is called index array
	   $my_array = [1, 2, 3, 4];
	   echo $my_array[3];
	   echo '<br>';

	   //Multidimensional Array
	   $friends = [
         ['TingSheng', 30],
         ['Zest', 32],
         ['Eefy', 33]

	   ];

	   echo $friends[0][0];
	   echo '<br>';


	   //Associative array
	    //it's called index array
        $fruits = ['name' => 'mango'];
        echo $fruits['name'];//it's called key
        echo '<br>';

        $profile = [
           //key => value
          'name' => 'MarySheng',
          'age' => 27,
          'hobby' => 'caring'
   
        ];

      echo $profile['hobby'];
      echo '<br>';


      $players = [

        [
          'name'=> 'kageyama',
          'position' => 'setter'

        ],

        [
          'name' => 'Hinata',
          'position' => 'Decoy'
        ]
      ];

      echo $players[0]['name'] . 'is' . $players[0]['position'];
      // echo"{ $players[0]['name']} is {$players[0]['position']}";
      echo '<br>';

      //loop
      //for -> indexed

      $my_array = ["Mary", "TingSheng", "Zest"];
      // die (var_dump(count($my_array)));

      //in php for loop use count 
      for($i = 0; $i < count($my_array); $i++) {

      	echo "My friend $my_array[$i]";
      	echo '<br>';

      }


      $num = 1;
      while($num <= 5){
      	echo $num;

      	//next will be increment/decrement

      	$num++;
      }


       $num = 1;
     do {

     	echo $num;
        $num++;
     } while ($num < 2);

      echo '<br>';


      //forEach Loop

      $fruits = ["apple", "banana", "mango"];

      foreach ($fruits as $fruit) {
      	echo $fruit;
      	echo '<br>';

      }


      $friends = ["TingSheng", "Zest", "Eefy"];

      foreach ($friends as $friend) {

      	echo "My friend {$friend} is working";
      	echo "<br>";
      }


      //Multidimensional array foreach

      $numbers = [
        ['one', 'three', 'five'],//this $number
        ['two', 'four', 'six']


      ];

      foreach($numbers as $number) {
          foreach ( $number as $num  ) {

          	echo $num;
          	echo '<br>';
          }
      }
     


     //Multidimensional for loop
    // for($i = 0; < count($numbers); $i++){

    // 	for($t = 0; $t < count($numbers[$i]); $t++){

    // 		echo $numbers[$i[$t]];
    // 		echo '<br>';
    // 	}
    // }



    //Associative Array
     //for loop won't work with associative array
    $profile = [
      "name" => "Mary",
      "age" => 27

    ];

    //can use only foreach
    foreach($profile as $key => $value) {
    	echo $value;
    	echo "<br>";
    }
  echo $profile["name"];

foreach($profile as $value){
	echo $value;
	echo '<br>';
}

	
   //to get the value
    foreach($players as $key => $value) {
    	echo "{$value["name"]} is {$value["position"]}";
    	echo '<br>';
    }

//Constant
define('NAME', 'what is the value');
echo NAME;


//Operators
  //Arithmetic Operator
   
   // addition
    $sum = 4.99 + 5.01;

   //Substraction

    $difference = 1 -3;

   //Multiplication

    $product = 1 * 3;

   //Division

    $quotient = 10 / 3;

   //Modulus
   // remainder

    //10 % 3

    echo 10 % 3;

   
  //Assignment Operator
    //= to assign value

    $mary = "enraged";

    //+=
    $age = 3;
    $age += 4;
    echo $age;

    //-=
    $age -= 2;
    echo $age;

    //*=
    $age *= 3;

    // /=
    $age /= 2;

    // %=
    $num = 9;
    $num %= 3;
    echo $num;
    

    //concat
    //.=
    $message = "mary";
    $message = "pretty";
    echo $message;


  //Comparison Operators
    //return boolean
    // <less than
    // > grater than
    // == equal
    // != not equal
    // <= less than or equal to
    // >= identical operator
    // === identical operator
    // !== not identical operator

    var_dump(3 !== "3");


  //Increment/Decrement
  $num = 3;
  echo $num++;//post-increment
  echo ++$num;//pre-increment
  echo '<br>';


  


	?>
</body>
	
</body>
</html>