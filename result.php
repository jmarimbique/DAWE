  <?php
    // Include config file
    require_once 'config.php';
    
    // Attempt select query execution
    $sql = "select L.Id, L.Titulo,L.Descricao, L.AnoEdicao, L.Data,L.Link, A.Nome as Autor,A.Biografia from livros L INNER JOIN AutorLivro AL On AL.IdLivro = L.Id INNER JOIN Autores A ON AL.IdAutor = A.Id";
    if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
            echo "<table class='table table-bordered table-striped' id='tbResultado'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Nº</th>";
                        echo "<th>Título</th>";
                        echo "<th>Ano</th>";
                        echo "<th>Autor</th>";
                        echo "<th>Biografia</th>";
                        echo "<th>Descrição</th>";
                        echo "<th>Download</th>";
                         
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                        echo "<td>" . $row['Id'] . "</td>";
                        echo "<td>" . $row['Titulo'] . "</td>";
                        echo "<td>" . $row['AnoEdicao'] . "</td>";
                        echo "<td>" . $row['Autor'] . "</td>"; 
                        echo "<td>" .  substr($row['Biografia'],0,50) . " ...</td>"; 
                        echo "<td>" . substr($row['Descricao'],0, 200) . " ...</td>";
                        echo "<td> <a class='btn btn-secondary' href=".$row['Link']."> Ver </a></td>";
                         
                    echo "</tr>";
                }
                echo "</tbody>";                            
            echo "</table>";
            // Free result set
            $result->free();
        } else{
            echo "<p class='lead'><em>No records were found.</em></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
    
    // Close connection
    $mysqli->close();
    ?>