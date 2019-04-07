<!DOCTYPE html>
<html>
<head>
	<title>AppuntiAmici</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" integrity="sha256-aan9tQnm7lVach/6JxYyrQRlheajRD+UBDwwWo3tAHQ=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
		<!-- Inizio navbar -->
		<nav class="navbar" style="background-image: radial-gradient( circle farthest-corner at 12.3% 19.3%,  rgba(85,88,218,1) 0%, rgba(95,209,249,1) 100.2% );">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item" href="index.php" style="font-weight: bold;">
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
						<div class="field">
  							<div class="control">
							    <p class="control has-icons-right">
							    	<input class="input is-hover is-large navbar-item" id="Cerca" type="text" name="search" value="Cerca" readonly />
    								<span class="icon is-small is-right">
      									<i class="fas fa-search"></i>
    								</span>
  								</p>
							</div>
						</div>
						<a href="index.php" class="navbar-item is-active"><i class="fas fa-home"></i>-Home</a>
						<a href="contatti.php" class="navbar-item"><i class="far fa-id-badge"></i>-Contatti</a>
					</div>
					<!-- Utente -->
					<!--<a class="navbar-item"><?php  ?></a>-->
				</div>
			</div>
		</nav>
		<!-- Fine navbar -->


		<!-- Inizio contenuto Body -->
		<div class="hero-body">
			
		</div>
		<!-- Fine contenuto Body -->

<script type="text/javascript">
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