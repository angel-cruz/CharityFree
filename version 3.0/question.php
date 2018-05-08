<?php include 'database.php'; ?>
<!-- above script includes the database-->

<?php session_start(); ?>

<?php 
//section for queries , ideally i should use MVC
//Set question number

$number = (int) $_GET['n'];

//Get total
		$query = "SELECT * FROM `questions`";
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;

//Get Question query
//Error: back tick and reg tick different ` vs '
$query = "SELECT * FROM `questions`
			WHERE question_number = $number";

			//Get results informative error below script
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

			//assigne variable to use

			$question = $result->fetch_assoc();

			//Get Choices Query
			//Query below spits out every choice which is stored within a variable unlike above questions query
			$query = "SELECT * FROM `choices`
			WHERE question_number = $number";

			//Get results
			$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

			//assigne variable to use

			
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ntf-8"></meta>
		<title>CharityFree</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>CharityFree Question</h1>
			</div>
		</header>
		<main>
			<div class="container">
				<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
				<p class="question">
					<!--Questions table use questions text -->
					<?php echo $question['text']; ?>
				</p>
				<form method="post" action="process.php">
					<ul class="choices">
						<!--While there is still records spit out choices -->
						<?php while($row = $choices->fetch_assoc()): ?>
						<!-- change to dynamic values-->
						<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>

						<?php endwhile; ?>
						<!-- on submit it will be processed to process.php-->
					</ul>
					<input type="submit" value="submit">
					<input type="hidden" name="number" value="<?php echo $number; ?>">
				</form>

			</div>			
		</main>
		<footer>
			<div class="container">
							Copyright &copy; 2018, CharityFree Quiz
			</div>
		</footer>
	</body>
</html>