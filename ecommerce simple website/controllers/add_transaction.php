<?php
session_start();
// die(var_dump($_POST['orderID']));
require_once './connection.php';
// trans code
   // generate transaction code

   function generate_transaction_code(){
   	$transaction_code = "";
   	$chars = ['0','1','2', '3','4','5','6','T','M','S','R','L','D','F',];

   	for ($i = 0; $i < 5 ; $i++) { 
   		$index = rand(0,13);

   		$transaction_code .=  $chars[$index];
   	}

   	$transaction_code .= getdate()[0];

   	return $transaction_code;
   }


   $transaction_code = isset($_POST['orderID']) ? $_POST['orderID'] :
    generate_transaction_code();
   // var_dump(generate_transaction_code());

// total
  // compute the subtotal to get the total
   // get to db
   $ids = join(",",array_keys($_SESSION['cart']));
   $sql_query_get_cart = "SELECT * FROM products WHERE id IN ({$ids})";
  // var_dump($sql_query_get_cart);
   $total = 0;

   $result = mysqli_query($conn, $sql_query_get_cart);

   $products = [];
   while($product = mysqli_fetch_assoc($result)){
   	$subtotal = $product['price'] * $_SESSION['cart'][$product['id']];
   	$total += $subtotal;
   	//getting the subtotal
   	$product['subtotal'] = $subtotal;
   	//getting the quantity
   	$product['quantity'] =  $_SESSION['cart'][$product['id']];
    

    // two way of pushing to array
   	// array_push($products, $product);
   	// how to read in a sentence array_push($container, $item_to_push)
   	$products[] = $product;
   }
   // echo "<pre>", var_dump($products), "</pre>";

   // var_dump($total);

// user_id
   $user_id = $_SESSION['user']['id'];

// payment_mode_id
   $payment_mode_id = isset($_POST['orderID']) ? 2 : 1;

// status_id
$status_id = 1;


// prepare the query to add transaction to db
$sql_query_create_transaction = "INSERT INTO
    transactions (
		transaction_code,
		total,
		user_id,
		status_id,
		payment_mode_id
    ) VALUES (
		'{$transaction_code}',
		$total,
		{$user_id},
		{$status_id},
		{$payment_mode_id}

    )
";

$result = mysqli_query($conn, $sql_query_create_transaction);
// var_dump($result);

// after adding an entry in transaction table, we will populate the product_transactions table to record.



// transaction_id
$transaction_id = mysqli_insert_id($conn);
// [transaction_id, product_id, quantity, price, subtotal]
//concatinate
   // "(1,2,5,1200),(1,4,3,200,600)"
// join
$array_entries = [];
foreach($products as $product){
	extract($product);
	$entry = "($transaction_id, $id, $quantity, $price, $subtotal)";
	// echo $entry;
	// echo "<br>";
	
	// echo "<pre>",var_dump($products), "</pre>";

	$array_entries[] = $entry;
}
 
 // echo "<pre>", var_dump($array_entries), "</pre>";

 $values = join(",", $array_entries);

 // var_dump($values);

// query transactions
$sql_query_product_transactions = "INSERT INTO product_transactions (
   transaction_id,
   product_id,
   quantity,
   price,
   subtotla
) VALUES 

  {$values}   
";

// var_dump($sql_query_product_transactions);

mysqli_query($conn, $sql_query_product_transactions);

unset($_SESSION['cart']);
unset($_SESSION['cart-count']);

if(isset($_POST['orderID'])){

  echo $transaction_id;
}else{

  header("Location: ./../views/single_transaction.php?id={$transaction_id}");
}
