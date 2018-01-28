<?php
session_start();
$books_to_buy = $_SESSION['total_books'];
$book_to_remove = htmlspecialchars($_GET['remove']);

if(isset($_GET['remove'])) {
  unset($_SESSION['total_books'][$book_to_remove]);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title>
    <link rel="stylesheet" href="../css/Ponder03.css">
	</head>
	<body>
    <div class=div-wrapper>
    <h1>Cart</h1>
    <ul>
      <?php foreach ($books_to_buy as $i => $book) {
        if($i != $book_to_remove || is_null($book_to_remove)) {
        echo "<li><a href=\"view_cart.php?remove=$i\">Remove from List</a>$book</li>";
        }
      }
      echo "<br />";
      echo "Total Price: $" . (10 * sizeof($books_to_buy)) . ".00";
      ?>
    </ul>
    <br />
    <a href="checkout.php">Proceed to Checkout</a>
  </div>
	</body>
</html>
