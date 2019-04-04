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
	echo "<pre>";
	print_r($istituti);
	echo "</pre>";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
          	<input type="email" name="email" placeholder="Email"/>
          	<input type="password" name="password" placeholder="Password"/>
          	<input type="submit" name="submit" value="registrazione">
        </form>
        <form action="index.php">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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

    	$(document).ready(function(){

            console.log('pagina caricata correttamente..')
    	})
    	
    </script>

</body>
</html>
