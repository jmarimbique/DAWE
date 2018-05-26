<?php
header("Content-Type: text/html;  charset=UTF-8",true);
 
require_once 'config.php';
$data = array();
$lstClasses = array();

 
// Attempt select query execution
$sql = "select Id, Designacao from classes";
if($result = $mysqli->query($sql)){
  
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){   
        //echo $row['Designacao'];       
             $lstClasses[] = $row;  
        }
      echo json_encode($lstClasses);
        $result->free();
    } else{
        
        $data['status'] = 'err';
        $data['result'] = '';
       
    }
    
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();

//echo json_encode($data);

?>
