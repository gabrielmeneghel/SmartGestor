<?php
session_start();
$owner = $_SESSION['id'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');

?>

<html>
<head>
    <title>MeG - Cadastrar Cliente</title>
</head>
<body>
    <form method="POST" action="cad_cliente.php">
        <label>Nome:</label><input type="text" name="name" id="name"><br>
        <label>Razão Social:</label><input type="text" name="razao" id="razao"><br>
        <label>Codigo:</label><input type="text" name="code" id="code"><br>
        <label>CNPJ:</label><input type="text" name="cnpj" id="cnpj"><br>
        <label>CPF:</label><input type="text" name="cpf" id="cpf"><br>
        <label>Endereço:</label><input type="text" name="endereco" id="endereco"><br>
        <input type="submit" value="Cadastrar"  />
    </form>
</body>
</html>