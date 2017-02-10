<?php

include("../global/connect.php");
include("../global/scripts.php");

$id = $_GET['book_id'];
$sql="SELECT * FROM books WHERE book_id='$id'";
$result=mysqli_query($connect,$sql);

include("../global/header.php");

?>

<div class="container">
	<div class="col-md-4">
			<?php
			while($row = mysqli_fetch_assoc($result))
			{
				?>
				<h1><?php echo $row['book_name'] ?></h1>
				<h2><?php echo $row['book_author'] ?></h2>
				<h3><?php echo $row['book_year'] ?></h3>
				<h4><?php echo $row['book_genre'] ?></h4>
				<?php
			}
			?>
			
		</ul>
	</div>
</div>

