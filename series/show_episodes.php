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
        $seriesTitle = $_GET["watch"];
        $seasonNo = $_GET["season"];
        // SELECT * FROM episodes_new WHERE serie_title='south_park' AND season_no='1'
        $sql = "SELECT * FROM episodes_new WHERE serie_title='$seriesTitle' AND season_no='$seasonNo' ORDER BY episode_no ASC";
        $result = $connect->query($sql);

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
                //echo "Testing123";
                $epiTitle = $row["episode_title"];
                $epiNo = $row["episode_no"];
                $seaNo = $row["season_no"];
                $lastEpi = $row["last_episode"];
                $lastSea = $row["last_season"];
                //echo "<br />$epiTitle S".$seaNo."E$epiNo";
                echo "<tr class='episode_row' data-series='$seriesTitle' data-season='$seaNo' data-epiNo='$epiNo' data-epiTitle='$epiTitle'>";
                echo "<td class='episode_cell_left'>$seriesTitle</td>";
                echo "<td class='episode_cell'>$seaNo</td>";
                echo "<td class='episode_cell'>$epiNo</td>";
                echo "<td class='episode_cell_left'>$epiTitle</td>";
                echo "</tr>";
            }
            echo "</table>";
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
    $(document).on("click", ".episode_row", function (event) {
        updateQueryStringParam("page", "watch_episode");
        updateQueryStringParam("watch", $(this).data("series"));
        updateQueryStringParam("season", $(this).data("season"));
        updateQueryStringParam("episodeNo", $(this).data("epino"));
        updateQueryStringParam("episodeTitle", $(this).data("epititle"));
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