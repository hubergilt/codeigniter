<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <?php 
        $this->load->helper('url');
        echo anchor('home', 'Registro de alquileres', array('class'=>'navbar-brand')); 
      ?>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">

        <?php if(isset($menuitem)){ 
        ?>

        <li>
          <a> <?php echo "Operaciones para ".$menuitem.":"; ?> </a>
        </li>

        <li id="navmenu">
          <div class="btn-group pull-right" data-toggle="buttons" id="myButton">
            <label class="btn btn-default">
              <input type="radio" name="options" id="edit" autocomplete="off" > Actualizar </input>
            </label>
            <label class="btn btn-default active">
              <input type="radio" name="options" id="noedit" autocomplete="off" checked> No editar </input>
            </label>
            <label class="btn btn-default">
              <input type="radio" name="options" id="delete" autocomplete="off" > Borrar </input>
            </label>                    
          </div>

          <div class="btn-group pull-right">
            <?php
              $attributes = Array ("id" => "create", 
                                   "Class" => "btn btn-success",
                                   "role" => "button"
                                   ); 
              echo anchor($menuitem."/create", "Crear ".$menuitem, $attributes);                      
            ?>
          </div>

        </li>
       
        <?php }; 
        ?>

        <li>
          <?php 
            $this->load->library('session');
            if($this->session->userdata('logged_in')){
              $session_data = $this->session->userdata('logged_in');
              $username=$session_data['username'];
              echo anchor("#", '
                <span class="glyphicon glyphicon-user"></span> '.$username.'
              ');
            }
          ?>              
        </li>

        <li>
          <?php 
            echo anchor('VerifyLogin/logout', '
              <span class="glyphicon glyphicon-log-out"></span> Salir
            '); 
          ?>              
        </li>

      </ul>
    </div>
  </div>
</div> <!-- end navbar -->