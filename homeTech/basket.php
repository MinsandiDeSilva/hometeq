<?php 
session_start();
include ("db.php"); 
$pagename="Smart basket"; 
include ("db.php");     
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";  

echo "<body>"; 

include ("headfile.html");  

echo "<h4>".$pagename."</h4>";  //display name of the page on the web page

// //Call in stylesheet
// //capture the ID of selected product using the POST method and the $_POST superglobal variable
// //and store it in a new local variable called $newprodid
// $newprodid = $_POST['h_prodid'];

// //capture the required quantity of selected product using the POST method and $_POST superglobal variable
// //and store it in a new local variable called $reququantity
// $reququantity=$_POST['p_quantity'];

// // echo "</p> product id: ".$newprodid;
// // echo "</p> product quantity: ".$reququantity;

// //create a new cell in the  basket session array. Index this cell with the new product id. 
// //Inside the cell store the required product quantity  
// $_SESSION['basket'][$newprodid]=$reququantity; 
// echo "<p>1 item added";

if (isset($_POST['h_prodid'])){
    $newprodid = $_POST['h_prodid'];
    $reququantity=$_POST['p_quantity'];
    
    $_SESSION['basket'][$newprodid] = $reququantity ;
    echo "<p>1 item added";

}else{
    echo "<p> Bascket unchanged";
}

$total = 0;
echo "<p><table id='baskettable'>";
echo "<tr>";
echo "<th>Product Name</th><th>Price</th><th>Quantity</th> <th>Subtotal</th>";
echo "</tr>";

if(isset($_SESSION['basket'])){
    //foreach is used for arrays so session basket is an array
    foreach($_SESSION['basket'] as $index => $Value){
        $SQL = "SELECT prodId,prodName,prodPrice 
                from products 
                where prodId =".$index;
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn)); 
        $arrayp=mysqli_fetch_array($exeSQL);

        echo "<tr>";
        //display product name & product price using array of records $arrayp
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>&pound".number_format($arrayp['prodPrice'],2)."</td>";


        //display selected quantity of product retrived from the cell of the session array and now in $value
        echo "<td style='text-align:center;'>".$reququantity."</td>";

        $subtotal = $arrayp['prodPrice'] * $reququantity;
        echo "<td>&pound".number_format($subtotal,2)."</td>";

        echo "</tr>";
        $total = $total + $subtotal;

    }
}else{
    echo "<p>Empty basket";
}

// Display total
echo "<tr>";
echo "<td colspan=3>TOTAL</td>";
echo "<td>&pound".number_format($total,2)."</td>";
echo "</tr>";
echo "</table>";


include("footfile.html");     
echo "</body>"; 
?> 