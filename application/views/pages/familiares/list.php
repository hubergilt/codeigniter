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
              <th>Familiar ID</th>
              <th>Arrendatario</th>
              <th>Tipo Familiar</th>
              <th>Nombres</th>
              <th>Paterno</th>
              <th>Materno</th>
            </tr>
          </thead>
          <tbody>              
          <?php foreach ($familiares as $familiares_item): ?>
            <tr data-id="<?php echo $familiares_item['id']; ?>" data-aux_id="<?php echo $familiares_item['familiar_id']; ?>">
              <td><?php echo $familiares_item['id']; ?></td>
              <td><?php echo $familiares_item['familiar_id']; ?></td>                      
              <td><?php 
                  if(isset($arrendatarios[$familiares_item['arrendatario_id']])){
                    $arrendatarios_item = $arrendatarios[$familiares_item['arrendatario_id']]; 
                    echo $familiares_item['arrendatario_id']."-".$arrendatarios_item['nombres'].' '.$arrendatarios_item['paterno'].' '.$arrendatarios_item['materno'];
                  } 
                  ?>
                </td>
              <td><?php $tipoFamiliares_item = $tipoFamiliares[$familiares_item['tipoFamiliar_id']]; echo $familiares_item['tipoFamiliar_id']."-".$tipoFamiliares_item['nombre']; ?></td>
              <td><?php echo $familiares_item['nombres']; ?></td>
              <td><?php echo $familiares_item['paterno']; ?></td>
              <td><?php echo $familiares_item['materno']; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>                
      </div>
    </div>
  </div>
</div>