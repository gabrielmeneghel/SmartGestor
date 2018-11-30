<?php

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');
$query_select = "SELECT code FROM cliente WHERE owner = '$owner' AND code = '$code'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['code'];


$busca = $_POST['palavra'];// palavra que o usuario digitou


$busca_query = mysql_query("SELECT * FROM product WHERE product_name LIKE '%$busca%'")or die(mysql_error());//faz a busca com as palavras enviadas

if (empty($busca_query)) { //Se nao achar nada, lança essa mensagem
    echo "Nenhum registro encontrado.";
}

// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($busca_query)) {
    echo "Id do Produto: $dados[product_id]<br />"; 
    echo "Nome do Produto: $dados[product_name]<br />";
    echo "<hr>";
}
?>