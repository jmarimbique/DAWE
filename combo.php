<?php

header("Content-Type: text/html;  charset=ISO-8859-1",true);

require_once 'config.php';

$sth = $mysqli->query("SELECT * FROM Disciplina");
$rows = array();
$i = 1;
while($r = mysqli_fetch_assoc($sth)) {
    $rows['result']=$r;
  // echo $r['Designacao'];
    echo json_encode(array_map('utf8_encode', $r)); 
    //echo json_encode($rows);
     
}
 



$mysqli->close();


switch (json_last_error()) {
    case JSON_ERROR_NONE:
        echo ' - No errors';
        break;
    case JSON_ERROR_DEPTH:
        echo ' - Maximum stack depth exceeded';
        break;
    case JSON_ERROR_STATE_MISMATCH:
        echo ' - Underflow or the modes mismatch';
        break;
    case JSON_ERROR_CTRL_CHAR:
        echo ' - Unexpected control character found';
        break;
    case JSON_ERROR_SYNTAX:
        echo ' - Syntax error, malformed JSON';
        break;
    case JSON_ERROR_UTF8:
        echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
    default:
        echo ' - Unknown error';
        break;
}
 

?>