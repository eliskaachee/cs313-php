<?php
session_start();
$name = $_SESSION['firstname'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
    <link rel="stylesheet" href="../css/Ponder03.css">
	</head>
	<body>
    <div class=div-wrapper>
    <h1>Thank you <?php $name ?>!</h1>
    <h2>Enjoy Reading!</h2>
    </div>
	</body>
</html>
