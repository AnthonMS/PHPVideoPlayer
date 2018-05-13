<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 16-01-2018
 * Time: 16:39
 */

?>


<html>
<head>
    <title>Popular Series</title>
    <meta charset="UTF-8">
<!--    <link rel="stylesheet" type="text/css" href="styles/content_style.css">-->
</head>
<body>
<div class="centerStyle_noMarg">
    <div class="content_container">
        <?php
        $sql = "SELECT * FROM series WHERE popular='1'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                //echo "<br />" . $row['title'];
                $title = $row['title'];
                $thumbURL = $row["url"];
                $newTitle = str_replace("_", " ", $title, $count);
                $popular = $row["popular"];
                //if ($popular == "1")
                //{
                echo "
                    <div class=\"media_container\">
                        <figure class='serie_figure'>
                            <img src='$thumbURL' alt=\"$title\" width=\"110\" height=\"165\" class=\"imageThumb\">
                            <figcaption class=\"content_label\">$newTitle</figcaption>
                        </figure>
                    </div>
                    ";
                //}

            }
        }
        ?>
    </div>
</div>



</body>
</html>

<script>
    $(document).on("click", ".imageThumb", function (event) {
        //alert(event.target.alt);
        updateQueryStringParam("page", "watch_series");
        updateQueryStringParam("watch", event.target.alt);
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
