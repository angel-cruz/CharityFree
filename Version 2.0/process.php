<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
//check to see score is set_error_handler
//session is super global, handling score variable
	if(!isset($_SESSION['score'])){
		$SESSION['score'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];

		//grab and display whatever th euser submits
		$next = $number+1;

		//Get total
		$query = "SELECT * FROM `questions`";
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;

		//Get correct choice
		//in db correct isset to 1 incorrect set to 0

		$query = "SELECT  * FROM `choices`
		WHERE question_number = $number AND is_correct = 1";

		//Get result variable

		$result = $mysqli->query($query) or die(mysqli->error.__LINE__);

		//Get row
		$row = $result->fetch_assoc();

		//Set correct
		$correct_choice = $row['id'];

		//compare
		if($correct_choice == $selected_choice){
			//Answer is correct add to score
			$_SESSION['score']++;
		}
		//check if last question if else
		if($number == $total){
			header("Location: final.php");
			exit();

		} else {
			header("Location: question.php?n=".next);

		}
	}



?>