<?php 
	$connessione=mysqli_connect("localhost","root","","alternanza5ci");
	if(!$connessione){die("Connessione al database non avvenuta. Errore: ".mysqli_error());}


	
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>AppuntiAmici</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" integrity="sha256-aan9tQnm7lVach/6JxYyrQRlheajRD+UBDwwWo3tAHQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.1.js" type="text/javascript"></script>
    <style type="text/css">
        #Errore{
            display: none;
        }  
    </style>
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
                        <a href="index.php" class="button is-success navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:5px;"><i class="fas fa-home"></i>-Home</a>
                        <a href="contatti.php" class="button is-success navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:5px;"><i class="far fa-id-badge"></i>-Contatti</a>
                        <a href="#" class="button is-success navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:10px;margin-left:5px;"><i class="fa fa-swatchbook"></i>-Materie</a>
                        <p class="navbar-item"></p>
						<a href="signup.php" class="button is-danger navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:10px;">Registrati</a>
                        <a href="login.php" class="button is-danger is-outlined navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:10px;">Accedi</a>
                    </div>
                    <!-- Utente -->
                    <!--<a class="navbar-item"><?php  ?></a>-->
                </div>
            </div>
        </nav>
    <!-- Fine navbar -->

	 <!-- Inizio body-->
	 <div id="privato">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <form id="form" action="accesso.php" method="POST">
                            <article class="card is-rounded">
                                <div class="card-content">
                                    <h1 class="title is-1"><strong>Accedi</strong></h1>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control has-icons-right">
                                                <input class="input" id="email" type="text" name="email" placeholder="Email">
                                                <span id="disponibilita" class="icon is-small is-right"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <input class="input" id="password" type="password" name="password" placeholder="Password" onkeyup="Controllo();" />
									<br><br>
                                    <button class="button is-primary is-medium is-fullwidth" id="BottoneAccedi" >Accedi</button>
									<!--<div id="ErroreEmail"><br>
                                        <article class="message is-danger">    
                                            <div class="message-header">
                                                <p>I seguenti dati inseriti sono errati:</p>
                                            </div>
                                            <div class="message-body">
                                                <ul>
                                                    <li>Email</li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div><br><br> -->
                                </div>
                            </article>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Fine body-->
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

	

	//funzione per il controllo email
	/*$(document).ready(function(){
            $('#email').blur(function(){
                var email=$(this).val();
                var bottone = document.getElementById('BottoneRegistrazione');

                $.ajax({
                    url:'controllo.php',
                    method:"POST",
                    data:{email:email},
                    success:function(data){
                        if (data=='0') {
                            $('#disponibilita').html('<span id="disponibilita" class="icon is-small is-right"><i class="fas fa-check-circle" style="color:green"></i></span>');
                            $(bottone).attr("disabled",false);
                        } else {
                            $('#disponibilita').html('<span id="disponibilita" class="icon is-small is-right"><i class="fas fa-exclamation-circle" style="color:red"></i></span>');
                            $(bottone).attr("disabled",true);
                        }
                    }
                })
            });
            console.log('pagina caricata correttamente..')
    	})


	function Controllo(){
		
		var erroreemail = document.getElementById('ErroreEmail');
		erroreemail.style.display="block";


	} */

</script>