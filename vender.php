<form method="POST" action="?action=vender/vender">
  <span>Encontre o produto pelo nome ou código</span>
  <input type="text" name="busca" size="20"><br><br>
  <input type="submit" value="Buscar" name="ok">
</form>
<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = ''; 
$con = mysql_connect($host,$user,$pass); 
$db = ''; 
mysql_select_db($db,$con) or print mysql_error(); 
$busca=$_POST['busca'];
if(empty($busca)) die;
$sql = mysql_query("SELECT * FROM product WHERE nome LIKE '%$busca%' OR cod LIKE '%$busca%'");

$count = mysql_num_rows($sql);
if ($count == 0) {
    echo "Nenhum resultado!";
} else {

    echo "<table border='1'><tr><td>PRODUTO</td><td>CÓDIGO</td><td>PREÇO</td><td>QUANTIDADE ATUAL</td></tr>";
    while ($dados = mysql_fetch_array($sql)) {
        // enquanto houverem resultados...
        echo "<tr><td>$dados[nome]</td><td> $dados[cod]</td><td> $dados[preco]</td><td> $dados[quant]</td></tr><br>";
        // exibir a coluna nome e a coluna email
    }echo "</table>";
}
?>
<form action="/sistema_estoque/pages/vender/vende.php" method="post">
<span>Digite abaixo o código do produto a ser vendido</span>
<input name="cod"/>
<span>Qtde</span>
<input name="qtde"/>
<span>Meio de pagamento</span>
<select name="meio"/>
<option value="À Vista">À Vista</option>
<option value="A Prazo">A Prazo</option>
<option value="Cartão Cred">Cartão de crédito</option>
<option value="Cheque">Cheque</option>
</select>
<br><br><input type="submit" name="enviar" value="Dar baixa no estoque" class="cadastro_btn"/>
</form>﻿﻿﻿﻿﻿
