<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Activity</title>
</head>
<body>


<!-- Multiplication Odd Table -->

    <?php 


echo "<table border =\"1\" style='border-collapse: collapse'>"; //creating the border outline

for ($row = 1; $row <= 25; $row+=2) { // first loop
    echo "<tr> \n";
    for ($col = 1; $col <= 25; $col+=2) { //2nd loop
        if($row == 0 && $col == 0)
            echo '<td> x </td>';
        else if ($row == 0 && $col != 0)
            echo "<td>$col</td>";
        else if ($row != 0 && $col == 0)
            echo "<td>$row</td>";
        else {
            $p = $col * $row; //computing values
            echo "<td>$p</td> \n";
        }

    }
    echo "</tr>";
}
echo "</table>"; //closing the table

 ?>

<!-- OTHER SOLUTION -->

<table border = "1">
    <!-- <tr>
        <td>1</td>
        <td>3</td>
        <td>5</td>
    </tr>

    <tr>
        <td>3</td>
        <td>9</td>
        <td>15</td>
    </tr> -->
<?php 
 for ($i = i; $i <= 25; $i++){
    echo "<tr>";
    for ($t = 1 ; $t <= 25; $t++){
     $product = $i * $t;
     if($product % 2 != 0) {
         echo "<td>$product</td>";

     }
    
    }
    
    echo "</tr>";
 }

 ?>

</table>
 
    
</body>
</html>






