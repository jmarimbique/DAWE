<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);
// Include config file
require_once 'config.php';
$data = array();
$lstDisciplina = array();
// Attempt select query execution
$sql = "select Id, Designacao from Disciplina";
if($result = $mysqli->query($sql)){
  
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){          
             $lstDisciplina[] = $row;     
        }
      echo json_encode($lstDisciplina);
      
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
 
?>
