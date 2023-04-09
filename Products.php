<?php
include 'connection.php'
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title>cars</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
<div class="container">
	<div class = "navbar">
		
		<div class="show"></div>
		<nav class="Navbar">
			<ul>
  <li><a class="active" href="index.html">Home</a></li>
  <li><a href="Products.php">Products</a></li>
  <li><a href="login.html">Sign in</a></li>
  <li><a href="Account.html">Sign up</a></li>
</ul>

		</nav>

		</div>
		<form method="post" >
			<input type="text" name="srh" placeholder="Search" size="60" required>
			<button name="srh-btn"> GO </button>
		</form>
		
	</div>
</div>



<div class="small-container">
	<?php
//Retrieve_Products

if (isset($_POST['srh-btn'])) {
  ?>
    <center>
  <table>

<?php
$st=$_POST['srh'];

  $qry="SELECT * FROM `products` WHERE `pname` LIKE '%$st%' ";
  $rst=mysqli_query($con,$qry);
  while ($data=mysqli_fetch_array($rst)) {
    //$data=array('ID'=>{2,5,6,7} 'pname'=>{iphonex,iphone 7plus});

    ?>
   <tr style="text-align: center; display: inline;">
<td style=" width: 250px;">
	<div class="row">
		<div class="col-4">
		<img src="<?php   echo $data['image']; ?>">
		<h4><?php echo $data['pname'];  ?></h4>
		<p> <?php echo $data['price']; ?></p>
		</div>
	</div>
</td>
</tr>

    <?php
  }
  ?>
<hr> 
		<h2 class="title"> Searching Result </h2>

<?php

}
?>
</table> 
</center>
<?php
//Sorting_Results

if (isset($_POST['btn2'])) {
  ?>
<center>
<table>
<?php
$opt=$_POST['sortt'];

if ($opt=="l") {
  
$qy="SELECT * FROM `products` order by `price` ASC";
$rt=mysqli_query($con,$qy);
while ($row=mysqli_fetch_array($rt)) {
  ?>
  <tr style="text-align: center; display: inline;">
<td style=" width: 250px;">
	<div class="row">
		<div class="col-4">
		<img src="<?php   echo $row['image']; ?>">
		<h4><?php echo $row['pname'];  ?></h4>
		<p> <?php echo $row['price']; ?></p>
		</div>
	</div>
</td>
</tr>
<?php

}
?>
<hr> 
		<h2 class="title"> Sorting Result </h2>

<?php

}else {
  $qy="SELECT * FROM `products` order by `price` DESC";
  $tt=mysqli_query($con,$qy);

  while ($dt=mysqli_fetch_array($tt)) {
  ?>
  <tr style="text-align: center; display: inline;">
<td style=" width: 250px;">
	<div class="row">
		<div class="col-4">
		<img src="<?php   echo $dt['image']; ?>">
		<h4><?php echo $dt['pname'];  ?></h4>
		<p> <?php echo $dt['price']; ?></p>
		</div>
	</div>
</td>
</tr>
<?php
}
?>
		<h2 class="title"> Sorting Result </h2>

<?php

}
}

?>
</table></center>
<h2 class="title">All Products</h2>
<form id="right" method="post"> <label> Sort By:</label>
        <select  name="sortt" required>
           <option> --Select One Option-- </option>
           <option value="l"> Price: Low to High </option>
           <option value="h"> Price: High to Low </option>
        </select>
        <input class="btn" type="submit" name="btn2" value="Sort Your Products">
         </form>
<div class="row">
	<div class="col-4">
		<img src="IMG/product-1.jpg">
		<h4>Yellow Car</h4>
		
		<p>$50,000</p>
	</div>
	<div class="col-4">
		<img src="IMG/Product-2.jpg">
		<h4>White Car</h4>
	
		<p>$150,000</p>
	</div>
	<div class="col-4">
		<img src="IMG/Product-3.jpg">
		<h4>Red car</h4>
	
		<p>$100,000</p>
	</div>
	<div class="col-4">
		<img src="IMG/Product-4.jpg">
		<h4>Yellow Car</h4>
	
		<p>$75,000</p>
	</div>
</div>

<div class="Footer">
	<div class="container">
		<div class="row">
			
			<div class="footer-col-3">
				<h3>Useful Links</h3>
				<li>Coupons</li>
				<li>Blog Post</li>
				<li>Return Poilcy</li>
				<li>Coupons</li>
			</div>
			<div class="footer-col-4">
				<h3>Follow US</h3>
				<li>Facebook</li>
				<li>YouTube</li>
				<li>LinkedIN</li>
			</div>
		</div>
		<hr> 
		<p class="copy">Copyright 2022</p>
	</div>
	</div>

</body>
</html>