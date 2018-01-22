<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 16-01-2018
 * Time: 13:47
 */

Session_start();
Session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>