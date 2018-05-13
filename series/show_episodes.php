<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 21-01-2018
 * Time: 03:09
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
if (!isset($_GET["watch"]))
{
    //include("adminPanel.php"); // make this show either error.php or 404.php (NOT made yet)
} else
{
    if (!isset($_GET["season"]))
    {
        // include ("error.php");
    } else
    {
        //echo "You wanna watch " . $_GET["watch"] . " season " . $_GET["season"];
        $seriesTitle = checkInput($_GET["watch"]);
        $seriesTitle = mysqli_real_escape_string($connect, $seriesTitle);
        $seasonNo = checkInput($_GET["season"]);
        $seasonNo = mysqli_real_escape_string($connect, $seasonNo);
        $sql = "SELECT * FROM episodes_new WHERE serie_title='$seriesTitle' AND season_no='$seasonNo' ORDER BY episode_no ASC";
        $result = $connect->query($sql);
        $numOfEpisodes = 0;

        if ($result->num_rows > 0)
        {

            echo "<table class='episode_table'>";
            echo "<tr>
                    <th class='episode_header_left'>Series</th>
                    <th class='episode_header'>Season</th>
                    <th class='episode_header'>Episode</th>
                    <th class='episode_header_left'>Title</th>
                 </tr>";
            while ($row = $result->fetch_assoc())
            {
                $numOfEpisodes = $numOfEpisodes + 1;
                //echo "Testing123";
                $newTitle = str_replace("_", " ", $seriesTitle, $count);
                $epiTitle = $row["episode_title"];
                $epiNo = $row["episode_no"];
                $seaNo = $row["season_no"];
                $lastEpi = $row["last_episode"];
                $lastSea = $row["last_season"];
                //echo "<br />$epiTitle S".$seaNo."E$epiNo";
                echo "<tr class='episode_row' data-series='$newTitle' data-season='$seaNo' data-epiNo='$epiNo'>";
                echo "<td class='episode_cell_left'>$newTitle</td>";
                echo "<td class='episode_cell'>$seaNo</td>";
                echo "<td class='episode_cell'>$epiNo</td>";
                echo "<td class='episode_cell_left'>$epiTitle</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<p id='episodesHolder' data-numOfEpisodes='$numOfEpisodes' hidden></p>";
        } else
        {
            echo "<h1 class='centerStyle'>Error 404: No Episodes found.</h1>";
        }
    }
}

?>

    </div>

    </body>
    </html>

<script>
    var numOfEpisodes = document.getElementById('episodesHolder').getAttribute("data-numOfEpisodes");

    $(document).on("click", ".episode_row", function (event) {
        console.log(event.currentTarget);
        //var series = event.currentTarget.getAttribute('data-series');
        //var seaNo = event.currentTarget.getAttribute('data-season');
        var epiNo = event.currentTarget.getAttribute('data-epiNo');
        //console.log(series + " - " + seaNo + " - " + epiNo);
        updateQueryStringParam("page", "watch_episode");
        updateQueryStringParam("episode", epiNo);
        updateQueryStringParam("numOfEpisodes", numOfEpisodes);
        window.location.reload(false);
    });

    var updateQueryStringParam = function (key, value) {
        var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
            urlQueryString = document.location.search,
            newParam = key + '=' + value,
            params = '?' + newParam;

        // If the "search" string exists, then build params from it
        if (urlQueryString) {
            keyRegex = new RegExp('([\?&])' + key + '[^&]*');

            // If param exists already, update it
            if (urlQueryString.match(keyRegex) !== null) {
                params = urlQueryString.replace(keyRegex, "$1" + newParam);
            } else { // Otherwise, add it to end of query string
                params = urlQueryString + '&' + newParam;
            }
        }
        window.history.replaceState({}, "", baseUrl + params);
    };
</script>