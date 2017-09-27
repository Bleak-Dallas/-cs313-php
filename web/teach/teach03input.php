<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
  		<meta name="author" content="Dallas Bleak">
		<title>Teach 03 Form Display</title>
	</head>
	<body>
		<header class="header">
			<h1>Teach 03 Form Display</h1>
		</header>
  
  <?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $major = filter_input(INPUT_POST, 'major', FILTER_SANITIZE_STRING);
      $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
      $continents = $_POST['visit'];
    }

      $continentTranslate = array("NA" => "North America", 
                                  "SA" => "South America",
                                  "EU" => "Europe",
                                  "AS" => "Asia",
                                  "AU" => "Australia",
                                  "AF" => "Africa",
                                  "AN" => "Antartica");

    echo "<strong>NAME: </strong>$name<br><br>";
    echo "<strong>EMAIL: </strong><a href='mailto:$email'> $email</a><br><br>";
    echo "<strong>MAJOR: </strong>$major<br><br>";
    echo "<strong>CONTINENTS VISITED: </strong>";
      foreach ($continents as $value) {
        echo "<br>" . $continentTranslate[$value];
      }
    echo "<br><br>";
    echo "<strong>COMMENTS: </strong>$comments<br><br>";

  ?>

	</body>
</html>