<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 26-01-2018
 * Time: 15:32
 */

session_start();
if (empty($_SESSION["username"]))
{
    include ("Includes/login_form.php");
} else {
    echo "<a href='Includes/logout.php' id='logoutBtn'>Logout</a>";
}

?>

<html>
<head>
    <title>Show Episodes</title>
    <meta charset="UTF-8">
</head>
<body>

<div class="centerStyle">
    <?php
    echo "<h1>Here you are gonna watch an episode</h1>"
    ?>
</div>

</body>
</html>
