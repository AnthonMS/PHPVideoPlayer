<?php
/**
 * Created by PhpStorm.
 * User: Anthon
 * Date: 13-05-2018
 * Time: 12:45
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
    <title>Watch Episode</title>
    <meta charset="UTF-8">
</head>
<body>

<div class="centerStyle_noMarg">
    <button id="testBtn">Next video</button>

    <?php

    /*echo getcwd() . "<br>";
    $dir = "media/series";
    $files = scandir($dir);
    foreach ($files as $file)
    {
        echo $file."<br>";
        if ($file == "south_park")
        {
            echo "Yay it found it!";
        }
    }*/


    if (isset($_GET["watch"]))
    {
        if (isset($_GET["season"]))
        {
            if (isset($_GET["episode"]))
            {
                $orgSeries = checkInput($_GET["watch"]);
                $orgSeries = mysqli_real_escape_string($connect, $orgSeries);

                $series = str_replace("_", " ", $orgSeries, $count);
                $season = checkInput($_GET["season"]);
                $season = mysqli_real_escape_string($connect, $season);
                $episode = checkInput($_GET["episode"]);
                $episode = mysqli_real_escape_string($connect, $episode);

                $fileName = "$series S$season"."E$episode";

                //echo "$series, $season, $episode";
                $sql = "SELECT episode_title, last_episode, last_season FROM `episodes_new` WHERE episode_no='$episode' AND serie_title='$orgSeries' AND season_no='$season'";
                $result = $connect->query($sql);
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $episode_title = $row['episode_title'];
                    $lastEpisode = $row['last_episode'];
                    $lastSeason = $row['last_season'];
                }


                echo "<h3 class='watchTitle'>$episode_title</h3>";

                $numOfEpisodes = $_GET['numOfEpisodes'];
                $numOfSeasons = $_GET['numOfSeasons'];

                echo    "<div class='video_container'>
                            <video id='videoID' width='960' height='540' controls autoplay data-episode='$episode' data-season='$season' data-lastseason='$lastSeason' data-lastepisode='$lastEpisode' data-numOfEpisodes='$numOfEpisodes' data-numOfSeasons='$numOfSeasons'>
                                <source src='media/series/$orgSeries/$fileName.mp4' type='video/mp4'>
                                Your browser does not support the video tag.
                            </video>
                        </div>";


            } else { echo "Error!"; }
        } else { echo "Error!"; }
    }
    else { echo "Error!"; }
    ?>


</div>


<script>
    var getQueryStringParam = function (key) {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var param = url.searchParams.get(key);
        return param;
    };

    var baseSrc = "media/series/";
    var vid = document.getElementById("videoID");
    var vidSource = vid.getElementsByTagName('source')[0];
    //console.log(vidSource);

    var seaNo = vid.getAttribute('data-season');
    var nextSea = seaNo;
    var prevSea = seaNo;
    var epiNo = vid.getAttribute('data-episode');
    var nextEpi = epiNo;
    var prevEpi = epiNo;
    var numOfEpisodes = getQueryStringParam('numOfEpisodes');
    var numOfSeasons = getQueryStringParam('numOfSeasons');
    var lastSeason = vid.getAttribute('data-lastseason');
    var lastEpisode = vid.getAttribute('data-lastepisode');

    //console.log(numOfSeasons + ", " + numOfEpisodes);

    window.onload = windowLoad();

    function windowLoad() {
        if (epiNo < numOfEpisodes) {
            // Current episode is lower than number of episodes
            nextEpi++;
        }

        if (seaNo < numOfSeasons) {
            nextSea++;
        }

        if (epiNo != 1) {
            prevEpi--;
        }

        if (seaNo != 1) {
            prevSea--;
        }

        //console.log(prevSea + ", " + prevEpi);
        console.log(seaNo + ", " + epiNo);
        //console.log(nextSea + ", " + nextEpi);
    }

    $('#testBtn').click(function () {
        //console.log(getQueryStringParam("watch"));
        //vidSource.setAttribute("src", "Testing123");
        var orgWatch = getQueryStringParam("watch");
        var fixedTitle = orgWatch.replace("_", " ");
        var newSrc = baseSrc + orgWatch;

        //console.log(seaNo + ", " + epiNo);

        //console.log("numOfEpisodes: " + numOfEpisodes);
        //console.log("Episode: " + epiNo);
        if (nextEpi > numOfEpisodes) {
            //console.log("nextEpi is larger than numOfEpisodes");
            epiNo = 1;
            nextEpi = 1;
            if (seaNo >= numOfSeasons) {}
            else
            {
                //console.log("seaNo is not larger than numOfSeasons");
                seaNo++;
                nextSea++;
            }
            // Call method that changes url params to the new season.
            updateQueryStringParam("season", nextSea);
            window.location.reload(false);
        }

        newSrc = newSrc + "/S" + seaNo + "E" + nextEpi
        epiNo++; nextEpi++;

        console.log(newSrc);
    });

    /*vid.onplay = function (event)
    {
        //console.log("Video has been started!");
        if (vid.requestFullscreen) {
            vid.requestFullscreen();
        } else if (vid.mozRequestFullScreen) {
            vid.mozRequestFullScreen();
        } else if (vid.webkitRequestFullscreen) {
            vid.webkitRequestFullscreen();
        }
    }*/

    vid.onended = function (event)
    {
        // This will change to the next episode automatically
        console.log(event);
        var seaNo = event.currentTarget.getAttribute('data-season');
        var epiNo = event.currentTarget.getAttribute('data-episode');
        var lastSeason = event.currentTarget.getAttribute('data-lastseason');
        var lastEpisode = event.currentTarget.getAttribute('data-lastepisode');
        // Check if last episode or season
        if (lastEpisode == 1) { //if last episode is true, set episode to 1
            epiNo = 1;
        } else {
            epiNo++;
        }
        if (lastSeason == 1) // if last season is false, increase it
        {
            seaNo++;
        }

        // Check if last episode and season, if true display "No More $Serie_Title"
        /*if (lastEpisode == 1 && lastSeason == 1) {

        } else {
            updateQueryStringParam("season", seaNo);
            updateQueryStringParam("episode", epiNo);

            window.location.reload(false);
        }*/
    }

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