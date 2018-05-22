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
        <script src="js/js.js"></script>
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
        //$sql = "SELECT * FROM episodes_new WHERE serie_title='$seriesTitle' AND season_no='$seasonNo' ORDER BY episode_no ASC";
        $testSql = "SELECT episodes_new.*, series.seasons FROM episodes_new, series WHERE episodes_new.serie_title='$seriesTitle' AND episodes_new.season_no='$seasonNo' AND episodes_new.serie_title=series.title ORDER BY episodes_new.episode_no ASC";
        $result = $connect->query($testSql);
        $numOfEpisodes = 0;

        if ($result->num_rows > 0)
        {
            $firstRow = $result->fetch_assoc();
            //echo "Number of seasons: " . $firstRow["seasons"];
            echo "<table class='seasons_table'>";
            echo "<tr>";
            for ($i = 1; $i <= $firstRow["seasons"]; $i++)
            {
                //echo "Testing: " . $i . "<br>";
                //echo "<td class='season_box>" . $i . "</td>";
                $temp = $i;
                if ($temp < 10) {
                    $temp = 0 . "$i";
                }
                if ($firstRow["season_no"] == $i) {
                    echo "<th class='season_column_highlight' data-no='$i'>$temp</th>";
                }
                else {
                    echo "<th class='season_column' data-no='$i'>$temp</th>";
                }

            }
            echo "</tr>";
            echo "</table>";

            echo "<table class='episode_table' id='dataTable'>";
            echo "<tr>
                    <th class='episode_header_left'>Series</th>
                    <th class='episode_header'>Season</th>
                    <th class='episode_header'>Episode</th>
                    <th class='episode_header_left'>Title</th>
                 </tr>";

            $newTitle = str_replace("_", " ", $seriesTitle, $count);
            $seaNo = $firstRow["season_no"];
            $epiNo = $firstRow["episode_no"];
            $epiTitle = $firstRow["episode_title"];
            echo "<tr class='episode_row' data-series='$newTitle' data-season='$seaNo' data-epiNo='$epiNo'>";
            echo "<td class='episode_cell_left'>$newTitle</td>";
            echo "<td class='episode_cell'>$seaNo</td>";
            echo "<td class='episode_cell'>$epiNo</td>";
            echo "<td class='episode_cell_left'>$epiTitle</td>";
            //echo "<td class='episode_cell'>$seasons</td>";
            echo "</tr>";
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
                $seasons = $row["seasons"];
                //echo "<br />$epiTitle S".$seaNo."E$epiNo";
                echo "<tr class='episode_row' data-series='$newTitle' data-season='$seaNo' data-epiNo='$epiNo'>";
                echo "<td class='episode_cell_left'>$newTitle</td>";
                echo "<td class='episode_cell'>$seaNo</td>";
                echo "<td class='episode_cell'>$epiNo</td>";
                echo "<td class='episode_cell_left'>$epiTitle</td>";
                //echo "<td class='episode_cell'>$seasons</td>";
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
        //console.log(event.currentTarget);
        //var series = event.currentTarget.getAttribute('data-series');
        //var seaNo = event.currentTarget.getAttribute('data-season');
        var epiNo = event.currentTarget.getAttribute('data-epiNo');
        //console.log(series + " - " + seaNo + " - " + epiNo);
        updateQueryStringParam("page", "watch_episode");
        updateQueryStringParam("episode", epiNo);
        updateQueryStringParam("numOfEpisodes", numOfEpisodes);
        window.location.reload(false);
    });

    $(document).on("click", ".season_column", function (event) {
        var tempSeason = event.currentTarget.getAttribute('data-no');
        console.log(tempSeason);
        updateQueryStringParam("season", tempSeason);
        window.location.reload(false);
    });

    $("#dataTable tr").ready(function() {
        var page = getQueryStringParam("page");
        if (page == "watch_episode")
        {
            var episode = getQueryStringParam("episode");
            var season = getQueryStringParam("season");
            //console.log(episode + ", " + season);

            highlightEpisode(episode, season);

        }
    });

    function highlightEpisode(episode, season)
    {
        $('#dataTable tr').each(function() {
            var row = $(this)[0];
            var rowEpisode = row.getAttribute("data-epino");
            //console.log(test);
            if (rowEpisode == episode)
            {
                //console.log("Found the episode: " + rowEpisode);
                row.className = "episode_row_highlight";
                var title = $(".episode_row_highlight td")[3].innerText;
                $('#episodeTitle')[0].innerText = title;
            }
        });
    }


</script>











































