<?php 
include 'db.php';
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
				<h2>Test Your Blockchain-ness Knowledge</h2>
				<p>
					This is a multiple choice quiz to gauge your blockchain knowledge.
				</p>
				<ul>
					<li><strong>Number of Questions:</strong><?php echo $total_questions; ?> </li>
					<li><strong>Type:</strong> Multiple Choice</li>
					<li><strong>Estimated Time:</strong> <?php echo $total_questions*1.5; ?></li>

				</ul>

				<a href="question.php?n=1" class="start">Start Quiz</a>

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
        <p class="reserved">all rights reserved,product of emobilis scholarship.</p>


	</footer>
