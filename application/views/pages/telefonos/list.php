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
                      <th>Telefono ID</th>
                      <th>Arrendatario</th>
                      <th>Numero</th>
                    </tr>
                  </thead>
                  <tbody>              
                  <?php foreach ($telefonos as $telefonos_item): ?>
                    <tr data-id="<?php echo $telefonos_item['id']; ?>" data-aux_id="<?php echo $telefonos_item['telefono_id']; ?>">
                      <td><?php echo $telefonos_item['id']; ?></td>
                      <td><?php echo $telefonos_item['telefono_id']; ?></td>
                      <td><?php 
                            if(isset($arrendatarios[$telefonos_item['arrendatario_id']])){
                              $arrendatarios_item = $arrendatarios[$telefonos_item['arrendatario_id']]; 
                              echo $arrendatarios_item['arrendatario_id']."-".$arrendatarios_item['nombres'].' '.$arrendatarios_item['paterno'].' '.$arrendatarios_item['materno'];
                            }
                          ?>                              
                      </td>
                      <td><?php echo $telefonos_item['numero']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>                
              </div>
            </div>
          </div>
        </div>

