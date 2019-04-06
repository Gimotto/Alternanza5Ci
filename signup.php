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
    <!-- CDN BULMA -->
	<style type="text/css">
        #Errore{
            display: none;
        }  
    </style>
</head>
<body>
	<div id="login-box" align="center" style="height: 600px;">
        
        <form class="box" id="form" action="registrazione.php" onsubmit="registrati(event)" method="POST">
            <div class="TopText">
              <h1>Login</h1>
            </div><br><br><br>
            <input type="text" name="nome" placeholder="Nome"/>
            <input type="text" name="cognome" placeholder="Cognome"/>
            <select name="id_istituto" id="istituti" onchange="selectIstitutiChanged()">
                <option value="0">-- Seleziona Istituto --</option>
            	<?php
            		foreach($istituti as $key => $value){
            			echo "<option value='$value[id]'>$value[nome]</option>";
            		}

            	?>
            </select>
            <select id="classi" name="id_classe">
            </select>
          	<input id="email" type="email" name="email" placeholder="Email"/>
          	<input id="password" type="password" name="password" placeholder="Password" onkeyup="ParametriPassword();"/><br>
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
            </div>
          	<input id="registrazione" type="submit" name="submit" value="registrazione">
        </form>
        <form action="index.php">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <h3>OPPURE</h3>
          <div align="center">
            <input type="submit" value="Accedi"/>
          </div>
        </form>
    </div>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.1.js" type="text/javascript"></script>
    <script>
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

        function cercaClassi(id_istituto) {
            $.ajax(
            {
                url: 'classi.php?id_istituto='+id_istituto,
                method: 'GET',
                dataType: 'json',
                success: function(classi) {
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

        function selectIstitutiChanged() {
            console.log('istituticambiato')
            var id_istituto = $('#istituti').val()
            cercaClassi(id_istituto)
        }

        //da controllare
        function ParametriPassword(){
            var passwd = document.getElementById('password');
            var errore = document.getElementById('Errore');
            var bottone = document.getElementById('Registrazione');

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


    	$(document).ready(function(){

            $('#email').blur(function(){
                var email=$(this).val();

                $.ajax({
                    url:'controllo.php',
                    method:"POST",
                    data:{email:email},
                    success:function(data){
                        if (data=='0') {
                            $('#disponibilita').html('<span>Email non ancora registrata</span>');
                            $('#registrazione').attr("disabled",false);
                        } else {
                            $('#disponibilita').html('<span>Email già registrata</span>');
                            $('#registrazione').attr("disabled",true);
                        }
                    }
                })
            });



            console.log('pagina caricata correttamente..')
    	})
    	
    </script>

</body>
</html>
