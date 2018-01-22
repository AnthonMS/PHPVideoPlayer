<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 15-01-2018
 * Time: 13:57
 */
session_start();
?>

<html>
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" type="text/css" href="styles/adminStyle.css">-->
</head>
<body>

<?php

if (empty($_SESSION["username"]))
{
    include("Includes/login_form.php");
} else {
    //echo "Session started as " . $_SESSION["username"] . " - " . $_SESSION["admin"];
    echo "<a href='Includes/logout.php' id='logoutBtn'>Logout</a>";

    if ($_SESSION["admin"] == true)
    {
        showAdminPanel();
    } else {
        dontShowAdminPanel();
    }
}

function showAdminPanel()
{
    // This method is called if $_SESSION["admin"] is true.
    //echo "You are an admin!";
    include("Includes/adminPanel.php");
}

function dontShowAdminPanel()
{
    // This method is called if $_SESSION["admin"] is false.
    //echo "You are not an admin!!!";
}

?>

<script>

</script>

</body>
</html>


