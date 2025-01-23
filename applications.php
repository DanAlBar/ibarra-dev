<?php
	session_start();
?>

<html>
<head>
	<title>Math Quiz</title>
	<link rel ="stylesheet" type="text/css" href="quiz.css">
</head>

<body>
<?php
    print ("<div class='heading'>");
    if (!isset($_SESSION['score']))
	{
    // set our sessions
		$_SESSION['score'] = 0;
		$_SESSION['count'] = 0;
		print (" <h1>Welcome to the Math Quiz!</h1> ");
	}

	if (isset($_POST['userAnswer']))
	{

    // count pattern
		$_SESSION['count'] = $_SESSION['count'] + 1;

    // get the user answer
		$userAnswer = $_POST['userAnswer'];

    // use the session num1 and num2 to calculate the correct answer
		$correctAnswer = $_SESSION['num1'] + $_SESSION['num2'] + $_SESSION['num3'] + $_SESSION['num4'] + $_SESSION['num5'] + $_SESSION['num6'] + $_SESSION['num7'];

		if ($correctAnswer == $userAnswer)
		{
      // the counting pattern is used to add 1 to the score
			$_SESSION['score'] = $_SESSION['score'] + 1;
      
			print (" <h1>That is correct!</h1> ");
		}
		else
			print ("<h1>Sorry! The correct sum is $correctAnswer</h1>");
	}
    print ("</div>");

	print("<p>SCORE SO FAR: <strong>".$_SESSION['score']."</strong> OUT OF A POSSIBLE <strong>".$_SESSION['count']."</strong></p>");

	print ("<h2>Can you add these numbers?</h2>");
  // HTML form starts here
	print ("<form action = \"sessions-quiz.php\" method = \"post\" >");
	$_SESSION['num1'] = rand(1, 50);
	$_SESSION['num2'] = rand(1, 50);
  $_SESSION['num3'] = rand(1, 50);
  $_SESSION['num4'] = rand(1, 50);
  $_SESSION['num5'] = rand(1, 50);
  $_SESSION['num6'] = rand(1, 50);
  $_SESSION['num7'] = rand(1, 50);

	print("<label style=\"width: 200px;\">".$_SESSION['num1']." + ".$_SESSION['num2']." + ".$_SESSION['num3']." + ".$_SESSION['num4']." + ".$_SESSION['num5']." + ".$_SESSION['num6']." + ".$_SESSION['num7']." = ");
	print("<input type = \"text\" size = \"10\" name = \"userAnswer\"></label>");

	print("<input class = \"submit\" type = \"submit\" value = \"Submit\"></form>");
	print("<p><a href=\"sessions-quit.php\">Ready to quit?</a></p>");
?>
</body>
</html>
