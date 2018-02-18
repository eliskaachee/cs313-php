<?php
require("dbConnect.php");
$db = get_db();
$quote_content = htmlspecialchars($_POST['quote_content']);
$author_name = htmlspecialchars($_POST['author']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
// var_dump($course_id);
// var_dump($date);
// var_dump($content);
// $check_for_author_query = $db->prepare("SELECT COUNT(*) FROM author WHERE author_name = '$author_name'");
// $check_for_author_query->execute();
// $row = $check_for_author_query->fetch(PDO::FETCH_ASSOC);
//
// if($row == 0) { // if author name doesn't already exist
  $new_author_query = "INSERT INTO author (author_name) VALUES (:new_author_name)";
  $new_author_statement = $db->prepare($new_author_query);
  $new_author_statement->bindValue(":new_author_name", $author_name, PDO::PARAM_STR);
  try {
    $new_author_statement->execute();
  } catch (Exception $ex) {
  //the name already exists
  }
// }

// $check_for_person_query = $db->query("SELECT username FROM person WHERE username = '$username'");
// if($check_for_person_query->num_rows == 0) { // if author name doesn't already exist
  $new_person_query = "INSERT INTO person (username, email_address) VALUES (:new_username, :new_email_address);";
  $new_person_statement = $db->prepare($new_person_query);
  $new_person_statement->bindValue(":new_username", $username, PDO::PARAM_STR);
  $new_person_statement->bindValue(":new_email_address", $email, PDO::PARAM_STR);
  try {
    $new_person_statement->execute();
} catch (Exception $ex) {
  // person already exists
}
// }

$new_person_query = "INSERT INTO person (username, email_address) VALUES (:new_username, :new_email_address);";
$new_person_statement = $db->prepare($new_person_query);
$new_person_statement->bindValue(":new_username", $username, PDO::PARAM_STR);
$new_person_statement->bindValue(":new_email_address", $email, PDO::PARAM_STR);
try {
  $new_person_statement->execute();
} catch (Exception $ex) {
// person already exists
}

$new_quote_query = "INSERT INTO quote (quote_text, date_created, vote_count, picture_id, author_id, person_id) VALUES (:quote_content, CURRENT_DATE, 0, NULL, (SELECT author_id FROM author WHERE author_name = '$author_name'), (SELECT person_id FROM person WHERE username = '$username'))";
$new_quote_statement = $db->prepare($new_quote_query);
$new_quote_statement->bindValue(":quote_content", $quote_content, PDO::PARAM_STR);
try {
	$new_quote_statement->execute();
} catch (Exception $ex) {
	echo "Error connecting to DB. Details: $ex";
	var_dump($ex);
	die();
}

$new_quote_to_category_query = "INSERT INTO quote_to_category (quote_id, category_id) VALUES (currval('quote_quote_id_seq'), (SELECT quote_id FROM person WHERE username = '$username'));";
$new_quote_to_category_statement = $db->prepare($new_quote_to_category_query);
try {
  $new_quote_to_category_statement->execute();
} catch (Exception $ex) {
// person already exists
}


$view_quotes_page = "view_quotes.php";
header("Location: $view_quotes_page");
die();
?>
