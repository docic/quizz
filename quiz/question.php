<?php 
	include 'db.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	//Query for the Question
	$query = "SELECT * FROM questions WHERE question_number = $number";

	// Get the question
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 

	//Get Choices
	$query = "SELECT * FROM options WHERE question_number = $number";
	$choices = mysqli_query($connection,$query);
	// Get Total questions
	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
 	
	
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>restaurant website</title>

    <!-- Link our css files here -->
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
				<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
				<p class="question"><?php echo $question['question_text']; ?> </p>
				<form method="POST" action="process.php">
					<ul class="choicess">
						<?php while($row=mysqli_fetch_assoc($choices)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['coption']; ?></li>
						<?php } ?>
						
						
					</ul>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit">


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
        <p>all rights reserved,product of emobilis scholarship.</p>

	</footer>








</body>
</html>