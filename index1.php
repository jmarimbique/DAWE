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

 
<div id="result"></div>
<div id="loading" class="centered"><img src="images/loading.gif" /> <br /><strong class="label label-pink">Por favor aguarde ...</strong><br /></div>





	

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function($){
	
		GetDisciplina();
		GetClasses();
		
		$('#loading').hide(); 
	
	    $('#btnSubmit').click(function(event){    
			$('#loading').show();
			
			 Search();
			
		   $('#loading').hide(); 
		   
        event.preventDefault();
    });

		$('#searchText').keypress(function(e) {
				if (e.keyCode == 13) {
					$( "#btnSubmit" ).click();	
				e.preventDefault();					
			}			 
		});

		function Search()
		{
			 var txtSearch = $('#searchText').val(); 
      
			if(txtSearch != null){

        	$.post("searchresult.php", {searchText: txtSearch}).done(function (data) {
        		$('#result').html(data);
            });       		 
        	
			} 
		}
	
	    function GetDisciplina()
        {
            var url = "disciplina.php";

            $.getJSON(url, function (data) {
                var ddl = $('#dropDisciplina');
                ddl.empty();
                $(document.createElement('option')).attr('value', 0).text('Escolha').appendTo(ddl);
                $(data).each(function () {
                    $(document.createElement('option')).attr('value', this.Id).text(this.Designacao).appendTo(ddl);
                });
            });
        }
 
		 function GetClasses()
        {
            var url = "classes.php";

            $.getJSON(url, function (data) {
                var ddl = $('#dropClasses');
                ddl.empty();
                $(document.createElement('option')).attr('value', 0).text('Escolha').appendTo(ddl);
                $(data).each(function () {
                    $(document.createElement('option')).attr('value', this.Id).text(this.Designacao).appendTo(ddl);
                });
            });
        }
	    
     
});
</script>

  
 
 
 <?php include_once("footer.php")?>