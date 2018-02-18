<?php
require("dbConnect.php");
$db = get_db();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add a Quote</title>
		<link rel="stylesheet" href="/css/quote_site.css">
	</head>
	<body>
    <div class="page-wrapper">
			<h1>Add a Quote</h1>
			<br />
			<div class="box">
			<form action="handle_add_quote.php" method="post">

				<label for="username">Username: </label><br />
				<input type="text" id="username" name="username"></input>
				<br /><br />

				<label for="email">Email Address: </label><br />
				<input type="text" id="email" name="email"></input>
				<br /><br />

				<label for="quote_content">Quote: </label><br />
				<textarea id="quote_content" name="quote_content" rows="4" cols="50"></textarea>
				<br /><br />

				<label for="author">Author: </label><br />
				<input type="text" id="author" name="author"></input>
				<br /><br />

				<label>Category:</label><br />
				<select name="quote_category">
					<?php
					try
					{
						$statement = $db->prepare('SELECT category_id, category_name FROM category');
						$statement->execute();
						while ($row = $statement->fetch(PDO::FETCH_ASSOC))
						{
							$id = $row['category_id'];
							$name = $row['category_name'];
							echo "<option value=\"$id\">$name</option>";
						}
					}
					catch (PDOException $ex)
					{
						echo "Error connecting to DB. Details: $ex";
						die();
					}
					?>
				</select>
				<br /><br />
				<input type="submit" value="Add to Database" />
			</form>
		</div>
		</div>
  </body>
</html>
