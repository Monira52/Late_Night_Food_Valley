<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <title>My Order History</title>
<style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #;
   font-family: calibri;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #CD5C5C;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table border="5" cellpadding = "10">
 <tr>
  
  <th>My_ID</th> 
  <th>Total_Price</th>
  <th>Discount_price</th>
  <th>Gulab_Jamun</th>
  <th>Samosa</th>
  <th>Plain_Naan</th> 
  <th>Pulav</th> 
  <th>Pizza</th>
  <th>Burger</th>
  <th>Prawn_Biryani</th>
  <th>Fried_Pomfret</th> 
  <th>Mutton_Biryani</th> 
  <th>Temp_address</th>
 
 </tr>
 <?php
$con = mysqli_connect('localhost', 'root', '', 'LATE_NIGHT_FOOD_VALLEY');
  // Check connection
  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 
  
  $email3 = $_SESSION['email'];
  
  $sql1 = "SELECT Customer_ID FROM customer where Email = '$email3'";
  $id = mysqli_query($con, $sql1);
  if ($id->num_rows > 0) {
    while($row = $id->fetch_assoc()){
		$idd = $row['Customer_ID'];
    }
  }
  
  
  $sql3 = "SELECT * FROM history where Customer_ID = '$idd' ";
  $result = $con->query($sql3);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
	
	?>
	<tr>
	<td> <?php echo $row["Customer_ID"];?></td>
	<td> <?php echo $row["Total_Price"];?></td>
	<td> <?php echo $row["Discount_price"];?></td>
	<td> <?php echo $row["Gulab_Jamun"];?></td>
	<td> <?php echo $row["Samosa"];?></td>
	<td> <?php echo $row["Plain_Naan"];?></td>
	<td> <?php echo $row["Pulav"];?></td>
	<td> <?php echo $row["Pizza"];?></td>
	<td> <?php echo $row["Burger"];?></td>
	<td> <?php echo $row["Prawn_Biryani"];?></td>
	<td> <?php echo $row["Fried_Pomfret"];?></td>
	<td> <?php echo $row["Mutton_Biryani"];?></td>
	<td> <?php echo $row["Temp_address"];?></td>
	<tr>
	<?php
}
echo "</table>";
} else { echo "0 results"; }
$con->close();
?>
</table>
</body>
</html>