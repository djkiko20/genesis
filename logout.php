<?php
/**
 * Created by PhpStorm.
 * User: User-Pc
 * Date: 08.03.2015
 * Time: 11:16
 */
session_start();
session_destroy();

header('location: index.php');
