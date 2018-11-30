<?php
session_start();
$owner = $_SESSION['id'];

$connect =  mysqli_connect ('mysql.hostinger.com.br','u982947535_tgadm','32569682Blink','u982947535_mlg');
$db = mysqli_select_db('u982947535_mlg');

$class_select = "SELECT class_id,class_name FROM class WHERE class_owner IS NULL or class_owner = '$owner'";
$class_query = mysqli_query($connect,$class_select);

$size_select = "SELECT size_id,size_name FROM size WHERE size_owner = '$owner' OR size_owner IS NULL";
$size_query = mysqli_query($connect,$size_select);

$color_select = "SELECT color_id,color_name FROM color WHERE color_owner = '$owner' OR color_owner IS NULL";
$color_query = mysqli_query($connect,$color_select);

$un_select = "SELECT un_id,un_name FROM un WHERE un_owner = '$owner' OR un_owner IS NULL";
$un_query = mysqli_query($connect,$un_select);
?>

<html>
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MeG - Cadastrar Produto</title>
</head>
<body>
    <form method="POST" action="cad_product.php">
         <div class="form-group">
                <label>Nome:</label><input type="text" class="form-control col-lg-2" style="margin: 1px;"name="name" id="name">
                <label>Cod:</label><input type="text"class="form-control col-lg-2" style="margin: 1px"  name="code" id="code">
                <label>Valor de venda:</label><input type="number" class="form-control col-lg-2" style="margin: 1px" name="s_price" id="s_price">
                <label>Valor de compra:</label><input type="number" class="form-control col-lg-2" style="margin: 1px" name="c_price" id="c_price">
                <label>Estoque máximo:</label><input type="number" class="form-control col-lg-2" style="margin: 1px" name="max" id="max">
                <label>Estoque mínimo:</label><input type="number" class="form-control col-lg-2" style="margin: 1px" name="min" id="min">
                <label>Estoque atual:</label><input type="number" class="form-control col-lg-2" style="margin: 1px" name="current" id="current">
            </div>
        <div class="form-group col-lg-2">
        <?php echo'Categoria: '; ?>
        <select class="form-control" name='class'>
            <?php
            while($class = $class_query->fetch_array()){
                echo '<option value="'.$class["class_id"].'">'.$class["class_name"].'</option>';
            }
            ?>
        </select>
    
           <?php echo'Unidade de medida: '; ?>
        <select class="form-control" selected='M' name='un'>
            <?php
            while($un = $un_query->fetch_array()){
                echo '<option value="'.$un["un_id"].'">'.$un["un_name"].'</option>';
            }
            ?>
        </select>
        <?php echo'Tamanho: '; ?>
        <select class="form-control" name='size'>
            <?php
            while($size = $size_query->fetch_array()){
                echo '<option value="'.$size["size_id"].'">'.$size["size_name"].'</option>';
            }
            ?>
        </select>
            <?php echo'Cor: '; ?>
        <select class="form-control" name='color'>
            <?php
            while($color = $color_query->fetch_array()){
                echo '<option value="'.$color["color_id"].'">'.$color["color_name"].'</option>';
            }
            ?>
            
        
        </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar"  />
    </form>
</body>
</html>