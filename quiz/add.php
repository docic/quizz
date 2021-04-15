<?php  include 'db.php';
if(isset($_POST['submit'])){
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	$choice[5] = $_POST['choice5'];

 // First Query for Questions Table

	$query = "INSERT INTO questions (";
	$query .= "question_number, question_text )";
	$query .= "VALUES (";
	$query .= " '{$question_number}','{$question_text}' ";
	$query .= ")";

	$result = mysqli_query($connection,$query);
	
	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			


				//Second Query for Choices Table
				$query = "INSERT INTO options (";
				$query .= "question_number,is_correct,coption)";
				$query .= " VALUES (";
				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
				$query .= ")";

				$insert_row = mysqli_query($connection,$query);
				// Validate Insertion of Choices

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);
					
				}

			}
		}
		$message = "Question has been added successfully";
	}

	




}

		$query = "SELECT * FROM questions";
		$questions = mysqli_query($connection,$query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;
		

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>restaurant website</title>

    <!-- Limk our css files here -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container" >
    <div class="logo">
        <a href="#" title="Logo">
            <img src="images/logo.png" alt="Restaurant logo" class="img-responsive">
        </a>
    </div>

	<header>
		<div class="container">
			<p class="block-name">BLOCKCHAIN PLUG QUIZ</p>
		</div>
	</header>

	<main>
			<div class="container">
				<h2>Add A Question</h2>
				<?php if(isset($message)){
					echo "<h4>" . $message . "</h4>";
				} ?>
								
				<form method="POST" action="add.php">
						<p>
							<label>Question Number:</label>
							<input type="number" name="question_number" value="<?php echo $next;  ?>">
						</p>
						<p>
							<label>Question Text:</label>
							<input type="text" name="question_text">
						</p>
						<p>
							<label>Choice 1:</label>
							<input type="text" name="choice1">
						</p>
						<p>
							<label>Choice 2:</label>
							<input type="text" name="choice2">
						</p>
						<p>
							<label>Choice 3:</label>
							<input type="text" name="choice3">
						</p>
						<p>
							<label>Choice 4:</label>
							<input type="text" name="choice4">
						</p>
						<p>
							<label>Choice 5:</label>
							<input type="text" name="choice5">
						</p>
						<p>
							<label>Correct Option Number</label>
							<input type="number" name="correct_choice">
						</p>
						<input type="submit" name="submit" value ="submit">


				</form>
			</div>

	</main>


	<footer>
        <section class="social">


            <div class="container text-center">
                <ul>
                    <li>
                        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/facebook--v2.png" alt="Facebook"/></a>
                    </li>
                    <li>
                        <a href="#"><img src="https://img.icons8.com/ios/50/000000/twitter--v2.png" alt="twitter"/></a>
                    </li>
                    <li>
                        <a href="#"><img src="https://img.icons8.com/ios-filled/50/000000/instagram--v2.png" alt="instagram"/></a>
                    </li>
                </ul>
            </div>
        </section>
       <p class="reserved"> all rights reserved,product of emobilis scholarship.</p>

	</footer>








</body>
</html>