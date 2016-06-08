<?php
	if (isset($_POST["submit"])) {
		$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
		$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
		$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
		$human = intval($_POST['human']);
		$from = 'Contact Form';
		$to = 'Service providersemail';
		$subject = 'What appears at service provider inbox when somenone uses the form';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Error message for no name';
		}
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Error message for wrong email';
		}
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Error message for no message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Error message for wrong anti-bot question';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Message after succesful delivery</div>';
	} else {
		$result='<div class="alert alert-danger">Generic error message</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="gr" itemscope itemtype="https://schema.org/ProfessionalService">

<head>
	<meta charset="utf-8"/>

	<title>Page title</title>
	<meta http-equiv="Content-Type" content="text/html">
	<meta name="keywords" content="Provider's name, Provider's profession, Service-1, Service-2,">
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.">
	<meta name="robots" content="NOODP">
	<meta name="author" content="Your Name">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="Provider's name">
	<meta itemprop="description" content="Provider's profession">
	<meta itemprop="image" content="The thumb you want to appear while sharing">

	<!-- Open Graph data -->
	<meta property="og:title" content="Provider's name">
	<meta property="og:description" content="Provider's profession">
	<meta property="og:url" content="The url of the website">
	<meta property="og:image" content="The thumb you want to appear while sharing">
	<meta property="og:type" content="website">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="simple.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'Your ga tracking ID', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
	      <span class="icon-bar"></span>
        <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		</button>
	</div>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
			<li><a href="services.html"><span class="glyphicon glyphicon-wrench"></span>  Services</a></li>
			<li><a href="news.html"><span class="glyphicon glyphicon-info-sign"></span>  News</a></li>
			<li><a href="hi.php"><span class="glyphicon glyphicon-earphone"></span>  Contact</a></li>
		</ul>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
					<h3>Mailing Address:</h3>
								<address>
								<strong>Office Name</strong></br>
								Address, Post Code</br>
								City, Country</br>
								<abbr>Phone</abbr> Phone number
								</address>
					<h3>Contact through e-mail</h3></br>
						<form class="form-horizontal" role="form" method="post" action="hi.php">
							<div class="form-group">
								<div class="col-sm-10">
									<textarea class="form-control" rows="1" name="message" placeholder="&ldquo;Helper text..&ldquo;"><?php echo htmlspecialchars($_POST['message']);?></textarea>
									<?php echo "<p class='text-danger'>$errMessage</p>";?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<input type="text" class="form-control" id="human" name="human" placeholder="2 + 3 = ?">
									<?php echo "<p class='text-danger'>$errHuman</p>";?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<input type="email" class="form-control" id="email" name="email" placeholder="Διεύθυνση email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
									<?php echo "<p class='text-danger'>$errEmail</p>";?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" placeholder="Όνομα επικοινωνίας" value="<?php echo htmlspecialchars($_POST['name']); ?>">
									<?php echo "<p class='text-danger'>$errName</p>";?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<input id="submit" name="submit" type="submit" value="Στείλε!" class="btn btn-primary">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<?php echo $result; ?>
								</div>
							</div>
						</form>
		</div>

		<div id="map-outer" class="col-md-5">
			<h3>Χάρτης:</h3>
			<div id="map-container"></div>
				<script>
					function initMap() {
					  var myLatLng = {lat: Office address lat, lng: Office address lng};

					  var map = new google.maps.Map(document.getElementById('map-container'), {
						zoom: 8,
						center: myLatLng
					});

					  var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: 'Name that appears on the map'
					});

					}
				</script>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
<div class="pad"></div>
<footer class="footer">
	<ul>
		<li><a href="mailto:"provider email"?"><img src="m.png" alt="m"></a></li>
		<li><a href="provider linkedin profile link"><img src="l.png" alt="l"></a></li>
</ul>
	<p id="copy">Lovingly crafted by <a href="your website">your name</a></p>
</footer>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key= Your Google Maps Key _in=true&callback=initMap"></script>
</body>
</html>
