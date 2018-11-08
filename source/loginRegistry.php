<?php
	include_once "server/connection.php";
	include_once "server/loginRegistryDB.php";

	session_start();
	$_SESSION["user"] = "";
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<script type="text/javascript" src="src/jquery-3.3.1.js"></script>
	<style type="text/css">

		body {
			display: flex;
			flex-direction: column;
			justify-content: space-around;
		}

		nav{
			padding: 5% 0%;
			justify-content: space-around;
		}

		.divLoginRegistry{
			width: 280px;

			margin: 0 auto;
			margin-top: 5%;


			background-color: lightblue;
			text-align: center;
		}


		.divLoginRegistry input{
			display: inline-block;

 		    width: 90%;
 		    height: 36px;

		    padding: 8px;
		    margin: auto 0%;
		    margin-bottom: 10px;

		    border: 1px solid #e4e6e8;
		    border-radius: 0;

		    font-size: 100%;

		    text-align: center;
		    text-transform: lowercase;

		    cursor: auto!important;
		}

	</style>
</head>
<body>
<nav>
</nav>


	<div id="divLogin" class="divLoginRegistry">
		<p>Login</p>
		<p id="errorLogin"></p>
		<form id="formLogin" method="POST">
			<input type="text" name="user" placeholder="Usuario" required>
			<input type="password" name="password" placeholder="Contraseña" required>
			<input type="submit" name="login" value="Iniciar sesión">
		</form>
	</div>

	<div id="divRegistry" class="divLoginRegistry">
		<p>Registry</p>
		<p id="errorRegistry"></p>
		<form id="formRegistry" onsubmit="return request2server(this.id)" method="POST">
			<input type="email" name="email" placeholder="Correo" required>
			<input type="text" name="user" placeholder="Usuario" required>
			<input type="password" name="password" placeholder="Contraseña" required>
			<input type="text" name="name" placeholder="Nombre">
			<input type="text" name="surname" placeholder="Apellido">
			<input type="submit" name="registry" value="Registrar">
		</form>
	</div>
	<script>
		//AJAX VERIFY
        function request2server(idForm) {
            var form_data = $("#"+idForm).serialize();
            $.ajax({
                url: "server/verifyRegistry.php",
               data: form_data,
               type: "POST",
               success: function (data) {
               		debugger;
                   if(data === "success"){
                       $("#errorRegistry").html("Correcto");
                       $("#error").html("");
                   }else if(data === "errorUser"){
                       $("#errorRegistry").html("Usuario ya existe");
                   }else if(data === "errorEmail"){
                       $("#errorRegistry").html("Email ya existe");
                   }
               },
                error: function () {
                    console.log("ok");
                }
            });
            return false;
        }
    </script>
</body>
</html>


<?php
		//VERIFY LOGIN
		if(isset($_POST["login"])){
			$dbh = connect();
   			$user = $_POST["user"];
    		$password = $_POST["password"];
			if ($password === selectPasswordLogin($dbh, $user)) {
				$_SESSION["user"] = selectIdLogin($dbh, $user);
				echo $_SESSION["user"];
			}else{
				echo "<p>NO</p>";
			}
			$dbh = null;
		}
?>
