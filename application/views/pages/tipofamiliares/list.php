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
                      <th>Tipo Familiar ID</th>
                      <th>nombre</th>
                    </tr>
                  </thead>
                  <tbody>              
                  <?php foreach ($tipoFamiliares as $tipoFamiliares_item): ?>
                    <tr data-id="<?php echo $tipoFamiliares_item['id']; ?>" data-aux_id="<?php echo $tipoFamiliares_item['tipoFamiliar_id']; ?>">
                      <td><?php echo $tipoFamiliares_item['id']; ?></td>
                      <td><?php echo $tipoFamiliares_item['tipoFamiliar_id']; ?></td>
                      <td><?php echo $tipoFamiliares_item['nombre']; ?></td>                 
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>                
              </div>
            </div>
          </div>
        </div>