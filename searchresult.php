<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);


require_once 'config.php';



if(isset($_REQUEST['q'])){
    // Prepare a select statement
     
    $sql = "select L.Id, L.Titulo,L.Descricao, L.AnoEdicao, L.Data,L.Link, A.Nome as Autor from livros L INNER JOIN AutorLivro AL   
		On AL.IdLivro = L.Id INNER JOIN Autores A ON AL.IdAutor = A.Id WHERE Titulo or L.Descricao LIKE ?";
    //$sql = "SELECT Titulo FROM Livros WHERE Titulo LIKE ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);
        
        // Set parameters
        $param_term = '%'. trim($_REQUEST['q']) . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){           
            $result = $stmt->get_result();
            
            // Check number of rows in the result set
            if($result->num_rows > 0){
                // Fetch result rows as an associative array
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    
					echo ("<table>");
					echo ("<tr><th style='color:#006699;'><a style='color:#006699;' href=detalhe.php?id={$row["Id"]} > {$row["Titulo"]} <i class='fa fa-file-pdf' style='font-size:18px'></i> </a></th></tr>");
					//echo ("<tr><td><a href=uploads/{$row["Link"]} class='btn btn-outline-primary'> Download <i class='fa fa-file-pdf' style='font-size:18px'></i> </a></td></tr>");					
					echo ("<tr><td>");
					echo substr($row["Descricao"],0,300);
					echo (" ... <br/><br/></td></tr>");
					echo ("</table>");
                  
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    
    
    // Close statement
    $stmt->close();
    }
}

// Close connection
$mysqli->close();
?>
