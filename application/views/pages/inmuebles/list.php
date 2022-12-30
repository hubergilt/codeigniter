  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
  <h1 class="sub-header"><?php echo $home_title; ?></h1>
  <div class="table-responsive">
    <div class="panel panel-primary">
      <div class="panel-heading clearfix">
      <?php echo $home_title; ?>      

      </div>
      <div class="panel-body">
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

          <?php foreach ($inmuebles as $inmuebles_item): ?>
            <tr data-id="<?php echo $inmuebles_item['id']; ?>" data-aux_id="<?php echo $inmuebles_item['inmueble_id']; ?>">
              <td><?php echo $inmuebles_item['id']; ?></td>
              <td><?php echo $inmuebles_item['inmueble_id']; ?></td>
              <td><?php echo $inmuebles_item['nombre']; ?></td>
              <td><?php echo $inmuebles_item['pisos']; ?></td>
              <td><?php echo $inmuebles_item['direccion']; ?></td>                      
              <td><?php echo $inmuebles_item['departamento']; ?></td>
              <td><?php echo $inmuebles_item['provincia']; ?></td>
              <td><?php echo $inmuebles_item['distrito']; ?></td>                      
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>                
      </div>
    </div>
  </div>
</div> <!-- end main -->