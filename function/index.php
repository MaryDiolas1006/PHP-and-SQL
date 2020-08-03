<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP functions</title>
</head>
<body>

	<h1>functions</h1>
	<!-- a set of code that can be executed anytime
         a set of statement that calculates a value
	 -->

	 <?php 
	    //user defined function
        //Create a function
	    //php function can hoist: call a function before coding it
	    function_name();

	    function function_name() {
          echo "Hello There!";
	    }

	    //to call a function
	    function_name();
	    echo "<br>";

	    //Built-in functions
	    //count()
	    //echo()
	    //define()

	    // more on functions
	    function greet($name,$time) {
	    	echo "<h2>Good {$time} {$name}</h2>";
	    	echo "<p>This is just a normal greeting</p>";
	    }

	    greet("Mary", "Morning");
	    greet("TingSheng", "Evening");

	    echo "<br>";

	    //create a function that accepts 2 numbers
	    //it will display the sum of the 2 numbers

	    function sum($num1, $num2){
            echo $num1 + $num2;
	    }

	    sum(5, 7);
	    echo "<br>";

	    //or using spread operators
	    function sum2(...$nums){
	    	// var_dump($nums);
	    	$sum = 0;
           foreach($nums as $num){
               $sum += $num;
           }

           echo $sum;
	    }

	    sum2(2, 4, 5, 6);

	    echo "<br>";


	    //subtracttion
	    function subtract(int $num1, int $num2){
	    	echo $num1 - $num2;
	    }

	    subtract(13, 24);

	    echo "<br>";

         //to be sure of integrity of data when dealing with numbers
	    function discounted_value(int $total, float $dc){

	    	//total - (total * dc)

	    	echo $total - ($total * $dc);
	    }

	    discounted_value(100, .50);
	    echo "<br>";


        function message(){
        	echo "100";
        }

	    //function with return values

	    function total(){
	    	return 100;
	    }

	    total();

	    echo message() + 10;
	    echo "<br>";
	    echo total() + 10;
	    echo "<br>";


	    // nav
	    //ul
	    //li - home
	    //li - login
	    //li - register
	    //PHP code navbar

	    function display_nav($list1, $list2, $list3) {
	    	echo "<nav>";
	    	echo "<ul>";
	    	echo "<li> {$list1}</li>";
	    	echo "<li> {$list2}</li>";
	    	echo "<li> {$list3}</li>";
	    	echo "</ul>";
	    	echo "</nav>";
	    }


           display_nav("Home", "Login", "Register");
           echo "<br>";
            
            //escaping to HTML
           function display_nav2($list1, $list2, $list3) {
	    	?>
	    	<nav>
	    		<ul>
	    			<li><?php echo $list1 ?></li>
	    			<li><?php echo $list2 ?></li>
	    			<li><?php echo $list3 ?></li>
	    		</ul>
	    		
	    	</nav>

	    	<?php
	    }
          

           display_nav2("Home", "Login", "Register");
            echo "<br>";

             //mini-activity escaping HTML
           function person($name, $age){
           	?>
            
            <p>Hi <?php echo $name ?> you're <?php echo $age ?> years old</p>
             
             <?php
           }

           person("Mary", 27);

           echo "<br>";

          
          $person = [

            "name" => "TingSheng",
            "age" => 30,
          ];


          // create a funtion that displays Tingsheng is 30 years old


          function person2($name, $age){

          	?>

          	<ul>
          		<li><?php echo $name?> is <?php echo $age  ?> years old</li>
          	</ul>

          	<?php
          }
         
            person2($person["name"], $person["age"]);
      
	 ?>


  <?php 
  //to use this name inside function, put global $name
    $name = "Mary";

    function display_name(){
    	global $name;
    	echo $name;

    }

    display_name();


  ?>


<!-- foreach solving -->
  <?php 
     $players = [
     	[
      'name' => 'TingSheng',
      'age' => 14
  ],

  [
    'name' => 'Zest',
     'age' => 32
  ],

  [
    'name' => 'Eefy',
    'age' => 33
  ]

     ];


     //get list of Players legal age
      //use foreach loop

     foreach($players as $player){
     	if($player["age"] > 14){
       
         ?>
         <ul>
         	<li><?php echo $player['name'] ?> is <?php echo $player['age'] ?> years old</li>
          </ul>

         <?php

     	}
     }

  ?>


<ul>
	<?php
  //get list of Players not legal age
      //use foreach loop

	foreach($players as $player){
		if($player['age'] < 15) {

			?> 
			<li>
				<?php echo $player['name'] ?> is $player['age'] ?> years old
			</li>

			<?php
		}
	}

	?>


</ul>

   



	
</body>
</html>