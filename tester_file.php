<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 21-01-2018
 * Time: 21:07
 */

?>

<html>
<head>
    <title>Testing</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/tester_style.css">

</head>
<body>

<h1>This is tester_file.php</h1>

<!--<div class="video_container">
    <video id="videoID" width="480" height="320" controls>
        <source src="media/series/south_park/south_park S1E1 Cartman Gets an Anal Probe.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>-->

<?php

?>


</body>
</html>

<script>
    var vid = document.getElementById("videoID");
    vid.onended = function (event)
    {
        alert("The video has ended!");
    }
</script>