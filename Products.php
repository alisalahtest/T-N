<?php
include 'connection.php';
include 'logfrom.php';
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar" >
<head>
	<meta charset="UTF-8">
	<title>التوحيد و النور</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
	<div class="header">
<div class="container">
	<div class = "navbar">
			<div class= "logo">
			<img src="IMG/logo.png" width="125px">
		</div>
		<nav class="t1">
			<ul>
				<li> <a href="admin.php">الصفحة الرئيسية</a></li>
				<li> <a href="Products.php">منتجاتنا</a></li>
				<li> <a href="admin.php?logout='1'" >تسجيل الخروج</a></li>
			</ul>
		</nav>		
	</div>

			<!-- Forms -->

		<form method="post" action="Products.php">

			<input type="text" name="srh" placeholder="Search" size="60" required>
			<button name="srh-btn" class="btn"> GO </button>
			
		</form>
		
		<form id="right" method="post" action="Products.php"> 

			<input class="btn" type="submit" name="btn2" value="Get All Record From Data base">

		</form>
</div>
</div>

		<!-- Retreive -->

<?php
if(isset($_POST['btn2'])){
	?>

	<center>
		<table border=2 width=70%>
			<tr>
				<td >ID</td>
				<td>Product Name</td>
				<td>Price</td>
				<td>Image</td>
				<td>Update Data</td>
				<td>Delete Data</td>
			</tr>
		<?php
		$qry1="SELECT * FROM `products`";
		$run=mysqli_query($con,$qry1);

		while($data=mysqli_fetch_array($run)){
			//$data=array('Id'=>{1,2,3,4...} 'Pname'=>{'x','o'....} 'color'=>{......})
		?>
			<tr>
				<td><?php  echo $data['id']   ?></td>
				<td><?php  echo $data['pname']   ?></td>
				<td><?php  echo $data['price']   ?></td>
				<td> <img src="<?php  echo $data['IMG']   ?>" width=100% ></td>
				<td>  <a href="">Edit Data</a>  </td>
				<td>  <a href="">Delete Data</a>  </td>
			</tr>
		<?php	
		}
		?>
		</table>
	</center>
		<?php
}
		?>

	<!-- Sreach -->
<?php 

if(isset($_POST['srh-btn'])){
	$srh=mysqli_real_escape_string($con,$_POST['srh']);
?>
	<center>
		<table border=2 width=50%>
			<tr>
				<td >ID</th>
				<td>Product Name</th>
				<td>Price</th>
				<td>Image</th>
			</tr>
		<?php
			$qy="SELECT * FROM `products` WHERE `pname` LIKE '%$srh%'";
			$res=mysqli_query($con,$qy);

			while ($data1=mysqli_fetch_array($res)){
		?>
			<tr>
			<td>  <?php  echo $data1['id']   ?>  </td>
			<td>  <?php  echo $data1['pname']   ?>  </td>
			<td>  <?php  echo $data1['price']   ?>  </td>
			<td>  <img src="<?php  echo $data1['IMG']   ?>" width=100%>  </td>
			</tr>
		<?php
			}
		?>
		</table>
	</center>
		<?php
			}
		?>

</body>
</html>