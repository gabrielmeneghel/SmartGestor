<?PHP
 
session_start();
 
$id = $_SESSION['id'];
$name = $_SESSION['name'];
 
?>
<html lang="pt-br">
    <head>
    <style>
        ul, ul > div {
        padding-left: 0px !important;
        padding-right:300px !important;
        padding-top:3px !important;
    }
    </style>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="utf-8"/>
        <title>MeG - Início</title>
    </head>
    <body>
        <ul class="menu">
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="produtos"class="btn btn-secondary" href="list_product.php">Produtos<a/>
        </div>
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="clientes"class="btn btn-secondary" href="list_clientes.php">Clientes</a><a/>
        </div>
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="fornecedores"class="btn btn-secondary" href="list_fornecedor.php">Fornecedores<a/>
        </div>
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="estoque"class="btn btn-secondary" href="estoque.php">Estoque<a/>
        </div>
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="venda"class="btn btn-secondary" href="vender.php">Vendas<a/>
        </div>
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="sobre"class="btn btn-secondary" href="add.php">Sobre<a/>
        </div>
        <div class="btn-group-vertical col-lg-6" style="margin: auto;">
            <a name="sair"class="btn btn-secondary" href="login.php">Sair<a/>
        </div>
        </ul>  

        <br><br>
    </body>
</html>
