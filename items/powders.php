<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysql_query("SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysql_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fresh-Flours</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<div class="categolis">
		<table>
			<tr>
				<th>
					<a href="grains.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Grains</a>
				</th>
				<th><a href="powders.php" style="text-decoration: none;color: #fff;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Flours</a></th>
				<th><a href="cleaning.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Toiletry</a></th>
				<th><a href="pulses.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Pulses</a></th>
				<th><a href="spices.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Spices</a></th>
				<th><a href="condiments.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Condiments</a></th>
				<th><a href="drynuts.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Nuts</a></th>
				<th><a href="oil.php" style="text-decoration: none;color: #F7A200;padding: 4px 12px;background-color: #047BD5;border-radius: 12px;">Oil</a></th>
			</tr>
		</table>
	</div>
	<div style="padding: 30px 120px; font-size: 25px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php 
			$getposts = mysql_query("SELECT * FROM products WHERE available >='1' AND item ='ornament'  ORDER BY id DESC LIMIT 10") or die(mysql_error());
					if (mysql_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysql_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
										<img src="../image/product/ornament/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: '.$price.' Rs</div>
									</div>
									
								</li>
							</ul>
						';

						}
				}
		?>
			
		</div>
	</div>
</body>
</html>