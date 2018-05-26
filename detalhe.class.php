<?php


	
require_once 'config.php';


function get_mb($size) {
    return sprintf("%4.2f MB", $size/1048576);
}



if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
 {
	 	 $id =  trim($_GET["id"]);	 	
        $sql = "select L.Id, L.Titulo,L.Descricao, L.AnoEdicao, L.Data,L.Link,L.Size, A.Nome as Autor from livros L INNER JOIN AutorLivro AL   
		On AL.IdLivro = L.Id INNER JOIN Autores A ON AL.IdAutor = A.Id WHERE L.Id= ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1)
                {
                     
                    $row = $result->fetch_array(MYSQLI_ASSOC);
					
					echo ("<table border='0' cellspacing='14' class='conteudo'>						 
						<tr>
							<td>
								<table>
									<tr>
									<td>
									<a href=uploads/{$row["Link"]} class='btn btn-outline-primary' border='0'><image src='uploads/pdf-icon.png' width='300px'></a>
									</td>
									</tr>
								</table>
							</td>
						 
						<td>
						<table cellspacing='10' border='0'>
							<tr><td><b>Author</b>: {$row["Autor"]}<p></td>	<tr/>
							<tr><td><b>Title</b>: {$row["Titulo"]}<p></td><tr/>
							<tr><td><b>Year</b>: {$row["AnoEdicao"]}<p></td><tr/>
							<tr><td><b>Edition</b>: FCA<p></td><tr/>
							<tr><td><b>Language</b>: Portugues<p></td><tr/>
							<tr><td><b>Author</b>: {$row["Autor"]}<p></td><tr/>
							<tr><td><b>File Format</b>: PDF<p></td><tr/>
								<td><b>Size:</b> ");
								echo(get_mb($row["Size"]));
							echo("</td> 
							<tr/>
							
						</table>
						<tr/>
					<table/>");
                   
					echo ("<table><tr><td> <hr/>{$row["Descricao"]} </td></tr></table>"); 
                     
                } else
                {
                   
                    echo "<div class='alert alert-danger'> <strong>Erro</strong>: O Id do livro nao esta correto.</div>";
					//header("location: index.php?s=derror");
				//exit();
                   
                }                
	 	
			 }
	 // Close statement
        $stmt->close();
        
        // Close connection
        $mysqli->close();
	}
 
   }

 

?>


<div class="row">

 