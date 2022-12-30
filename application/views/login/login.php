<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Ingreso Alquilerapp</title>

    <!-- Bootstrap core CSS -->
    <!-- Custom styles for this template -->
    <?php 
      $this->load->helper('html');
      echo link_tag('libs/bower_components/bootstrap/dist/css/bootstrap.min.css');
      echo link_tag('libs/css/signin.css'); 
    ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./../libs/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      
      <?php 
        echo validation_errors();
        $attributes = array('class' => 'form-signin');
        echo form_open("VerifyLogin/index",$attributes);
      ?>      
        <h2 class="form-signin-heading">Ingrese su Usuario:</h2>
        <label for="username" class="sr-only">Correos</label>
        <input type="email" name="username" id="username" class="form-control" placeholder="Email address" required autofocus>

        <label for="password" class="sr-only">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

        <div class="checkbox">
          <label for="recordarme">
            <input type="checkbox" name="recordarme" id="recordarme" value="recordarme"> Recordar contraseña
          </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./../libs/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
