<!-- Author:Amin -->
<?php
// Start de sessie
session_start();

// Vernietig de sessie
session_destroy();

// Doorsturen naar de uitlogpagina of een andere gewenste bestemming
header("Location: uitlog_form.php");
exit;
?>
<form action="index.php" method="post">
  <button type="submit">Uitloggen</button>
</form>

