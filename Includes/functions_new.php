<?php
/**
 * Created by PhpStorm.
 * User: Anthon
 * Date: 13-05-2018
 * Time: 14:44
 */



function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}