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
    header("Location: ./tickets.php?id=".$id2);
} else {
    header("Location: ./index.php");
}

// Verbindung zur Datenbank schließen
$conn->close();
?>
