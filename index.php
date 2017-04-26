<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from recolha";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />  
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <title>Teste Edit-Delect-Insert de uma tabela php</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
			.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
		</style>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "saveedit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header" width="10%">ID_Reg</th>
				<th class="table-header">Produtor</th>
				<th class="table-header">L_Vaca</th>
				<th class="table-header"></th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
				<td><?php echo $faq[$k]["id"]; ?></td>
				<td><?php echo $faq[$k]["Nome_Produtor"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'L_Vaca','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["L_Vaca"]; ?></td>
				 <td><a href='apagar.php?id=<?php echo $faq[$k]["id"];?>'> Apagar</a></td>
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>
					<button type="button" class="btn btn-primary" runat="server" data-toggle="modal" data-target="#aa">
							Novo Registo
					</button>
<div class="modal fade" id="aa">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">x</button>
</div>
<div class="modal-body">
<!-- inicio do formulário -->
<form class="form-horizontal" action="insert.php" method="post">
<fieldset>
<!-- Form Name -->
<legend>Inserir Elemento</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Produtor</label>  
  <div class="col-md-5">
  <input id="txtProdutor" name="txtProdutor" type="text" placeholder="nome produtor" class="form-control input-md">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">L_Vaca</label>  
  <div class="col-md-2">
  <input id="txtLVaca" name="txtLVaca" type="text" placeholder="L_Vaca" class="form-control input-md">
    
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Gravar</button>
  </div>
</div>
</fieldset>
</form>
<!-- fim do formulário -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
    </body>
</html>
