<?php
session_start();
$books_to_buy = $_SESSION['total_books'];
$total_price = 10 * sizeof($_SESSION['total_books']);
$_SESSION['firstname'] = htmlspecialchars($_POST['firstname']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
    <link rel="stylesheet" href="../css/Ponder03.css">
	</head>
	<body>
    <div class=div-wrapper>
    <form method="post" action="thank_you_page.php">
      <p><?php echo htmlspecialchars($_POST['firstname']) . " " . htmlspecialchars($_POST['lastname'])?></p>
      <p><?php echo "Email: " . htmlspecialchars($_POST['email'])?></p>
      <p>Mailing Address:</p>
      <p><?php echo htmlspecialchars($_POST['address'])?></p>
      <p><?php echo htmlspecialchars($_POST['city']) . ", " . htmlspecialchars($_POST['state']) . ", " . htmlspecialchars($_POST['zip'])?></p>
      <p>Books</p>
      <ul>
        <?php foreach ($books_to_buy as $i => $book) {
          echo "<li>$book</li>";
        }
        echo "Total Price: $" . (10 * sizeof($books_to_buy)) . ".00";
        ?>
      </ul>
      <input type="submit">
    </form>
    </div>
	</body>
</html>
