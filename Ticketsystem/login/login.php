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

			//read from database
			$query = "select * from accounts where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ../index.php");
						die;
					}
				}
			}
			
			echo "Falscher benutzername oder passwort!";
		}else
		{
			echo "Falscher benutzername oder passwort!";
		}
	}
  
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password" ><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php" id="tst">Noch kein account? Klicke hier</a><br><br>
		</form>
	</div>
</body>
</html>