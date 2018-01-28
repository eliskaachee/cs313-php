<!DOCTYPE html>
<html>
<head>
	<title>Your Page</title>
</head>
<body>
<p>
	Your Name: <?php  echo $_POST[]; ?><br>
	Mailto: <?php  echo $_POST[]; ?><br>
	Major: <?php  echo $_POST[]; ?><br>
	Comments: <br>
	<div style="margin-left: 25px">
		<p>
			<?php  echo $_POST[]; ?>
		</p>
	</div>
	Visited: <br>
	<ul>
		<?php
			foreach ($_POST[] as $Location) {
				echo "<li>". $Location ."</li>"
			}
		?>
	</ul>
</p>
</body>
</html>
