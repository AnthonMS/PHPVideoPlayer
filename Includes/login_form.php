<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 15-01-2018
 * Time: 13:57
 */
?>

<html>
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" type="text/css" href="styles/adminStyle.css">-->
</head>
<body>

<?php
$submitErr = ""; $submitSuc = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = ""; $pass = "";

    if (!empty($_POST["nameInput"]) && !empty($_POST["passInput"]))
    {
        // title is not empty
        $name = checkInput($_POST["nameInput"]);
        $pass = checkInput($_POST["passInput"]);
    } else {
        $submitErr = "Input cannot be empty";
    }

    if (!empty($name) && !empty($pass))
    {
        // No Empty fields
        $name = mysqli_real_escape_string($connect, $name);
        $pass = mysqli_real_escape_string($connect, $pass);

        $sql = "SELECT * FROM users WHERE username='$name' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows == 1)
        {
            // Username exists in database
            $rowArr = mysqli_fetch_array($query);
            $dbPass = $rowArr['password'];
            $admin = $rowArr['admin'];

            if ($pass == $dbPass)
            {
                // Login Successful
                session_start();
                $_SESSION["username"] = $name;
                $_SESSION["admin"] = $admin;
                $submitSuc = "Login Successful as ";
                $submitSuc .= $_SESSION["username"];
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                // Login NOT successful
                $submitErr = "Username or password incorrect!";
            }
        } else {
            // Login NOT successful
            $submitErr = "Username or password incorrect!";
        }
    } else {
        $submitErr = "Fields cannot be empty!";
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

<form method="post" action="?page=admin">
    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="nameInput" class="loginInput" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="passInput" class="loginInput" required>
        <div class="centerStyle">
            <button type="submit" class="loginBtn">Login</button> <br />

            <label>
                <input type="checkbox" checked="checked"> Remember me <br />
            </label>

            <label class="errorMsg"><?php echo $submitErr ?></label>
            <label class="successMsg"><?php echo $submitSuc ?></label>
        </div>
    </div>
</form>

</body>
</html>


