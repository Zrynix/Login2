<!-- Author:Amin -->
<body>
<head>
<h1>PHP - PDO login and registration</h1>
   <br>
   <h2>Login here...</h2>
</head>
<?php
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
   
    try {
        $conn = new PDO("myquery:host=$servername;dbname=$dbname", $username, $password);
        // Stel de PDO-foutmodus in op exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Verbonden met de database";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
        return null;
    }
}
// Controleren of de gebruiker is ingelogd
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Gebruiker is ingelogd, redirect naar de homepage
    header("Location: index.php");
    exit;
} else 
    session_start();
    
    // Controleer of het formulier is ingediend
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controleer de gebruikersnaam en het wachtwoord
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];
    
        if ($gebruikersnaam === "john" && $wachtwoord === "doe") {
    
            $_SESSION["gebruikersnaam"] = $gebruikersnaam;
            
            // Redirect naar index.php
            header("Location: index.php");
            exit();
        } else {
            $errorMessage = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required value="<?php if(isset($_POST['gebruikersnaam'])) echo htmlspecialchars($_POST['gebruikersnaam']); ?>"><br><br>
        
        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>
        
        <input type="submit" value="Inloggen"><br>
        <a href="registratie.php">register</a>
    </form>

    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
</body>
</html>
    







