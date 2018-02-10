<?php
try
{
  $user = 'postgres';
  $password = 'Crochet11';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=postgres', $user, $password);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}


foreach ($db->query('SELECT * FROM quote') as $row)
{
    echo 'quote_id: ' . $row['quote_id'];
    echo 'quote_text: ' . $row['quote_text'];
    echo 'date_created: ' . $row['date_created'];
    echo 'vote_count: ' . $row['vote_count'];
    echo 'picture_id: ' . $row['picture_id'];
    echo 'author_id: ' . $row['author_id'];
    echo 'person_id: ' . $row['person_id'];
    echo '<br/>';
}
?>
