<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <style>header {
    background-color: orange;
    padding: 10px;
  }
  
  nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  
  nav ul li {
    display: inline;
    margin-right: 10px;
  }
  
  nav ul li a {
    text-decoration: none;
    color: #333;
    
  }
  body {
   background-color: white;
    
    background-size: cover;
  }  
  #text {
    background-color: white;
    font-size: 16px;
    text-align: center;
  }
  @keyframes slideIn {
    from {
      transform: translateY(100%);
    }
    to {
      transform: translateY(0);
    }
  }
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f1f1f1;
    color: #000;
    text-align: center;
    padding: 10px;
}</style>
  <title>Document</title>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="./index.php">Ticketsystem</a></li>
        <li><a href="./admin/index.php">Adminpage</a></li>
        <?php 
session_start();

include("./login/connection.php");
include("./login/functions.php");

$user_data = check_login($con);


?> 
      | Angemeldet als <?php echo $user_data['user_name']; ?> 
      <a href="./login/logout.php">Logout</a> <br>




      </ul>
    </nav>
  </header>
  <h1>TICKETSYSTEM GEÖFFNET</h1>
  <form action="submit.php" method="post">
    <label for="reson">Grund:</label>
    <input type="text" id="reson" name="reson" placeholder="Gebe dein Grund ein" required>

    <br><br>
      
    <h1>Tickets</h1>
    <?php /*
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Abrufen der Einträge mit der E-Mail-Adresse "test"
$email = "testt";
$sql = "SELECT * FROM temm WHERE email = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ausgabe der Einträge
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>";
        echo "E-Mail: " . $row["email"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Keine Einträge gefunden.";
}

$conn->close(); */



// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ticketss";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Abrufen der Einträge mit der E-Mail-Adresse "test"

  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "login";
  
  
  $connn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
  }
$user_data = check_login($connn);


$ticketname = $user_data['user_name'];
$email = "testt";
$sql = "SELECT * FROM tickets WHERE ticketname = '$ticketname'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ausgabe der Einträge
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>";
        echo "ticketname: " . $row["ticketname"] . "<br>";
        echo "id: ".$row["id"]."<br>";
        echo "
        echo '<a href=./tickets.php?id=".$row["id"].">Klicke hier, um zum Ticket zu gelangen</a>';";
        echo "<br>";
    }
} else {
    echo "Keine Tickets geöffnet.";
}
  echo "keine fehler gefunden";
$conn->close();
?>


    <br><br>

    <input type="submit" value="Eröffnen">
  </form>
</body>
</html>