<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 15-01-2018
 * Time: 13:09
 */

?>
<html>
<head>
    <title>Home Streaming</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/content_style.css">
    <link rel="stylesheet" type="text/css" href="styles/adminStyle.css">
    <link rel="stylesheet" type="text/css" href="styles/adminPanelStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<header id="header">
    <h1>TitLe gOeS HeRe</h1>
</header>

<div id="nav">
    <ul class="mainBtns">
        <li class="nav_button">
            <a href="?page=home">Home</a>
        </li>
        <li class="nav_button">
            <a href="?page=movies">Movies</a>
        </li>
        <li class="nav_button">
            <a href="?page=series">Series</a>
        </li>
        <li class="nav_button" style="float:right;border-left:1px solid #bbb">
            <a href="?page=admin">Admin</a>
        </li>
    </ul>
</div>

<?php
include ("Includes/DBconnect.php");

if (!isset($_GET["page"]))
{
    include ("home.php");
} else
    {
        switch ($_GET["page"])
        {
            case "home":
                include ("home.php");
                break;
            case "movies":
                include ("movies.php");
                break;
            case "series":
                include ("series.php");
                break;
            case "admin":
                include("admin.php");
                break;
            case "show_seasons":
                include("series/show_seasons.php");
                break;
            case "show_episodes":
                include("series/show_episodes.php");
                break;
            case "watch_episode":
                include ("series/watch_episode.php");
                break;

            case "test":
                include ("tester_file.php");
        }
    }
?>

</body>
</html>
