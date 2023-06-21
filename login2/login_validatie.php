<!-- Author:Amin -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

try {
    // Maak een PDO-verbinding met de database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Zet de PDO-error modus op uitzonderingen
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $ingelogd = false;
    $melding = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];

        // Bereid de SQL-query voor
        $stmt = $conn->prepare("SELECT * FROM login  WHERE username = :gebruikersnaam AND wachtwoord = :wachtwoord");
        $stmt->bindParam(":gebruikersnaam", $gebruikersnaam);
        $stmt->bindParam(":wachtwoord", $wachtwoord);

        // Voer de query uit
        $stmt->execute();

        // Haal het resultaat op
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $ingelogd = true;
            $melding = "Je bent succesvol ingelogd!";
        } else {
            $melding = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
} catch (PDOException $e) {
    echo "Fout bij de databaseverbinding: " . $e->getMessage();
}
?>
