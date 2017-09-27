<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
  		<meta name="author" content="Dallas Bleak">
		<title>Teach 03 Form</title>
	</head>
	<body>
		<header class="header">
			<h1>Teach 03 Form</h1>
		</header>
  
    <form action="teach03input.php" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name"><br>
      <br>
      <label for="email">Email:</label>
      <input type="text" name="email" id="email"><br>
      <br>
      Select a Major:<br>
      <!--
      <input type="radio" name="major" id="cs" value="Computer Science">
      <label for="cs">Computer Science</label><br>
      <input type="radio" name="major" id="cit" value="Computer Information Technology">
      <label for="cit">Computer Information Technology</label><br>
      <input type="radio" name="major" id="wdd" value="Web Design and Development">
      <label for="wdd">Web Design and Development</label><br>
      <input type="radio" name="major" id="ce" value="Computer Engineering">
      <label for="ce">Computer Engineering</label><br>
      <br>
    -->

      <?php 

      $majors = array("Computer Science (CS)",
                      "Computer Information Technology (CIT)",
                      "Web Design and Development (WDD)",
                      "Computer Engineering (CE)");

      foreach ($majors as $value) {
        echo "<input type='radio' name='major' value='$value'>$value<br>";
      }
      echo "<p></p>";
      ?>

      <br>
      Select the continents you have visited:<br>
      <input type="checkbox" name="visit[]" id="na" value="NA">
      <label for="na">North America</label><br>
      <input type="checkbox" name="visit[]" id="sa" value="SA">
      <label for="sa">South America</label><br>
      <input type="checkbox" name="visit[]" id="eu" value="EU">
      <label for="eu">Europe</label><br>
      <input type="checkbox" name="visit[]" id="as" value="AS">
      <label for="as">Asia</label><br>
      <input type="checkbox" name="visit[]" id="au" value="AU">
      <label for="au">Australia</label><br>
      <input type="checkbox" name="visit[]" id="af" value="AF">
      <label for="af">Africa</label><br>
      <input type="checkbox" name="visit[]" id="an" value="AN">
      <label for="an">Antartica</label><br>


      <br><br>

      Add any comments below:<br>
      <textarea rows="15" cols="60" name="comments"></textarea>
      <br>
      <input type="submit" value="Submit">
    </form>

	</body>
</html>