<?php header ('Content-type: text/html; charset=utf-8');
//Vlecenje na potrebni zapisi od bazata
//Ovaa strana ke bide pristapena od jquery tokeninput i ke mu vrati nazad JSON

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#
error_reporting(0);

# Connect to the database
$connection = mysql_pconnect("localhost", "root", "") or die("Could not connect");
mysql_set_charset("utf8", $connection);
mysql_select_db("hakaton") or die("Could not select database");

$idF = $_GET['idF'];
# Perform the query
$query = sprintf("SELECT predmetID as id, nazivP as name from tbl_predmeti WHERE fakultetID = '".$idF."' AND nazivP LIKE '%%%s%%' LIMIT 10", mysql_real_escape_string($_GET["q"]));
$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_object($rs)) {
    $arr[] = $obj;
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
