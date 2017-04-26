<?php
$mysql_id = mysql_connect('localhost', 'root', '');
mysql_select_db('noivo',$mysql_id);
if(!mysql_select_db('noivo',$mysql_id)){
die ('Erro'.mysql_error());
}
$titulo=$_POST['txtProdutor'];
$pontos=$_POST['txtLVaca'];
$query="INSERT INTO recolha (Nome_Produtor,L_Vaca) VALUES ('$titulo','$pontos')";
$result=mysql_query($query);
if(!$result){
echo(mysql_error());
}else{
header("Location: index.php");
}
?>