<?php
session_start();
$books_to_buy = $_SESSION['total_books'];
$total_price = 10 * sizeof($_SESSION['total_books']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Checkout</title>
    <link rel="stylesheet" href="css/Ponder03.css">
	</head>
	<body>
    <div class=div-wrapper>
    <form method="post" action="confirmation_page.php">
      <ul>
        <?php foreach ($books_to_buy as $i => $book) {
          echo "<li>$book</li>";
        }
        echo "Total Price: $" . (10 * sizeof($books_to_buy)) . ".00";
        ?>
      </ul>
      <p>First Name: <input type="text" name="firstname"></p>
      <p>Last Name: <input type="text" name="lastname"></p>
      <p>Email: <input type="text" name="email"></p>
      <p>Mailing Address:</p>
      <p>Address: <input type="text" name="address"></p>
      <p>City: <input type="text" name="city"></p>
      <p>State: <input type="text" name="state"></p>
      <p>Zip Code: <input type="text" name="zip"></p>
      <p>Credit Card Type: </p>
      <input type="radio" name="credit_card_type" value="MasterCard">MasterCard<br />
      <input type="radio" name="credit_card_type" value="Visa">Visa<br />
      <input type="radio" name="credit_card_type" value="American Express">American Express<br />
      <input type="radio" name="credit_card_type" value="Discover">Discover</p>
      <p>Credit Card Number: <input type="text" name="credit_card_number"></p>
      <p>Security Code: <input type="text" name="security_code"></p>
      <input type="submit">
    </form>
    </div>
	</body>
</html>
