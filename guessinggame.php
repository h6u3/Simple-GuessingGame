<?php
	session_start();
	if(!isset($_SESSION["rNum"]) && !isset($_SESSION["numGuess"]) && !isset($_SESSION["guessedCorrect"])){
		$_SESSION["rNum"] = rand(1,100);
		$_SESSION["numGuess"] = 0;
		$_SESSION["guessedCorrect"] = false;
	}
	$rNum = $_SESSION["rNum"];
	$numGuess = $_SESSION["numGuess"];
	$guessedCorrect = $_SESSION["guessedCorrect"];
?>
<html>
	<head>
		<title>Guessing Game</title>
	</head>
	<body>
		<h1>Guessing Game</h1>
		<p>Enter a number between 1 and 100, <br />then press the Guess button.</p>
		
		<form method="POST" action="guessinggame.php">
			<input type="text" name="num" id="num">
			<input type="submit" value="Guess">
		</form>
		
		<?php
			if(isset($_POST['num'])){
				$num = $_POST['num'];
				if(is_numeric($num) && $num <= 100 && $num >= 1){
					if($num == $rNum){
						$guessedCorrect = true;
					}
					$numGuess = $_SESSION["numGuess"];
					$numGuess++;
					$_SESSION["numGuess"] = $numGuess;
					if($guessedCorrect){
						echo "<p>Congratulations! You guessed the hidden number.</p>";
					}
					else{
						if($num < $rNum){
							echo "<p>The hidden number is higher than $num</p>";
						}
						elseif($num > $rNum){
							echo "<p>The hidden number is lower than $num</p>";
						}
					}
				}
				else{
					echo "<p>Please input a number between 1 and 100.</p>";
				}
			}
			echo "<p>Number of guesses: $numGuess</p>";
		?>
		<p><a href="giveup.php">Give Up</a></p>
		<p><a href="startover.php">Start Over</a></p>
	</body>
</html>