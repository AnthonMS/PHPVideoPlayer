<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 15-01-2018
 * Time: 13:56
 */
session_start();
?>

<html>
<head>
    <title>Series</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/adminStyle.css">
</head>
<body>

<?php
if (empty($_SESSION["username"]))
{
    include ("Includes/login_form.php");
} else {
    //echo "Session started as " . $_SESSION["username"] . " - " . $_SESSION["admin"];
    echo "<a href='Includes/logout.php' id='logoutBtn'>Logout</a>";
    include("series/all_series.php");
}

?>

</body>
</html>


