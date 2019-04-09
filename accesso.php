<?php
	//connessione tramite PDO 
	$hostname = "localhost";
	$dbname = "alternanza5ci";
	$user = "root";
	$pass = "";
	$db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
	if (!$db) {
		die ("Impossibile collegarsi al database");
	}

	$result=$db->query("SELECT * FROM istituti");
	$istituti=$result->fetchAll(PDO::FETCH_ASSOC);
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
                        <a href="signup.php" class="button is-danger is-outlined navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:10px;">Registrati</a>
                        <a href="signup.php" class="button is-danger navbar-item" style="position:static;margin-top:30px;margin-bottom:10px; margin-right:5px;margin-left:10px;">Accedi</a>
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
                        <form id="form" action="registrazione.php" onsubmit="registrati(event)" method="POST">
                            <article class="card is-rounded">
                                <div class="card-content">
                                    <h1 class="title is-1"><strong>Registrazione</strong></h1>
                                    <input class="input" type="text" name="nome" placeholder="Nome"><br><br>
                                    <input class="input" type="text" name="cognome" placeholder="Cognome"><br><br>
                                    <select class="input" name="id_istituto" id="istituti" onchange="selectIstitutiChanged()">
                                        <option value="0">-- Seleziona Istituto --</option>
                                        <?php
                                            foreach($istituti as $key => $value){
                                                echo "<option value='$value[id]'>$value[nome]</option>";
                                            }
                                        ?>
                                    </select><br><br>
                                    <select class="input" id="classi" name="id_classe" disabled="true">
                                        <option value="0">-- Seleziona Classe --</option>
                                    </select><br><br>

                                    <div class="field">
                                        <div class="control">
                                            <p class="control has-icons-right">
                                                <input class="input" id="email" type="text" name="email" placeholder="Email">
                                                <span id="disponibilita" class="icon is-small is-right"></span>
                                            </p>
                                        </div>
                                    </div><br>
                                    <input class="input" id="password" type="password" name="password" placeholder="Password" onkeyup="ParametriPassword();"/>
                                    <div id="Errore">
                                        <article class="message is-danger">    
                                            <div class="message-header">
                                                <p>Rispettare i seguenti parametri:</p>
                                            </div>
                                            <div class="message-body">
                                                <ul>
                                                    <li>Almeno una lettera maiuscola</li>
                                                    <li>Almeno una lettera minuscola</li>
                                                    <li>Almeno un numero</li>
                                                    <li>Almeno un carattere speciale</li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div><br><br>
                                    <button class="button is-primary is-medium is-fullwidth" id="BottoneRegistrazione" disabled="true">Registrati</button>
                                </div>
                            </article>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Fine body-->
    
    <script>
        //funzione burger navbar
        (function() {
            var burger = document.querySelector('.burger');
            var nav = document.querySelector('#'+burger.dataset.target);

            burger.addEventListener('click', function(){
                burger.classList.toggle('is-active');
                nav.classList.toggle('is-active');
            });
        })();

        //funzione per la registrazione
        function registrati(event){
            event.preventDefault();
            var formdata=$("#form").serialize();
            $.ajax({
                url:'registrazione.php',
                method: 'POST',
                data: formdata,
                dataType: 'json',
                success: function(result) {
                    alert("Registrazione effettuata");
                    //redirect
                    console.log(result);
                }
            })
        }

        //funzione per la ricerca delle classi tramite il passaggio in GET dell'istituto
        function cercaClassi(id_istituto) {
            $.ajax(
            {
                url: 'classi.php?id_istituto='+id_istituto,
                method: 'GET',
                dataType: 'json',
                success: function(classi) {
                    document.getElementById('classi').disabled=false
                    var option='<option value="0">-- Seleziona Classe --</option>';
                    for (prop of classi){
                        option += '<option value="'+prop.id+'">'+prop.anno+' '+prop.sezione+' '+prop.indirizzo+'</option>';
                    }
                    $('#classi').html(option)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }

        //Funzione nel caso di cambio del selezionamento dell'istituto
        function selectIstitutiChanged() {
            console.log('istituticambiato')
            var id_istituto = $('#istituti').val()
            cercaClassi(id_istituto)
        }

        //Funzione per l'inserimento della password
        function ParametriPassword(){
            var passwd = document.getElementById('password');
            var errore = document.getElementById('Errore');
            var bottone = document.getElementById('BottoneRegistrazione');

            if(passwd.value.length < 8){
                errore.style.display="block";
                bottone.disabled=true;
            } else if (passwd.value.length > 32) {
                errore.style.display="block";
                bottone.disabled=true;
            } else if (passwd.value.search(/\d/) == -1) {
                errore.style.display="block";
                bottone.disabled=true;
            } else if (passwd.value.search(/[a-zA-Z]/) == -1) {
                errore.style.display="block";
                bottone.disabled=true;
            } else if (passwd.value.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
                errore.style.display="block";
                bottone.disabled=true;
            } else {
                errore.style.display="none";
                bottone.disabled=false;
            }   
        }

        //Funzione per verificare che l'email non sia stata già inserita
    	$(document).ready(function(){
            $('#email').blur(function(){
                var email=$(this).val();
                var bottone = document.getElementById('BottoneRegistrazione');

                $.ajax({
                    url:'controllo.php',
                    method:"POST",
                    data:{email:email},
                    success:function(data){
                        if (data=='0') {
                            $('#disponibilita').html('<span id="disponibilita" class="icon is-small is-right"><i class="fas fa-check-circle"></i></span>');
                            $(bottone).attr("disabled",false);
                        } else {
                            $('#disponibilita').html('<span id="disponibilita" class="icon is-small is-right"><i class="fas fa-exclamation-circle"></i></span>');
                            $(bottone).attr("disabled",true);
                        }
                    }
                })
            });
            console.log('pagina caricata correttamente..')
    	})
    	
    </script>

</body>
</html>
