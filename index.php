<!DOCTYPE html>
<html>
<head>
	<title>AppuntiAmici</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" integrity="sha256-aan9tQnm7lVach/6JxYyrQRlheajRD+UBDwwWo3tAHQ=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
		<!-- Inizio navbar -->
		<nav class="navbar is-dark">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item" href="index.php">
						<!-- LOGO -->
  						<img src="img/A.png" />
  						<img id="PpuntiAmici" src="img/PpuntiAmici.png" />
					</a>
					<span class="navbar-burger burger" data-target="navMenu">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</div>
				<div id="navMenu" class="navbar-menu">
					<div class="navbar-end">
						<div class="field" style="position:static; margin:20px;">
  							<div class="control">
							    <p class="control has-icons-right">
							    	<input class="input is-hover is-large is-rounded navbar-item" id="cerca" type="text" name="cerca" placeholder="Cerca" />
    								<span class="icon is-small is-right">
      									<i class="fas fa-search"></i>
    								</span>
  								</p>
							</div>
						</div>
						<p class="navbar-item"></p>
						<a href="index.php" class="button is-success is-outlined navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:5px;"><i class="fas fa-home"></i>-Home</a>
						<a href="contatti.php" class="button is-success navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:5px;"><i class="far fa-id-badge"></i>-Contatti</a>
						<a href="#" class="button is-success navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:10px;margin-left:5px;"><i class="fa fa-swatchbook"></i>-Materie</a>
						<p class="navbar-item"></p>
						<a href="signup.php" class="button is-danger navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:10px;">Registrati</a>
						<a href="signup.php" class="button is-danger navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:10px;">Accedi</a>
					</div>
					<!-- Utente -->
					<!--<a class="navbar-item"><?php  ?></a>-->
				</div>
			</div>
		</nav>
		<!-- Fine navbar -->


		<!-- Inizio contenuto Body -->
		<div class="hero-body">
			<div class="columns">
				<div class="column is-3">
					<img src="img/LogoCompleto.png">
				</div>
				<div class="column is-9">
					<p class="title is-1">Benventuo su <strong>AppuntiAmici</strong></p>
					<p class="subtitle is-4">Su <strong>A</strong>ppunti<strong>A</strong>mici troverai appunti condivisi da alunni per alunni</p>
					<p class="subtitle is-6">Registrati oppure accedi ed inizia a leggere subito gli appunti condivisi</p>
				</div>
			</div>
		</div>
		<!-- Fine contenuto Body -->

<script type="text/javascript">
	//funzione burger navbar
	(function() {
		var burger = document.querySelector('.burger');
		var nav = document.querySelector('#'+burger.dataset.target);

		burger.addEventListener('click', function(){
			burger.classList.toggle('is-active');
			nav.classList.toggle('is-active');
		});
	})();


</script>


</body>
</html>