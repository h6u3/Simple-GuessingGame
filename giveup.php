<?php
	session_start();
	if(!isset($_SESSION["rNum"])){
		$_SESSION["rNum"] = "\"Error: Game was not initiated.\"";
	}
	$rNum = $_SESSION["rNum"];
?>
<html>
	<head>
		<title>Guessing Game</title>
	</head>
	<body>
		<h1>Guessing Game</h1>
		
		<?php
			echo "<p>The hidden number was: $rNum</p>";
		?>
		<p><a href="startover.php">Start Over</a></p>
	</body>
</html>