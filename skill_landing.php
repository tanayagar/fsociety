<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	This is a template we found crawling in the infinite pool of web, we are bots and
	we keep what we crawl on
-->
<html>
	<head>
		<title>Landing Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	    <link href="images/fsociety.png" rel="icon" type="image/png" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo"><strong>fsociety</strong> <span>by Debarredbots</span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<li><a href="landing.php">Universal Database</a></li>
							<li><a href="landing.php">Ask-a-bot</a></li>
							<li><a href="skillrack.php">Skillrack</a></li>
						</ul>
						<ul class="actions vertical">
							<li><a href="#" class="button special fit">Get Started</a></li>
							<li><a href="landing.php" class="button fit">Log In</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Practice Problem</h1>
										<p>Date of the upload&nbsp
										Total Time : 600 mins&nbsp
										Challenges : 5</p>
									</header>
									<h3>Question 1 :</h3>
									<p> Question Text</p>
									<h3>Solution</h3>
									<pre><code>#include &ltstdio.h&gt</code></pre>
									<!--<script src="//onlinegdb.com/embed/js/rk98aZyWf" type="text/javascript"></script>-->
								</div>
							</section>

					</div>

					<!-- Comment Section -->
					<div id="main" class="alt">
						<div class="inner">
							<header class="major">
								<h2> Comment Section </h2>
							</header>
							<?php
							    date_default_timezone_set('Asia/Calcutta');
								$conn=mysqli_connect('localhost','id3671018_vbhv','123456','id3671018_vit');
								$sql2="SELECT * FROM `comments` where `page`='pp1'";
								$result2=mysqli_query($conn,$sql2);
								while($row=mysqli_fetch_array($result2))
								{
									echo "<h4>".$row['name']."</h4>" .$row['dat']. "&nbsp&nbsp".$row['time'].  "<br/><p><i>".$row['message']."</i></p><hr/><br/><br/>";
								}
							?>
							<h5> Drop your comments here</h5>
							<form method="post" name='comment' action="interstitial.php">
								<div class="field half first">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" required/>
								</div>
								<div class="field half">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" required/>
								</div>
								<div class="field">
									<label for="message">Message</label>
									<textarea name="message" id="message" rows="4" required></textarea>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" class="special" /></li>
									<li><input type="reset" value="Clear" /></li>
								</ul>
								<input type="hidden" name="page" value="pp1">
							</form>
						</div>
					</div>

				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
								<header class="major">
										<h2>Other links</h2>
										<p>Coming Soon...</p>
								</header>
							</section>
							<section class="split">
								<section>
									<div class="contact-method">
										<span class="icon alt fa-envelope"></span>
										<h3>Email</h3>
										<a href="mailto:lucifer@fsociety.co.in">lucifer@fsociety.co.in</a>
										<a href="mailto:raggedyman@fsociety.co.in">raggedyman@fsociety.co.in</a>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon alt fa-phone"></span>
										<h3>Phone</h3>
										<span>01100010  01101111  01110100</span>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon alt fa-home"></span>
										<h3>Address</h3>
										<span>104.31.64.158</span>
									</div>
								</section>
							</section>

						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; DebarredBots</li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
