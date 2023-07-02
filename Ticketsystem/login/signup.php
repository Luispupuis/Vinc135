<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			
			$query = "insert into accounts (user_id,user_name,password) values ('$user_id','$user_name','$password')";
			
// Verbindung zur Datenbank herstellen (Voraussetzung: Datenbankverbindung ist bereits etabliert)


			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Bitte richtige infos angeben!";
		}
	} 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	Sorry Vinc musste ich so machen 

	<style type="text/css">
	input {
            color: white; /* Textfarbe auf Rot setzen */
        } 
	#text{

height: 25px;
border-radius: 5px;
padding: 4px;
border: solid thin #aaa;
width: 100%;
background-color: #1E1F22;
}

#button{

padding: 10px;
width: 100px;
color: white;
background-color: #5865F2;
border: none;
}

#box{

background-color: grey;
margin: auto;
background-color: #2B2D31;
width: 300px;
padding: 20px;
}
#tst {
background-color: #5865F2;
}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password" ><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php" id="tst">Schon ein account? Klicke hier zum anmelden</a><br><br>
		</form>
	</div>
</body>
</html>
<?php

?>