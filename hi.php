<?php
	if (isset($_POST["submit"])) {
		$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
		$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
		$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form';
		$to = 'ioannisnalmpantis@gmail.com';
		$subject = 'Message from nalb.io ';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Γράψε το όνομα σου';
		}
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Η διεύθυνση email δεν είναι υπαρκτή';
		}
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Παρακαλώ άφησε ένα μήνυμα για να επικοινωνήσω πίσω';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Η απάντηση δεν είναι σωστή';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Ευχαριστώ! Θα επικοινωνήσω το συντομότερο δυνατό</div>';
	} else {
		$result='<div class="alert alert-danger">Ουπς! Προέκυψε ένα λάθος, δοκίμασε να τηλεφωνήσεις στο 23210</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="gr" itemscope itemtype="https://schema.org/ProfessionalService">
<head>
	<meta charset="utf-8"/>

	<title>Ναλμπάντης Ιωάννης | Πολιτικός Μηχανικός ΑΠΘ | Επικοινωνία</title>
	<meta http-equiv="Content-Type" content="text/html">
	<meta name="keywords" content="Πολιτικός Μηχανικός, Σχέδια, ΑΠΘ, Αυθαίρετα, Υπηρεσίες">
	<meta name="author" content="Dimitri Ntempos">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="Iωάννης Ναλμπάντης, Μηχανικός ΑΠΘ">
	<meta itemprop="description" content="Επικοινωνία">
	<meta itemprop="image" content="http://nalb.io/back.png">

	<!-- Open Graph data -->
	<meta property="og:title" content="Ιωάννης Ναλμπάντης, Πολιτικός Μηχανικός ΑΠΘ">
	<meta property="og:description" content="Επικοινωνία">
	<meta property="og:url" content="http://nalb.io/">
	<meta property="og:image" content="http://nalb.io/back.png">
	<meta property="og:type" content="website">

	<!-- Style -->
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

	  ga('create', 'UA-73809812-1', 'auto');
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
			<li><a href="index.html"><span class="glyphicon glyphicon-home"></span>  Αρχική</a></li>
			<li><a href="services.html"><span class="glyphicon glyphicon-wrench"></span>  Υπηρεσίες</a></li>
			<li><a href="news.html"><span class="glyphicon glyphicon-info-sign"></span>  Ενημέρωση</a></li>
			<li class="active"><a href="hi.php"><span class="glyphicon glyphicon-earphone"></span> Επικοινωνία</a></li>
		</ul>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
					<h3>Διεύθυνση Επικοινωνίας:</h3>
								<address>
								<strong>Ναλμπάντης Γ. Ιωάννης</strong></br>
								Κ.Καραμανλή 42, 62125</br>
								Σέρρες, Ελλάδα</br>
								<abbr>Τηλ:</abbr> +30 23210 23307
								</address>
					<h3>Επικοινωνία μέσω email:</h3></br>
						<form class="form-horizontal" role="form" method="post" action="hi.php">
							<div class="form-group">
								<div class="col-sm-10">
									<textarea class="form-control" rows="1" name="message" placeholder="&ldquo;Θέλω ενεργειακό πιστοποιητικό..&ldquo;"><?php echo htmlspecialchars($_POST['message']);?></textarea>
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
					  var myLatLng = {lat: 41.086643, lng: 23.546627};

					  var map = new google.maps.Map(document.getElementById('map-container'), {
						zoom: 8,
						center: myLatLng
					});

					  var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: 'Ιωάννης Γ.Ναλμπάντης - Γραφείο'
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
		<li><a href="mailto:ioannisnalmpantis@gmail.com?"><img src="m.png" alt="m"></a></li>
		<li><a href="https://www.linkedin.com/in/nalmpantis-ioannis-76215050"><img src="l.png" alt="l"></a></li>
</ul>
	<p id="copy">Lovingly crafted by <a href="http://ntemposd.me">ntemposd</a></p>
</footer>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9AT56ano8YovTHby7l0uCu3I0PJrbGhs&signed_in=true&callback=initMap"></script>
</body>
</html>
