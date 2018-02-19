<?php
require("dbConnect.php");
$db = get_db();
$quote_content = htmlspecialchars($_POST['quote_content']);
$author_name = htmlspecialchars($_POST['author']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$category_id = htmlspecialchars($_POST['quote_category']);
// var_dump($course_id);
// var_dump($date);
// var_dump($content);

/*******************************************************************************
* Grab data for creating a new author.
*******************************************************************************/
$check_for_author_statement = $db->prepare("SELECT author_id, author_name FROM author WHERE author_name = :author_name");
$check_for_author_statement->bindValue(":author_name", $author_name, PDO::PARAM_STR);
$check_for_author_statement->execute();
$result = $check_for_author_statement->fetchAll(PDO::FETCH_ASSOC);
$author_id;
if(count($result) > 0) { // exists
  $author_id = $result[0]['author_id']; //gets first item in query and assigns it to author_id
} else {
  $new_author_statement = $db->prepare("INSERT INTO author (author_name) VALUES (:new_author_name) RETURNING author_id");
  $new_author_statement->bindValue(":new_author_name", $author_name, PDO::PARAM_STR);
  $new_author_statement->execute();
  $result = $new_author_statement->fetchAll(PDO::FETCH_ASSOC);
  $author_id = $result[0]['author_id']; //result is now result from insert table
}
// var_dump($author_id);

/*******************************************************************************
* Grab data for creating a new user
*******************************************************************************/
$check_for_person_statement = $db->prepare("SELECT person_id, username FROM person WHERE username = :username");
$check_for_person_statement->bindValue(":username", $username, PDO::PARAM_STR);
$check_for_person_statement->execute();
$result = $check_for_person_statement->fetchAll(PDO::FETCH_ASSOC);
$person_id;
if(count($result) > 0) {
  $person_id = $result[0]['person_id']; //gets first item in query and assigns it to person_id
  //it exists
} else {
  $new_person_statement = $db->prepare("INSERT INTO person (username, email_address) VALUES (:new_username, :new_email_address) RETURNING person_id");
  $new_person_statement->bindValue(":new_username", $username, PDO::PARAM_STR);
  $new_person_statement->bindValue(":new_email_address", $email, PDO::PARAM_STR);
  $new_person_statement->execute();
  $result = $new_person_statement->fetchAll(PDO::FETCH_ASSOC);
  $person_id = $result[0]['person_id']; //result is now result from insert table
}
// var_dump($person_id);

/*******************************************************************************
* Grab data for creating a new quote
*******************************************************************************/
$new_quote_statement = $db->prepare("INSERT INTO quote (quote_text, date_created, vote_count, picture_id, author_id, person_id) VALUES (:quote_content, CURRENT_DATE, 0, NULL, :author_id, :person_id) RETURNING quote_id");
$new_quote_statement->bindValue(":quote_content", $quote_content, PDO::PARAM_STR);
$new_quote_statement->bindValue(":author_id", $author_id, PDO::PARAM_INT);
$new_quote_statement->bindValue(":person_id", $person_id, PDO::PARAM_INT);
$new_quote_statement->execute();
$result = $new_quote_statement->fetchAll(PDO::FETCH_ASSOC);
$quote_id = $result[0]['quote_id'];

$new_quote_to_category_statement = $db->prepare("INSERT INTO quote_to_category (quote_id, category_id) VALUES (:quote_id, :category_id)");
$new_quote_to_category_statement->bindValue(":quote_id", $quote_id, PDO::PARAM_INT);
$new_quote_to_category_statement->bindValue(":category_id", $category_id, PDO::PARAM_INT);
$new_quote_to_category_statement->execute();
// var_dump($category_id);

$view_quotes_page = "view_quotes.php";
header("Location: $view_quotes_page");
die();
?>
