<!-- Author:Amin -->
<?php

// Verbindingsgegevens voor de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Verbinding maken met de database met behulp van PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Verbindingsfout: " . $e->getMessage());
}

// Functie voor het valideren van de gebruikersnaam
function validate_username($gebruikersnaam) {
    global $conn;
    
    // Controleren of er resultaten zijn
    if ($stmt->rowCount() > 0) {
        throw new Exception("De gebruikersnaam is al in gebruik. Kies een andere gebruikersnaam.");
    }
}

// Voorbeeld van het toevoegen van een gebruiker met validatie
function add_user($gebruikersnaam, $wachtwoord) {
    global $conn;
    
    try {
        // Valideer de gebruikersnaam voordat deze wordt toegevoegd
        validate_username($gebruikersnaam);

        // Voeg de gebruiker toe aan de database
        $stmt = $conn->prepare("INSERT INTO username (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)");
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        $stmt->execute();
        
        echo "Gebruiker succesvol toegevoegd.";
    } catch (Exception $e) {
        echo "Fout: " . $e->getMessage();
    }
}

// Verbinding met de database sluiten
$conn = null;

?>
