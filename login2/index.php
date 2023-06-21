<!-- Author:Amin -->
<?php
session_start();

if (isset($_SESSION['gebruikersnaam'])) {
    $gebruikersnaam = $_SESSION['gebruikersnaam'];
    $wachtwoord = $_SESSION['wachtwoord'];
    $message = "Het spel kan beginnen!";
} else {
    $message = "U bent niet ingelogd. Log in om verder te gaan.";
    $gebruikersnaam = "";
    $wachtwoord = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>PDO login and registration</h1>
    <br>
    <h2>Welcome to the HOME-page!</h2>
    <br>
    <p><?php echo $message; ?></p>
    <?php if (isset($_SESSION['gebruikersnaam'])) { ?>
        <p>Gebruikersnaam: <?php echo $gebruikersnaam; ?></p>
        <p>Wachtwoord: <?php echo $wachtwoord; ?></p>
    <?php } ?>
    <?php if (!isset($_SESSION['gebruikersnaam'])) { ?>
        <br>
        <a href="login_form.php">Login</a>
    <?php } ?>
</body>
</html>
