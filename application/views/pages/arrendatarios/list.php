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
                      <th>Arrendatario ID</th>
                      <th>Inmueble</th>
                      <th>Nombres</th>
                      <th>Paterno</th>
                      <th>Materno</th>
                      <th>Dni</th>
                    </tr>
                  </thead>
                  <tbody>              
                  <?php foreach ($arrendatarios as $arrendatarios_item): ?>
                    <tr data-id="<?php echo $arrendatarios_item['id']; ?>" data-aux_id="<?php echo $arrendatarios_item['arrendatario_id']; ?>">
                      <td><?php echo $arrendatarios_item['id']; ?></td>
                      <td><?php echo $arrendatarios_item['arrendatario_id']; ?></td>
                      <td><?php
                            if(isset($inmuebles[$arrendatarios_item['inmueble_id']]))
                            {
                              $inmuebles_item = $inmuebles[$arrendatarios_item['inmueble_id']];
                              echo $inmuebles_item['nombre'];
                            }
                          ?>                        
                      </td>
                      <td><?php echo $arrendatarios_item['nombres']; ?></td>
                      <td><?php echo $arrendatarios_item['paterno']; ?></td>
                      <td><?php echo $arrendatarios_item['materno']; ?></td>
                      <td><?php echo $arrendatarios_item['dni']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>                
              </div>
            </div>
          </div>
        </div>

