<?php include 'database.php'; ?>
<?PHP 
	if(isset($_POST['submit'])){
		//Get post variables
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		//Array before loading to DB for question choices
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];

		//insert data to Question via Query
		//query = "INSERT INTO `questions`(question_number, text) 
		//			VALUES('$question_number','$question_text')";

		//Run query
			insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

		//Validate insert
			if($insert_row){
				foreach($choices as $choice => $value){
					if($value != ''){
						if($correct_choice == $choice){
							$is_correct = 1;
						} else {
							$is_correct = 0;
						}
						//choice query

						$query = "INSERT INTO `choices` (question_number, is_correct, text)
								VALUES ('question_number','$is_correct','$value')";

								//run query
								$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

								//validate insert
								if($insert_row){
									continue;
								} else {
									die('Error : ('.$myqli->error . ') ' . $mysqli->error);
								}
					}

				}
				$msg = 'Question has been added';
			}


	}

	$query = "SELECT * FROM 'questions'";

	$questions = $mysql->query($query) or die($mysqli->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
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
				<?PHP 
					if(isset($msg)){
						echo '<p>'.$msg.'</p>';
					}
				?>

			</div>
		</header>
		<main>
			<div class="container">
				<h2>Add A Question</h2>
				<form method="post" action="add.php">
					<p>
						<label>Question Number</label>
						<input type="number" value="<?PHP echo $next; ?>" name="question_number"/>
					</p>
					<p>
						<label>Question Text</label>
						<input type="text" name="question_text"/>
					</p>
					<p>
						<label>Choice #1: </label>
						<input type="text" name="choice1"/>
					</p>
					<p>
						<label>Choice #2: </label>
						<input type="text" name="choice2"/>
					</p>
					<p>
						<label>Choice #3: </label>
						<input type="text" name="choice3"/>
					</p>
					<p>
						<label>Choice #4: </label>
						<input type="text" name="choice4"/>
					</p>
					<p>
						<label>Choice #5: </label>
						<input type="text" name="choice5"/>
					</p>
					<p>
						<label>Correct Choice Number: </label>
						<input type="text" name="correct_choice"/>
					</p>
					<p>
						<input type="submit" name="submit" value="submit"/>
					</p>
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