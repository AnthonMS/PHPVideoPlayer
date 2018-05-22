<?php
/**
 * Created by PhpStorm.
 * User: Anthon
 * Date: 22-05-2018
 * Time: 15:07
 */

$title = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //echo "SERVER POST!!!";
    // Check if the submit is set in the URL
    if (!isset($_GET["submit"]))
    {
        echo "Error, no submit setting in URL";
    } else
    {
        // Go through all the different submit actions
        switch ($_GET["submit"])
        {
            case "thumbnail": // Submit new thumbnail to (new) season
                submitThumbnail($connect, $_POST["serieInput"], $_POST["seasonInput"], $_POST["urlInput"]);
                $title = $_POST["serieInput"];
                break;
            case "series": // Submit new series, or update existing one
                //echo "Trying to submit new series to database";
                submitSeries($connect, $_POST["serieInput"], $_POST["seasonInput"], $_POST["urlInput"], $_POST["catInput"]);
                //checkExistingSeries($connect, $_POST["serieInput"]);
                $title = $_POST["serieInput"];
                break;
            case "episode":
                submitEpisode($connect, $_POST["serieInput"],  $_POST["seasonInput"],  $_POST["episodeInput"], $_POST["episodeTitleInput"], $_POST["numOfEpiInput"]);
                //echo $_POST["serieInput"] . ", " . $_POST["seasonInput"] . ", " . $_POST["episodeInput"] . ", " . $_POST["episodeTitleInput"] . ", " . $_POST["numOfEpiInput"];
                break;
        }
    }
}

?>
<html>
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
</head>
<div class="test_container">
    <div class="panel_container">
        <h1>Admin Panel</h1>
        <h3>Add Episode to series</h3>
        <form method="post" action="?page=admin&submit=episode">
            <div class="panel_container">
                <label><b>Serie</b></label>
                <input value="silicon_valley" type="text" placeholder="ex. south_park or gravity_falls etc." name="serieInput" class="adminInput" required>
                <label><b>Season</b></label>
                <input value="5" type="number" placeholder="Enter Season, ex. 1 or 17" name="seasonInput" class="adminInput" required>
                <label><b>Episode</b></label>
                <input value="1" type="number" placeholder="Enter Episode number, ex. 1 or 17" name="episodeInput" class="adminInput" required>
                <label><b>Number of Episodes</b></label>
                <input value="10" type="number" placeholder="Enter Number of episodes, ex. 13 or 24" name="numOfEpiInput" class="adminInput" required>
                <label><b>Episode title</b></label>
                <input type="text" placeholder="Enter Episode title, ex. Cartman Get's An Anal Probe" name="episodeTitleInput" class="adminInput" required>
                <div class="center_submit">
                    <label class="checkbox_label">
                        <input type="checkbox" name="lastEpiInput" class="checkbox_style"> Last Episode
                    </label>
                    <label class="checkbox_label">
                        <input type="checkbox" name="lastSeaInput" class="checkbox_style"> Last Season
                    </label>
                    <button type="submit" class="submitBtn">Submit Episode</button> <br />
                </div>
            </div>
        </form>
    </div>

    <div class="panel_container">
        <h3>Add Thumbnail to a season in a series</h3>
        <form method="post" action="?page=admin&submit=thumbnail">
            <div class="panel_container">
                <label><b>Serie</b></label>
                <input value="" type="text" placeholder="ex. south_park or gravity_falls etc." name="serieInput" class="adminInput" required>
                <label><b>Season</b></label>
                <input type="number" placeholder="Enter Season, ex. 1 or 17" name="seasonInput" class="adminInput" required>
                <label><b>URL</b></label>
                <input type="text" placeholder="ex. https://worldofcactus.files.wordpress.com/2015/02/south-park-season-4-front.jpg" name="urlInput" class="adminInput" required>
                <div class="center_submit">
                    <button type="submit" class="submitBtn">Submit Thumbnail</button> <br />
                </div>
            </div>
        </form>
    </div>

    <div class="panel_container">
        <h3>Add series to database</h3>
        <form method="post" action="?page=admin&submit=series">
            <div class="panel_container">
                <label><b>Serie</b></label>
                <input type="text" placeholder="ex. south_park or gravity_falls etc." name="serieInput" class="adminInput" required>
                <label><b>Seasons</b></label>
                <input type="number" placeholder="Enter number of Seasons in show, ex. 1 or 17" name="seasonInput" class="adminInput">
                <label><b>URL</b></label>
                <input type="text" placeholder="ex. https://worldofcactus.files.wordpress.com/2015/02/south-park-season-4-front.jpg" name="urlInput" class="adminInput">
                <label><b>Categories</b></label>
                <input type="text" placeholder="Enter Categories, ex. animation or animation,comedy,action if multiple" name="catInput" class="adminInput">

                <div class="center_submit">
                    <label class="checkbox_label">
                        <input type="checkbox" name="popularInput" class="checkbox_style">
                        <br /> Popular
                    </label>
                    <button type="submit" class="submitBtn">Submit Series</button> <br />
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>

