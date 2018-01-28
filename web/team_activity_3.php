<!DOCTYPE html>
<html>
  <head>
    <title>Team Activity 3</title>
  </head>
  <body>
    <h1>Student Info Form</h1>
    <form method="post" action="Teach03.php">
      <p>Name: <input type="text" name="name"></p>
      <p>Email: <input type="text" name="email"></p>
      <p>Major: </p>
      <?php
        $majors = array('CS' => 'Computer Science', 'WDD' => 'Web Design and Development', 'CIT' => 'Computer Information and Technology', 'CE' => 'Computer Engineering');
      ?>
      <input type="radio" name="major" value="CS">Computer Science<br />
      <input type="radio" name="major" value="WDD">Web Design and development<br />
      <input type="radio" name="major" value="CIT">Computer Information Technology<br />
      <input type="radio" name="major" value="CE">Computer Engineering</p>
      <p>Places visited:</p>
      <input type="checkbox" name="countries[]" value="NA">North America<br />
      <input type="checkbox" name="countries[]" value="SA">South America<br />
      <input type="checkbox" name="countries[]" value="EU">Europe<br />
      <input type="checkbox" name="countries[]" value="AS">Asia<br />
      <input type="checkbox" name="countries[]" value="AU">Australia<br />
      <input type="checkbox" name="countries[]" value="AF">Africa<br />
      <input type="checkbox" name="countries[]" value="AN">Antarctica<br />
      <p>Comments:</p>
      <textarea name="comment" rows="4" cols="45"></textarea>
      <br />
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
