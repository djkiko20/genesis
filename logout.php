<?php
/**
 * Created by PhpStorm.
 * User: User-Pc
 * Date: 08.03.2015
 * Time: 11:16
 */
session_start();
session_destroy();


if(strlen(session_id())==0)
{
    echo "nula";
}
else
{
    echo "ne e nula";
}

session_start();
if(strlen(session_id())==0)
{
    echo "nula";
}
else
{
    echo "ne e nula";
}
