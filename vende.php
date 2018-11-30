<?php
//conecta ao servidor
$host = "localhost";
$user = "root";
$pass = "";
$banco = "sistema_estoque";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());

//recuepera os dados digitados
$cod=$_POST['cod'];
$qtde=$_POST['qtde'];
//iguala variaveis e altera o valor quant
$sql = mysql_query("SELECT quant, cod FROM produtos WHERE cod LIKE '%$cod%'");
$dados = mysql_fetch_array($sql);
$quantsql = $dados['quant'];
if($quantsql <= 0){
  echo "Produto com estoque zerado!";
}
else{
$new= $quantsql - $qtde;
mysql_query("UPDATE produtos SET quant = '$new' WHERE cod = '$cod'") or die ("Produto inexistente");
echo "Sucesso";
$preco = $dados['preco'];
}

//Adicionar dinheiro ao caixa
$sql1=mysql_query("SELECT preco FROM produtos WHERE cod = '$cod'");
$dado = mysql_fetch_array($sql1);
$preco = $dado['preco'];
$meio = $_POST['meio'];
$totalcompra = $preco * $qtde;
$data = date("d-m-Y");
$hour = date("H:i:s");
$sql = mysql_query("INSERT INTO caixa (meio, produto, valor, data, quant, hora) VALUES ('$meio', '$cod', '$totalcompra','$data','$qtde','$hour')");
echo "sucesso";

$sql2=mysql_query("SELECT dinheiro FROM caixa1 WHERE id = 1");
$money = mysql_fetch_array($sql2);
$monney = $money['dinheiro'];
$monnney = $monney + $totalcompra;
$sql3 = mysql_query("UPDATE caixa1 SET dinheiro = '$monnney' WHERE id = 1")


?>