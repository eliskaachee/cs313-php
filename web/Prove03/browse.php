<!DOCTYPE html>
<html>
	<head>
		<title>Browse Books</title>
    <link rel="stylesheet" href="../css/Ponder03.css">
	</head>
	<body>
    <?php
    session_start();
    $book_to_add = htmlspecialchars($_GET['new_book']);

    if(!isset($_SESSION['total_books'])) {
      echo "starting out";
      $_SESSION['total_books'] = array(); //if there is a new book, but the session variable is not set yet
    }
    if(isset($_GET['new_book'])) {
      array_push($_SESSION['total_books'], $book_to_add);
    }
    ?>
    <div class=div-wrapper>
    <h1>Books</h1>
    <h2>Each book is $10</h2>
      <p>Harry Potter Books</p>
      <ul>
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Socrerer's%20Stone">Add to Cart</a>Harry Potter and the Socrerer's Stone<br />
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Chamber%20of%20Secrets">Add to Cart</a>Harry Potter and the Chamber of Secrets<br />
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Prisoner%20of%20Azkaban">Add to Cart</a>Harry Potter and the Prisoner of Azkaban<br />
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Goblet%20of%20Fire">Add to Cart</a>Harry Potter and the Goblet of Fire<br />
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Order%20of%20the%20Pheonix">Add to Cart</a>Harry Potter and the Order of the Pheonix<br />
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Half-Blood%20Prince">Add to Cart</a>Harry Potter and the Half-Blood Prince<br />
        <a href="browse.php?new_book=Harry%20Potter%20and%20the%20Deathly%20Hallows">Add to Cart</a>Harry Potter and the Deathly Hallows<br />
      </ul>
      <p>Lord of the Rings</p>
      <ul>
        <a href="browse.php?new_book=Fellowship%20of%20the%20Ring">Add to Cart</a>Fellowship of the Ring<br />
        <a href="browse.php?new_book=The%20Two%20Towers">Add to Cart</a>The Two Towers<br />
        <a href="browse.php?new_book=Return%20of%20the%20King">Add to Cart</a>Return of the King<br />
      </ul>
      <p>The Chronicles of Narnia Books</p>
      <ul>
        <a href="browse.php?new_book=The%20Magician's%20Nephew">Add to Cart</a>The Magician's Nephew<br />
        <a href="browse.php?new_book=TheLion%2C%20the%20Witch%20and%20the%20Wardrobe">Add to Cart</a>The Lion, the Witch and the Wardrobe<br />
        <a href="browse.php?new_book=The%20Horse%20and%20His%20Boy">Add to Cart</a>The Horse and His Boy<br />
        <a href="browse.php?new_book=Prince%20Caspian%3A%20The%20Return%20to%20Narnia">Add to Cart</a>Prince Caspian: The Return to Narnia<br />
        <a href="browse.php?new_book=The%20Voyage%20of%20the%20Dawn%20Treader">Add to Cart</a>The Voyage of the Dawn Treader<br />
        <a href="browse.php?new_book=The%20Silver%20Chair">Add to Cart</a>The Silver Chair<br />
        <a href="browse.php?new_book=The%20Last%20Battle">Add to Cart</a>The Last Battle<br />
      </ul>
      <a href="view_cart.php">View Cart<br />
      </div>
	</body>
</html>
