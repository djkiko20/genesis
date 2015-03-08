<?php
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 07.03.2015
 * Time: 22:24
 */

session_start();
session_destroy();
header("Location: ../index.php");
exit;
?>