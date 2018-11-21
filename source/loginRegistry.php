<?php
	include_once "server/connection.php";
	include_once "server/profileDB.php";

	session_start();

?>

<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>LOGIN</title>
	<script type="text/javascript" src="src/jquery-3.3.1.js"></script>
	<script src="js/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">
	<style type="text/css">

		body {
            background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("img/bg.jpg");

		}

		nav{
			padding: 20px 0px;
			text-align: center;
		}

		nav img{
			width: 280px;
		}

		#content{
			width: 280px;
			margin: 0 auto;
			padding: 10px 0px;
		}

		.divLoginRegistry{
			width: 280px;

			margin: 0 auto;
			margin-top: 15px;
			padding-top: 3px;


			border: dashed 1px grey;
			text-align: center;
			background-color: lightblue;
		}

		p{
			font-family: 'Josefin Sans', sans-serif;
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

		    font-family: 'Nanum Gothic', sans-serif;
		    text-align: center;
		    text-transform: lowercase;


		    cursor: auto!important;
		}

		button{
			background-color: #FC3667;
		}

	</style>
</head>
<body>
<nav>
	<img src="img/logo.png">
</nav>
		<div id="content">
			<div id="divLogin" class="divLoginRegistry">
				<p>LOGIN</p>
				<p id="errorLogin"></p>
				<form id="formLogin" method="POST">
					<input type="text" name="user" placeholder="Usuario" required>
					<input type="password" name="password" placeholder="Contraseña" required>
					<input type="submit" name="login" value="Iniciar sesión">
				</form>
			</div>

			<div id="divRegistry" class="divLoginRegistry">
				<p>REGISTRY</p>
				<p id="errorRegistry"></p>
				<form id="formRegistry" onsubmit="return validate(this, this.user)" method="POST">
					<input type="email" name="email" placeholder="Correo" required>
					<input type="text" name="user" placeholder="Usuario" required>
					<input type="password" name="password" placeholder="Contraseña" required>
					<input type="text" name="name" placeholder="Nombre">
					<input type="text" name="surname" placeholder="Apellido">
					<input type="submit" name="registry" value="Registrar">
				</form>
			</div>
	</div>
</body>
</html>


<?php
		//VERIFY LOGIN
		if(isset($_POST["login"])){
            $_SESSION["user"] = array ("userId" => "", "userName" => "", "userPhoto" => "");
   			$user = $_POST["user"];
    		$password = $_POST["password"];
			if ($password === selectPasswordProfile($user)) {
				$resul = selectDataProfile(selectIdProfile($user));
                foreach ($resul as $row){
                    $_SESSION["user"]["userId"] = $row["id"];
                    $_SESSION["user"]["userName"] = $row["user"];
                    $_SESSION["user"]["userPhoto"] = $row["photo"];
        		}
				header("Location: index.php");
			}else{
				echo "<p>NO</p>";
			}
		}
?>
