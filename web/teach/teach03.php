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

		<form action="teach03_in.php" method="post">
			<label for="name">Name:</label>
            <input type="text" name="name" id="name"><br/>
            <br/>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email"><br/>
            <br/>
            Select a Major:<br/>
            <input type="radio" name="major" id="cs" value="Computer Science">
            <label for="cs">Computer Science</label><br/>
            <input type="radio" name="major" id="wdd" value="Web Development and Design">
            <label for="wdd">Web Development and Design</label><br/>
            <input type="radio" name="major" id="cit" value="Computer Information Technology">
            <label for="cit">Computer Information Technology</label><br/>
            <input type="radio" name="major" id="ce" value="Computer Engineering">
            <label for="ce">Computer Engineering</label><br/>

          	<!-- ***** STRETCH CHALLENGE *****
			<?php 

			// assign the month digit to the month string
			$majors = array("Computer Science (CS)",
                 			"Web Development and Design (WDD)",
                 			"Computer Information Technology (CIT)",
                 			"Computer Engineering (CE)");

            foreach ($majors as $value) {
				echo "<input type='radio' name='major' value='{$value}'>{$value}<br>";
			} ?>
			-->

            <br/>
            Select the continents you have visited:<br/>
            <input type="checkbox" name="visit[]" id="na" value="North America">
            <label for="na">North America</label><br/>
            <input type="checkbox" name="visit[]" id="sa" value="South America">
            <label for="sa">South America</label><br/>
            <input type="checkbox" name="visit[]" id="eu" value="Europe">
            <label for="eu">Europe</label><br/>
            <input type="checkbox" name="visit[]" id="as" value="Asia">
            <label for="as">Asia</label><br/>
            <input type="checkbox" name="visit[]" id="au" value="Australia">
            <label for="au">Australia</label><br/>
            <input type="checkbox" name="visit[]" id="af" value="Africa">
            <label for="af">Africa</label><br/>
            <input type="checkbox" name="visit[]" id="an" value="Antarctica">
            <label for="an">Antarctica</label><br/>
            <br/>

			<!-- ***** STRETCH CHALLENGE *****
            <?php
				$continents = array("NA" => "North America",
                 					"SA" => "South America",
                 					"EU" => "Europe",
                 					"AS" => "Asia",
                 					"AU" => "Australia",
                 					"AF" => "Africa",
                 					"AN" => "Antarctica"); 

                 foreach ($continents as $key => $value) {
					echo "<input type='checkbox' name='visit[]' value='{$value}'>{$key}<br>";
				} ?> 
			-->

            <br>
            Add any comments below:<br/>
            <textarea rows="15" cols="75" name="comments"> </textarea>
            <br/>
            <input type="submit" value="Submit">
        </form>
		

		<footer>
			<ul>
				<li><small>Copyright &copy; 2017 Dallas Bleak</small></li>
			</ul>
		</footer>

	</body>
</html>