<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
    <form method="POST" action="ope.php" >
        <div class="form-group col-lg-5 " style="margin: auto;" >
            <label for="email">Email </label>
             <input type="text" class="form-control" align="center" name="email" id="email" placeholder="Coloque seu e-mail">
         </div>
        <div class="form-group col-lg-5 " style="margin: auto;" >
            <label>Senha :</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Coloque sua senha" /><br />
         </div>
        <div class="form-group col-lg-5 " style="margin: auto;" >
            <input type="submit" class="btn btn-outline-primary"  value="Entrar  "  />
            <a name="inicio"class="btn btn-outline-primary" align="center" href="cadastro.html">Cadastre-se<a/><br><br>
        </div>
    </form>
  </body>
</html>
