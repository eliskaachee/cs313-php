<?php
require("dbConnect.php");
$db = get_db();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>View Quotes</title>
		<link rel="stylesheet" href="/css/quote_site.css">
		<!-- <link rel="stylesheet" href="/cs313-php/web/css/quote_site.css"> -->
	</head>
	<body>
    <div class="page-wrapper">
      <div class="quote-column">
    <?php
      if(isset($_POST["search_category"]) && $_POST["search_category"] != 'None') {
        echo '<h1>Quotes about ' . $_POST["search_category"] . '</h1>';
        $quote_table = $db->prepare('SELECT * FROM quote AS q JOIN author AS a ON q.author_id = a.author_id JOIN person p ON q.person_id = p.person_id JOIN quote_to_category qc ON q.quote_id = qc.quote_id JOIN category c ON qc.category_id = c.category_id WHERE category_name =:category_name');
        $quote_table->bindValue(':category_name', $_POST["search_category"], PDO::PARAM_STR);
        $quote_table->execute();
      } else {
        echo '<h1>Quotes</h1>';
        $quote_table = $db->query('SELECT * FROM quote AS q JOIN author AS a ON q.author_id = a.author_id JOIN person p ON q.person_id = p.person_id JOIN quote_to_category qc ON q.quote_id = qc.quote_id JOIN category c ON qc.category_id = c.category_id');
      }
      while ($row = $quote_table->fetch(PDO::FETCH_ASSOC))
      {
        // echo $_POST["search_category"];
        echo '<div class="quote box">';
          echo '<div class="votes">Votes:' . $row['vote_count'] . "</div>";
          echo '<div class="quote_text">';
            echo '<p>"' . $row['quote_text'] . '" --' . $row['author_name'] . '</p>';
            echo '<div class="quote_info">';
              echo '<span class="username">Added By: ' . $row['username'] . '</span>';
              echo 'Date Added: ' . $row['date_created'];
            echo '</div>';
          echo '</div>';
        echo '</div>';
      }
    ?>
  </div>
  <div class="search-column box">
    <p>Search by Category</p>
    <form action="#" method="post">
    <select name="search_category">
      <?php
      // try
      // {
      //   // $user = 'postgres';
      //   // $password = 'Crochet11';
      //   // $db = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', $user, $password);
      //   // $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      //   $dbUrl = getenv('DATABASE_URL');
      //
      //   $dbopts = parse_url($dbUrl);
      //
      //   $dbHost = $dbopts["host"];
      //   $dbPort = $dbopts["port"];
      //   $dbUser = $dbopts["user"];
      //   $dbPassword = $dbopts["pass"];
      //   $dbName = ltrim($dbopts["path"],'/');
      //   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
      // }
      // catch (PDOException $ex)
      // {
      //   echo 'Error!: ' . $ex->getMessage();
      //   die();
      // }

      $category_list = $db->query('SELECT * FROM category');
      echo '<option value="None">None</option>';
      while ($row = $category_list->fetch(PDO::FETCH_ASSOC))
      {
        echo '<option value="' . $row['category_name'] . '">' . $row['category_name'] . '</option>';
      }
      ?>
    </select>
    <input type="submit" value="Search">
  </form>
  </div>
  </div>
  </body>
</html>
