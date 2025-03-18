<?php 
include("db.php"); 
$pagename="A smart buy for a smart home";      
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
echo "<body>"; 

include ("headfile.html");     
echo "<h4>".$pagename."</h4>"; 

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable 
//applied to the query string u_prod_id 
//store the value in a local variable called $prodid 
$prodid=$_GET['u_prod_id']; 
//display the value of the product id, for debugging purposes 
echo "<p>Selected product Id: ".$prodid; 

//from index page
$SQL="
SELECT prodId, prodName, prodPicNameLarge,prodPrice, prodDescripLong,prodQuantity 
FROM products
WHERE prodId = $prodid"; 

//run SQL query for connected DB or exit and display error message 
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn)); 
echo "<table style='border: 0px'>"; 

//create an array of records (2 dimensional variable) called $arrayp. 
//populate it with the records retrieved by the SQL query previously executed.  
//Iterate through the array i.e while the end of the array has not been reached, run through it 
while ($arrayp=mysqli_fetch_array($exeSQL))       
// { 
// echo "<tr>"; 
// echo "<td style='border: 0px'>"; 
// //display the small image whose name is contained in the array 
// echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId']."></a>"; 
// echo "<img src=image/".$arrayp['prodPicNameLarge']." height=200 width=200>";
// echo "</td>"; 
// echo "<td style='border: 0px'>"; 
// echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array 
// echo "<p>".$arrayp['prodDescripLong']."</p></br>";
// echo "<p><b>$".$arrayp['prodPrice']."</b></p></br>";
// echo "<p> Left in stock: ".$arrayp['prodQuantity']."</p>";
// echo "</td>"; 
// echo "</tr>"; 

// //cart funtion
// echo "<p>Number to be purchased: </br>"; 
// //create form made of one text field and one button for user to enter quantity 
// //the value entered in the form will be posted to the basket.php to be processed 
// echo "<form action=basket.php method=post>"; 
// // echo "<input type=text name=p_quantity size=5 maxlength=3>"; 
// //using a drop down since we can type anything there
// // echo "<input type=text name=p_quantity size=5 maxlength=3>"; 
// echo "<label for='p_quantity'>Select Quantity: </label>";
// echo "<select name='p_quantity'>";
// for ($i = 1; $i <= $product['prodQuantity']; $i++) {
//     echo "<option value='$i'>$i</option>";
// }
// echo "</select>";
// //pass the product id to the next page basket.php as a hidden value 
// //giving as a hidden value since 
// echo "<input type=hidden name=h_prodid value=".$prodid.">"; 
// echo"<button type=submit>Add to cart</button>";
// echo "</form>"; 
// echo "</p></br>";


// } 


{
    echo "<tr>";
    echo "<td style='border: 0px'>";
    //display the small image whose name is contained in the array
    echo "<a href=prodbuy_1.php?u_prod_id=".$arrayp['prodId'].">";
    
    echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
    echo"</a>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
    echo "<p>".$arrayp['prodDescripLong'];
    echo "<p><b>&pound".$arrayp['prodPrice']."</b>";
    echo "<p>Left in Stock : ".$arrayp['prodQuantity'];
    
    echo "<br><p>Number to be purchased: ";
    //create a form made of one drop-down menu and one button for user to enter quantity
    //the value entered in the form will be posted to the basket.php to be processed
    echo "<form action=basket.php method=post>";
    echo "<select name=p_quantity>";
    for ($i=1; $i<=$arrayp['prodQuantity']; $i++)
    {
    echo "<option value=".$i.">".$i."</option>";
    }
    echo "</select>";
    echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
    //pass the product id to the next page basket.php as a hidden value
    echo "<input type=hidden name=h_prodid value=".$prodid.">";
    echo "</form>";
    echo "</p>";
    }
echo "</table></br>"; 

 

include("footfile.html");     
echo "</body>"; 
?> 