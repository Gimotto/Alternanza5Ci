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
	var_dump($istituti);
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
        
        <form class="box" action="registrazione.php" method="POST">
            <div class="TopText">
              <h1>Login</h1>
            </div><br><br><br>
            <input type="text" name="nome" placeholder="Nome"/>
            <input type="text" name="cognome" placeholder="Cognome"/>
            <select name="id_istituto">
            	<?php
            		foreach($istituti as $key => $value){
            			echo "<option value='$value[id]'>$value[nome]</option>";
            		}

            	?>
            </select>
            <input type="text" name="classe" placeholder="Classe"/>
          	<input type="email" name="email" placeholder="Email"/>
          	<input type="password" name="password" placeholder="Password"/>
          	<input type="submit" value="registrati"/>
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
    	$(document).ready(function(){

    		$.ajax(
    		{
    			url: 'classi.php?id_istituto=1',
    			method: 'GET',
    			dataType: 'json',
    			success: function(a) {
    				console.log(a);
    			}
    		})

    	})
    	
    </script>

</body>
</html>
