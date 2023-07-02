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
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
} else {
    echo "Es wurde keine 'id' übergeben.";
}
$neuerInhalt = $id;
echo '<div id="e">' . $neuerInhalt . '</div>';

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ticketss";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage zum Abrufen der Einträge mit der E-Mail-Adresse "test"
$email = "testt";
$sql = "SELECT * FROM $id /* WHERE ticketname = '$email' */";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ausgabe der Einträge
    while ($row = $result->fetch_assoc()) {
        echo "------------------------------------------------------------- <br>";
        echo "Name: " . $row["Name"] . "<br>";
        echo "Nachricht: " . $row["message"] . "<br>";
        
    }
} else {
    echo "Keine Einträge gefunden, Starte die unterhaltung";
} /*
session_start();

include("../login/connection.php");
include("../login/functions.php");
$user_data = check_login($con);
*/
if (isset($_GET['id'])) {
    $id2 = $_GET['id'];
    
} else {
    echo "Es wurde keine 'id' übergeben.";
} /*
$sql = "SELECT ticketname FROM $id WHERE ticketname = '".$user_data['user_name']."'";

// SQL-Abfrage ausführen
$result = $conn->query($sql);

// Überprüfen, ob die Abfrage ein Ergebnis zurückgegeben hat
if ($result->num_rows > 0) {
    
} else {
    
    header("Location: ./index.php");
} */
$conn->close();

echo '<form action="submit2.php?id='.$id.'" method="post">
<label for="text">Text:</label>
<input type="text" id="text" name="text" placeholder="Gebe was ein" required>
<input type="submit" value="Eingabe">';



echo '<a href="close.php?id=' . $id2 . '"><u>Klicke hier, um zu schließen</u></a>';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <script>
    // Den Inhalt des HTML-Elements auslesen
    var divInhalt = document.getElementById("e").innerHTML;

    // Den Inhalt an PHP übergeben
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "submit2.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("inhalt=" + encodeURIComponent(divInhalt));
    </script>    
</body>
</html>
<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ticketss";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id2 = $_GET['id'];
    
} else {
    echo "Es wurde keine 'id' übergeben.";
}
session_start();

include("./login/connection.php");
include("./login/functions.php");

$user_data = check_login($con);
// SQL-Abfrage erstellen
$sql = "SELECT ticketname FROM `tickets` WHERE ticketname = '".$user_data['user_name']."' AND id = '$id2'";



// SQL-Abfrage ausführen
$result = $conn->query($sql);

// Überprüfen, ob die Abfrage ein Ergebnis zurückgegeben hat
if ($result->num_rows > 0) {
    
} else {
    header("Location: ./index.php");
}

// Verbindung zur Datenbank schließen
$conn->close();
?>