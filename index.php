<?php
    include_once 'dbh.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<title>Members Area</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<!--header section-->
		<header class = "header">
			<img src="image/copylogo.png" alt="logo"/>
			<nav class = "Navigation">
				<ul>
					<a href="index.html"><li>Home |</li></a>
					<li>About |</li>
					<li>Contact |</li>
					<li>Invest With Us</li>
					<input type="text" placeholder="Search"/>
				</ul>
			</nav>
		</header>
    <!--end of header section-->
</body>

<!--main bod section-->

<div class = "membersmain">
    
    <div class = "introsection">
        <?php
            echo  '<h2>Welcome Back <span> ' . $_SESSION['uid'] . '</span></h2>';
        ?>
        <form method="POST" action="logout.php">
            <button name="submit">Log Out</button>
        </form>
    </div>

    <div>
        <img src="image/png29.png"/>
    </div>


</div>

