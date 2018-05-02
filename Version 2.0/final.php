<?php session_start(); ?>
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
				<h1>Quiz</h1>
			</div>
		</header>
		<main>
			<div class="container">
				
				<h2>Thank you for donating</h2>
				<p>Congrats! You have donated 20 ounces</p>
				<p>Ounces donated: <?php echo $_SESSION['score'] ?></p>
				<a href="question.php?n=1" class="start">Take Again</a>
			</div>			
		</main>
		<footer>
			<div class="container">
							Copyright &copy; 2018, CharityFree Quizzer
			</div>
		</footer>
	</body>
</html>