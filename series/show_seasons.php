<html>
<head>
    <title>Popular Series</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 17-01-2018
 * Time: 13:24
 */

session_start();
if (empty($_SESSION["username"]))
{
    include("Includes/login_form.php");
} else {
    echo "<a href='../Includes/logout.php' id='logoutBtn'>Logout</a>";
}

if (!isset($_GET["watch"]))
{
    //include("adminPanel.php"); // make this show either error.php or 404.php (NOT made yet)
} else
{
    $watchTitle = checkInput($_GET["watch"]);
    $watchTitle = mysqli_real_escape_string($connect, $watchTitle);
    $newWatchTitle = str_replace("_", " ", $watchTitle, $count);
    //echo "You wanna watch $watchTitle";

    $sql = "SELECT * FROM thumbnails WHERE serie_title='$watchTitle' ORDER BY season_no ASC";
    $result = $connect->query($sql);
    if ($result->num_rows > 0)
    {
        echo "<div class='content2_container'>";
        while ($row = $result->fetch_assoc())
        {
            $season_no = $row["season_no"];
            $thumb_url = $row["thumb_url"];
            //echo "<br />This is season $season_no, Link: $thumb_url";
            echo "
            <div class='media2_container'>
                <figure class='season_figure'>
                    <img src='$thumb_url' alt='$watchTitle' data-season='$season_no' width='110' height='165' class='imageThumb'>
                    <figcaption class='content_label'>$newWatchTitle $season_no</figcaption>
                </figure>
            </div>
            ";
        }
        echo "</div>";
    } else {
        echo "<h1 class='centerStyle'>Error 404: No Seasons found.</h1>";
    }
}
?>

</body>
</html>

<script>
    $(document).on("click", ".imageThumb", function (event) {
        //console.log($(this).data("season"));
        updateQueryStringParam("page", "show_episodes");
        updateQueryStringParam("watch", event.target.alt);
        updateQueryStringParam("season", $(this).data("season"));
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
