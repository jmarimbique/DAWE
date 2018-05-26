<?php include_once("header.php")?>

 

	
	 <div class="row">
              
              
              <div class="col-md-12 mb-3">
			  <div align="center"> <img src="images/daweBooks.png" /></div>
                <label for="zip">Pesquisa Livre</label>
                 <form id="search" method="GET" action="index.php">
                <div class="input-group">

                    <input type="search" class="form-control" id="q"  name="q" placeholder=" Ex: Java" />
                    <span class="input-group-btn">
				<button class="btn btn-default" type="submit" id="btnSubmit"> <i class="fa fa-search" style="font-size:24px"></i></button>
				</span>
                </div>
            </form>
              </div>  
	 </div>
	
	<div class="row">
	
<!--  resposta -->

 
<?php
 


require_once 'config.php';



if(isset($_REQUEST['q'])){
    $sql = "select L.Id, L.Titulo,L.Descricao, L.AnoEdicao, L.Data,L.Link  from livros L WHERE L.Titulo LIKE? OR L.Descricao LIKE ?";
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("ss", $param_term,$param_term2);

        $param_term = '%'. trim($_REQUEST['q']) . '%';
        $param_term2 = '%'. trim($_REQUEST['q']) . '%';

        if($stmt->execute()){           
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    
					echo ("<table>");
					echo ("<tr><th style='color:#006699;'><a style='color:#006699;' href=detalhe.php?id={$row["Id"]}&q={$_GET['q']} > {$row["Titulo"]} <i class='fa fa-file-pdf' style='font-size:18px'></i> </a></th></tr>");			
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
 
    $stmt->close();
    }
}

$mysqli->close();
?>



 
  
 
 
 <?php include_once("footer.php")?>