<!-- Author:Amin -->
<?php
// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verkrijg de ingediende gegevens
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Voer hier eventuele validatie en beveiligingscontroles uit
    $successMessage = "Registratie succesvol. U kunt nu inloggen.";
}
{
    {
            // Redirect naar index.php
            header("Location: login_form.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registratie</title>
</head>
<body>
    <h2>Registratie</h2>
    <?php if (isset($successMessage)) { ?>
        <p><?php echo $successMessage; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="email">E-mailadres:</label>
        <input type="email" name="email" id="email" required><br><br>

        

        <input type="submit" value="Registreren">
    </form>
</body>
</html>
