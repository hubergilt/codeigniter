<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon/favicon.ico">
    
    <title>Registro de alquileres <?php echo 'CI:'.CI_VERSION; if(isset($home_title)){ echo '-'.$home_title; } ?></title>      

    <?php 
      $this->load->helper('html');
      echo link_tag('libs/bower_components/bootstrap/dist/css/bootstrap.min.css');
      echo link_tag('libs/css/dashboard.css');
      // echo link_tag('libs/css/sticky-footer.css'); 
      // echo link_tag("libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css");
      // echo link_tag("libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css");
      echo link_tag("libs/font-awesome/css/font-awesome.min.css");
      // echo script_tag('libs/js/ie-emulation-modes-warning.js');
      echo script_tag('libs/bower_components/bootstrap/js/button.js');
      echo script_tag('libs/bower_components/jquery/dist/jquery.js');
      echo script_tag('libs/bower_components/bootstrap/dist/js/bootstrap.js');
      // echo script_tag('libs/js/vendor/holder.min.js');
      // echo script_tag('libs/js/ie10-viewport-bug-workaround.js');
      // echo script_tag('libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
      // echo script_tag('libs/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js');
    ?>
    

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


    <script>
    $(document).ready(function(){
        alert("Ingreso!");
        $("button").click(function(){
            alert("Evento!");
        });

        $(".table").click(function(){
          alert("Ingreso!");
        });          
    });
    </script>

    <style type="text/css">
        tbody tr:hover{
          cursor: pointer;
        }
        
        html, body{
          height: 100vh;
        }

        .main{
          height: 90vh;          
          overflow-y: scroll;
        }
    </style>

  </head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
    </nav>

    <div class="container-fluid">            
      <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">          
              <li>menu1</li>
              <li>menu1</li>
              <li>menu1</li>                
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <button>jquery click</button>

        <table class="table table-striped">            
          <thead>
            <tr>
              <th>Id</th>
              <th>Inmueble ID</th>
              <th>Nombre</th>
              <th>Pisos</th>
              <th>Direción</th>
              <th>Departamento</th>
              <th>Provincia</th>
              <th>Distrito</th>                      
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 1 </td>
              <td> 2 </td>
              <td> 3 </td>
              <td> 4 </td>
              <td> 5 </td>                      
              <td> 6 </td>
              <td> 7 </td>
              <td> 81 </td>                      
            </tr>
          </tbody>
        </table>                

          <div>
            <b>Todos los depositos: </b>
            <?php
              $this->load->model('depositos_model');
              $depositos = $this->depositos_model->get_depositos();
              echo print_r($depositos);
            ?>
            <br>
            <b>primer deposito: </b>
            <?php
              $this->load->model('depositos_model');
              $deposito = $this->depositos_model->get_depositos('2','DEP001',FALSE,FALSE);
              echo print_r($deposito);
            ?>
            <br>
            <b>depositos por mes y anio: </b>
            <?php
              $this->load->model('depositos_model');
              $depositos = $this->depositos_model->get_depositos(FALSE, FALSE, '2016','ENE');
              echo print_r($depositos);

              //$id = FALSE, $deposito_id = FALSE, $anio = FALSE, $mes = FALSE, $ambiente_id = FALSE, $arrendatario_id = FALSE            
              //$query = $this->db->get_where('depositos', array('id' => $id, 'deposito_id' => $deposito_id));
              //$query = $this->db->get_where('depositos', array('anio' => $anio, 'mes' => $mes));
                 // return $query->result_array();

              //inmueble_id, ambiente_id, anio, mes
              //inmueble_id, arrendatario_id, anio, mes

              // $filter = array('anio' => $anio, 'mes' => $mes);


              // $query = $this->db->get_where('depositos', array('anio' => $anio, 'mes' => $mes));

            ?> 
            <br>
            <b>solo anio y mes</b>
            <?php
              $this->load->model('depositos_model');
              $depositos = $this->depositos_model->get_depositos(FALSE, FALSE, '2016','ENE',FALSE,FALSE);
              echo print_r($depositos);
            ?>

            <br>
            <b>solo ambiente_id</b>
            <?php
              $this->load->model('depositos_model');
              $depositos = $this->depositos_model->get_depositos(FALSE, FALSE, '2015','ENE','AMB002',FALSE);
              echo print_r($depositos);
            ?>

            <br>
            <b>solo arrendatario_id</b>
            <?php
              $this->load->model('depositos_model');
              $depositos = $this->depositos_model->get_depositos(FALSE, FALSE, '2015','ENE',FALSE,'ARR001');
              echo print_r($depositos);
            ?>

          </div>

        </div>        
      </div>
    </div>

</body>

<footer class="footer">
</footer>

</html>