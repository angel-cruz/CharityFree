<?php include 'database.php'; ?>
<?php
//Get total number of questions dynamically
$query = "SELECT * FROM questions";
//created query and ran it below
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;


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
				<h1>CharityFree Quiz</h1>
			</div>
		</header>
		<main>
			<div class="container">
				<h2>Answer Question & Fight Hunger</h2>
				<p>For each answer you get right, we donate 10 ounces of raw food through the world Food Programme to help end hunger</p>
				<ul>
					<li><strong>Number of Questions:</strong> <?php echo $total; ?></li>
				 	<li><strong>Type:</strong> Multiple Choice</li>
					<li><strong>Estimated Time:</strong> <?php echo $total * .5; ?> minutes</li>
				</ul>

				<a href="question.php?n=1" class="start">Start Quiz</a>

			</div>			
		</main>
		<footer>
			<div class="container">
							Copyright &copy; 2018, CharityFree Quiz
			</div>
		</footer>
	</body>
</html>