<?php

function submitEpisode($conn, $series, $season, $epiNo, $epiTitle, $numOfEpisodes)
{
    $series = checkInput($series);
    $season = checkInput($season);
    $epiNo = checkInput($epiNo);
    $epiTitle = checkInput($epiTitle);
    $numOfEpisodes = checkInput($numOfEpisodes);

    $sql = "INSERT INTO episodes_new (episode_no, episode_title, season_no, serie_title, numOfEpisodes, last_episode, last_season)";
    $sql .= " VALUES ('$epiNo', '$epiTitle', '$season', '$series', '$numOfEpisodes'";
    if ($_POST["lastEpiInput"] == TRUE)
    {
        $sql .= ", '1'";
    }
    else
    {
        $sql .= ", '0'";
    }
    if ($_POST["lastSeaInput"] == TRUE)
    {
        $sql .= ", '1')";
    }
    else
    {
        $sql .= ", '0')";
    }

    //echo $sql;
    $conn->query($sql);
}


function submitThumbnail($conn, $title, $season, $url)
{
    $series = checkInput($title);
    $season = checkInput($season);
    $url = checkInput($url);
    $series = mysqli_real_escape_string($conn, $series);
    $season = mysqli_real_escape_string($conn, $season);
    $url = mysqli_real_escape_string($conn, $url);

    $exist = checkExistingThumb($conn, $title, $season);
    if ($exist)
    {
        $sql = "UPDATE thumbnails SET thumb_url = '$url' WHERE season_no=$season AND serie_title='$title'";
        $conn->query($sql);
    }
    else
    {
        $sql = "INSERT INTO thumbnails (serie_title, season_no, thumb_url) VALUES ('$series','$season','$url')";
        $conn->query($sql);
    }

}

function checkExistingThumb($conn, $title, $season)
{
    $exist = false;
    $sql = "SELECT serie_title, season_no FROM thumbnails WHERE serie_title='$title'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row["season_no"] == $season)
            {
                $exist = true;
            }
        }
    }
    return $exist;
}

function submitSeries($conn, $title, $seasons, $url, $categories)
{
    $title = checkInput($title);
    $seasons = checkInput($seasons);
    $url = checkInput($url);
    $categories = checkInput($categories);
    $title = mysqli_real_escape_string($conn, $title);
    $seasons = mysqli_real_escape_string($conn, $seasons);
    $url = mysqli_real_escape_string($conn, $url);
    $categories = mysqli_real_escape_string($conn, $categories);

    $exist = checkExistingSeries($conn, $title);
    if ($exist)
    {
        $sql = "";
        if (empty($seasons) || empty($url) || empty($categories)) {
            // One of the fields where empty
            $sql = "UPDATE series ";
            if (empty($seasons) && !empty($url) && !empty($categories)) { $sql .= "SET url='$url', category='$categories'"; }
            if (empty($url) && !empty($seasons) && !empty($categories)) { $sql .= "SET seasons='$seasons', category='$categories'"; }
            if (empty($categories) && !empty($seasons) && !empty($url)) { $sql .= "SET url='$url', seasons='$seasons'"; }
            // Two of the fields where empty
            if (empty($categories) && empty($seasons) && !empty($url)) { $sql .= "SET url='$url'"; }
            if (!empty($categories) && empty($seasons) && empty($url)) { $sql .= "SET category='$categories'"; }
            if (empty($categories) && !empty($seasons) && empty($url)) { $sql .= "SET seasons='$seasons'"; }
        }
        if ($_POST["popularInput"] == true)
        {
            $sql .= ", popular='1'";
        } else {
            $sql .= ", popular='0'";
        }
        $sql .= " WHERE title='$title'";
        $conn->query($sql);
    }
    else
    {
        $sql = "INSERT INTO series (title,url,seasons,category,popular)";
        $sql.= " VALUES ('$title','$url','$seasons','$categories'";
        if ($_POST["popularInput"] == true)
        {
            $sql.= ", '1')";
        } else {
            $sql.= ", '0')";
        }
        $conn->query($sql);
    }
}

function checkExistingSeries($conn, $title)
{
    $exist = false;
    $sql = "SELECT * FROM series WHERE title='$title'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        //echo " It is true";
        $exist = true;
    }

    //echo "It is a test";

    return $exist;
}

?>

