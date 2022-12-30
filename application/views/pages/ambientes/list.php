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
                      <th>Ambiente ID</th>
                      <th>Arrendatario</th>                      
                      <th>Nombre</th>
                      <th>Tipo Ambiente</th>
                      <th>Inmueble</th>
                      <th>Piso</th>
                      <th>Ocupado</th>
                      <th>Precio S/.</th>
                      <th>Fecha de Inicio</th>
                      <th>Fecha de Vencimiento</th>
                      <th>Garantia S/.</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($ambientes as $ambientes_item): ?>
                    <tr data-id="<?php echo $ambientes_item['id']; ?>" data-aux_id="<?php echo $ambientes_item['ambiente_id']; ?>">
                      <td><?php echo $ambientes_item['id']; ?></td>
                      <td><?php echo $ambientes_item['ambiente_id']; ?></td>
                      <td><?php                            
                            if(isset($arrendatarios[$ambientes_item['arrendatario_id']]))
                            {
                              $arrendatarios_item = $arrendatarios[$ambientes_item['arrendatario_id']];
                              echo $arrendatarios_item['arrendatario_id'].'-'.$arrendatarios_item['nombres'].' '.$arrendatarios_item['paterno'].' '.$arrendatarios_item['materno'];
                            }
                          ?>
                      </td>
                      <td><?php echo $ambientes_item['nombre']; ?></td>                      
                      <td><?php
                            if(isset($tipoAmbientes[$ambientes_item['tipoAmbiente_id']]))
                            {
                              $tipoAmbientes_item = $tipoAmbientes[$ambientes_item['tipoAmbiente_id']];
                              echo $tipoAmbientes_item['tipoAmbiente_id']."-".$tipoAmbientes_item['nombre']."-".$tipoAmbientes_item['acabado'];
                            }                            
                          ?>
                      </td>                      
                      <td><?php
                            if(isset($inmuebles[$ambientes_item['inmueble_id']]))
                            {
                              $inmuebles_item = $inmuebles[$ambientes_item['inmueble_id']];
                              echo $inmuebles_item['nombre'];
                            }
                          ?>
                      </td>
                      <td><?php echo $ambientes_item['piso']; ?></td>
                      <td><?php 
                            if($ambientes_item['ocupado']==='1') 
                            { 
                              echo "Si"; 
                            } else { 
                              echo "No"; 
                            }
                          ?>
                      </td>
                      <td><?php echo $ambientes_item['precio']; ?></td>
                      <td><?php echo $ambientes_item['fechaInicio']; ?></td>
                      <td><?php echo $ambientes_item['fechaVencimiento']; ?></td>
                      <td><?php echo $ambientes_item['garantia']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>                
              </div>
            </div>
          </div>
        </div>