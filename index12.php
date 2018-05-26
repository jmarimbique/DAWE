<?php include_once("header.php")?>

 

	
	 <div class="row">
              <div class="col-md-3 mb-3">
                <label for="country">Classes</label>
                <select class="custom-select d-block w-100" id="dropClasses" required>                 
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="state">Disciplinas</label>
                <select class="custom-select d-block w-100" id="dropDisciplina" required>                
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="zip">Pesquisa Livre</label>
                 <form id="search" method="POST" action="">
                <div class="input-group">

                    <input type="search" class="form-control" id="searchText"  name="searchText" placeholder=" Ex: Java" />
                    <span class="input-group-btn">
				<button class="btn btn-default" type="button" id="btnSubmit"> <i class="fa fa-search" style="font-size:24px"></i></button>
				</span>
                </div>
            </form>
              </div>    
 
      
			 
		
 		  
	 </div>
	
	<div class="row">
	
<!--  content -->

 



 
  
 
 
 <?php include_once("footer.php")?>