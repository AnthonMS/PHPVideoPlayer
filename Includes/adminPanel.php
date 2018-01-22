<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 16-01-2018
 * Time: 20:35
 */

// This site is for making and testing new pages...

//echo "Testing123!! This is adminPanel.php";
include("Includes/DBconnect.php");

?>

<?php

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
                break;
            case "series": // Submit new series, or update existing one
                //echo "Trying to submit new series to database";
                submitNewSeries($connect, $_POST["serieInput"], $_POST["seasonInput"], $_POST["urlInput"], $_POST["catInput"]);
                break;
        }
    }
}
?>

<html>
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/adminPanelStyle.css">
</head>
<body>

<div class="test_container">
    <div class="panel_container">
        <h1>Admin Panel</h1>
        <h3>Add Episode to series</h3>
        <form method="post" action="?page=admin&submit=episode">
            <div class="panel_container">
                <label><b>Serie</b></label>
                <input type="text" placeholder="ex. south_park or gravity_falls etc." name="serieInput" class="adminInput" required>
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
        <h3>Add Thumbnail to a season in a series</h3>
        <form method="post" action="?page=admin&submit=thumbnail">
            <div class="panel_container">
                <label><b>Serie</b></label>
                <input type="text" placeholder="ex. south_park or gravity_falls etc." name="serieInput" class="adminInput" required>
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
// This is for functions, so they do not fill up the space above!
function submitThumbnail($conn, $title, $season, $thumbURL)
{
    $series = checkInput($title);
    $season = checkInput($season);
    $url = checkInput($thumbURL);
    $series = mysqli_real_escape_string($conn, $series);
    $season = mysqli_real_escape_string($conn, $season);
    $url = mysqli_real_escape_string($conn, $url);

    if (checkForExistingThumb($conn, $series, $season) == TRUE)
    {
        //echo "<h1 class='centerStyle'>Thumbnail already exist for this season!</h1>";
        $sql = "UPDATE thumbnails SET thumb_url = '$url' WHERE season_no=$season";
        submitDBQuery($conn, $sql, true);
    } else {
        $sql = "INSERT INTO thumbnails (serie_title, season_no, thumb_url) VALUES ('$series','$season','$url')";
        submitDBQuery($conn, $sql, false);
    }
}

function checkForExistingThumb($conn, $title, $season)
{
    $series = checkInput($title);
    $season = checkInput($season);
    $series = mysqli_real_escape_string($conn, $series);
    $season = mysqli_real_escape_string($conn, $season);
    $thumbExists = false;

    $sql = "SELECT serie_title, season_no FROM thumbnails WHERE serie_title='$series'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row["season_no"] == $season)
            {
                //echo "Thumbnail already exists!";
                $thumbExists = true;
            }
        }
    }
    return $thumbExists;
}

function submitNewSeries($conn, $title, $seasons, $url, $categories)
{
    $title = checkInput($title);
    $seasons = checkInput($seasons);
    $url = checkInput($url);
    $categories = checkInput($categories);
    $title = mysqli_real_escape_string($conn, $title);
    $seasons = mysqli_real_escape_string($conn, $seasons);
    $url = mysqli_real_escape_string($conn, $url);
    $categories = mysqli_real_escape_string($conn, $categories);

    if (checkExistingSeries($conn, $title) == true)
    {
        // Series already exist, so update the url and no. of seasons
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
        submitDBQuery($conn, $sql, true);
    } else {
        // Series do NOT exist, so add it to table
        $sql = "INSERT INTO series (title,url,seasons,category,popular)";
        $sql.= " VALUES ('$title','$url','$seasons','$categories'";
        if ($_POST["popularInput"] == true)
        {
            $sql.= ", '1')";
        } else {
            $sql.= ", '0')";
        }
        submitDBQuery($conn, $sql, false);
    }
}

function checkExistingSeries($conn, $title)
{
    $seriesExist = false;
    $title = checkInput($title);
    $title = mysqli_real_escape_string($conn, $title);

    $sql = "SELECT * FROM series WHERE title='$title'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        // Series already exist in database
        $seriesExist = true;
        //echo "$title already exist!!! <br />";
    }

    return $seriesExist;
}

function submitDBQuery($conn, $sql, $update)
{
    if ($conn->query($sql) === TRUE)
    {
        if ($update == true)
        {
            echo "<h1 class='centerStyle'>Updated series successfully!</h1>";
        } else {
            echo "<h1 class='centerStyle'>Submission successful!</h1>";
        }
    } else {
        echo "<h1 class='centerStyle'>Submission failed! Error: " . $conn->error . "</h1>";
    }
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>