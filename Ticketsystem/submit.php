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

// Formulardaten verarbeiten und in die Datenbank einfügen
$name = $_POST['reson'];
// $email = $_POST['email'];
$ticketname = "testt";

$sql = "INSERT INTO temm (name, email) VALUES ('$name', '$ticketname')";

if ($conn->query($sql) === TRUE) {
    echo "Formulardaten wurden erfolgreich in die Datenbank eingefügt.";
} else {
    echo "Fehler beim Einfügen der Formulardaten: " . $conn->error;
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

// Formulardaten verarbeiten und in die Datenbank einfügen
$name = $_POST['reson'];
// $email = $_POST['email'];
session_start();

	include("./login/connection.php");
	include("./login/functions.php");
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
function generateRandomID($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomID = '';
    for ($i = 0; $i < $length; $i++) {
        $randomID .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomID;
}

$minLength = 10;
$maxLength = 30;
$randomIDLength = rand($minLength, $maxLength);

$randomID = generateRandomID($randomIDLength);



$sql = "INSERT INTO tickets (name, ticketname, id) VALUES ('$name', '$ticketname', '$randomID')";

if ($conn->query($sql) === TRUE) {
    echo "Formulardaten wurden erfolgreich in die Datenbank eingefügt.";
} else {
    echo "Fehler beim Einfügen der Formulardaten: " . $conn->error;
}



$sql = "CREATE TABLE $randomID (
    Name VARCHAR(255),
    message VARCHAR(255),
    id VARCHAR(255)

)";

if ($conn->query($sql) === TRUE) {
    echo "Die Tabelle tickettt wurde erfolgreich erstellt.";
} else {
    echo "Fehler beim Erstellen der Tabelle: " . $conn->error;
}

$conn->close();
 header("Location: ./index.php");
exit;
?>
