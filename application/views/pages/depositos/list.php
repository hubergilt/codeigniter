  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
  <h1 class="sub-header"><?php echo $home_title; ?></h1>
  <div class="table-responsive">
    <div class="panel panel-primary">
      <div class="panel-heading clearfix">
          <?php echo $home_title;
            $this->load->helper('form');
            echo validation_errors();
            $meses = ["ENE", "FEB", "MAR", "ABR", "MAY", "JUN",
                     "JUL", "AGO", "SEP", "OCT", "NOV", "DIC"];
            $attributes = array('class' => 'radio-inline pull-right', 'id' => 'filter-deposito');
            echo form_open($menuitem."/index/anio/".strtoupper(date("Y"))."/mes/".$meses[date("m")-1], $attributes);
          ?>
          <label style="border: 1px solid white;">
          <label>1.- Inmuebles: </label>
          <br>
          <?php
            // filter inmuebles
            $options=array();
            $options["NOFILTRO"]="NO FILTRO";
            if(isset($inmuebles)){
              foreach ($inmuebles as $inmuebles_item){
                $options[$inmuebles_item['inmueble_id']]=$inmuebles_item['nombre']."-".$inmuebles_item['inmueble_id'];
              }
            }
            $attributes = array("class"=>"btn-default", "id"=>"filter-inmueble");
            echo form_dropdown('filter-inmueble', $options, "", $attributes);            
          ?>          
          </label> 

          <label id="id-radio-inline-ambiente" class="radio-inline">
            <input id="id-radio-ambiente" type="radio" name="filter-radio" checked="checked">
            <label>2.- Ambientes: </label>
            <br>
            <?php
              // filter ambientes
              $options=array();
              $options["NOFILTRO"]="NO FILTRO";
              if(isset($ambientes)){
                foreach ($ambientes as $ambientes_item){
                  if(isset($arrendatarios[$ambientes_item["arrendatario_id"]])){
                    $arrendatarios_item=$arrendatarios[$ambientes_item["arrendatario_id"]];
                    if(isset($inmuebles[$ambientes_item["inmueble_id"]])){
                      $inmuebles_item=$inmuebles[$ambientes_item["inmueble_id"]];
                      $options[$ambientes_item['ambiente_id']]=$ambientes_item['nombre']."-".$inmuebles_item['nombre']."-".$arrendatarios_item['nombres']." ".$arrendatarios_item['paterno']." ".$arrendatarios_item['materno']."-".$ambientes_item['ambiente_id']."-".$inmuebles_item['inmueble_id'];                      
                    }
                  }                  
                }
              }
              $attributes = array("class"=>"btn-default", "id"=>"filter-ambiente");
              echo form_dropdown('filter-ambiente', $options, "", $attributes);            
            ?>
          </label>

          <label id="id-radio-inline-arrendatario" class="radio-inline">
            <input id="id-radio-arrendatario" type="radio" name="filter-radio">
            <label>2.- Arrendatario: </label>
            <br>
            <?php
              // filter arrendatarios
              $options=array();
              $options["NOFILTRO"]="NO FILTRO";
              if(isset($arrendatarios)){
                foreach ($arrendatarios as $arrendatarios_item){
                  $options[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item['nombres']." ".$arrendatarios_item['paterno']." ".$arrendatarios_item['materno']."-".$arrendatarios_item['arrendatario_id']."-".$arrendatarios_item['inmueble_id'];
                }
              }
              $attributes = array("class"=>"btn-default", "id"=>"filter-arrendatario", "disabled"=>"disabled");
              echo form_dropdown('filter-arrendatario', $options, "", $attributes);            
            ?>
          </label>

          <label style="border: 1px solid white;">
            <label>3. Año: </label>
            <br>
            <select class="btn-default" id="filter-anio">
              <option value="2020">2020</option><option value="2019">2019</option>
              <option value="2018">2018</option><option value="2017">2017</option>
              <option value="2016">2016</option><option value="2015">2015</option>
            </select>
          </label>

          <label style="border: 1px solid white;">
            <label>4.-  Mes: </label>
            <br>
            <select class="btn-default" id="filter-mes">
              <option value="ENE">ENE</option><option value="FEB">FEB</option>
              <option value="MAR">MAR</option><option value="ABR">ABR</option>
              <option value="MAY">MAY</option><option value="JUN">JUN</option>
              <option value="JUL">JUL</option><option value="AGO">AGO</option>
              <option value="JUL">SET</option><option value="OCT">OCT</option>
              <option value="NOV">NOV</option><option value="DIC">DIC</option>
            </select>
          </label>
          <span> => </span>

          <button id="id-filter-submit" type="submit" class="btn btn-default">Filtro</button>
          
        </form>
      </div>
      <div class="panel-body">
        <table class="table table-striped">            
          <thead>
            <tr>
              <th>Id</th>
              <th>Deposito ID</th>
              <th>Ambiente</th>
              <th>Arrendatario</th>              
              <th>Tipo Deposito</th>
              <th>Monto S/.</th>
              <th>Año</th>
              <th>Mes</th>                      
              <th>Fecha de Deposito</th>
              <th>Observacion</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            if(isset($depositos)){
              foreach (array_reverse($depositos) as $depositos_item): ?>
                <tr data-id="<?php echo $depositos_item['id']; ?>" data-aux_id="<?php echo $depositos_item['deposito_id']; ?>">
                  <td><?php echo $depositos_item['id']; ?></td>
                  <td><?php echo $depositos_item['deposito_id']; ?></td>
                  <td>
                    <?php
                      if(isset($ambientes[$depositos_item['ambiente_id']]))
                      {
                        $ambientes_item = $ambientes[$depositos_item['ambiente_id']];
                        if(isset($inmuebles[$ambientes_item['inmueble_id']]))
                        {
                          $inmuebles_item = $inmuebles[$ambientes_item['inmueble_id']];
                          echo $ambientes_item['nombre']."-".$inmuebles_item['nombre'];
                        }
                      }
                    ?>
                  </td>
                  <td><?php
                        if(isset($arrendatarios[$depositos_item['arrendatario_id']]))
                        {
                          $arrendatarios_item = $arrendatarios[$depositos_item['arrendatario_id']];
                          echo $arrendatarios_item['nombres']." ".$arrendatarios_item['paterno']." ".$arrendatarios_item['materno'];
                        }
                      ?>
                  </td>                  
                  <td>
                    <?php
                      if(isset($tipoDepositos[$depositos_item['tipoDeposito_id']]))
                      {
                        $tipoDepositos_item = $tipoDepositos[$depositos_item['tipoDeposito_id']];
                        echo $tipoDepositos_item['nombre'];
                      }
                    ?>
                  </td>
                  <td><?php echo $depositos_item['monto']; ?></td>
                  <td><?php echo $depositos_item['anio']; ?></td>
                  <td><?php echo $depositos_item['mes']; ?></td>
                  <td><?php echo $depositos_item['fechaDeposito']; ?></td>
                  <td><?php echo $depositos_item['observacion']; ?></td>
                </tr>                
          <?php 
              endforeach; 
            }
          ?>
          </tbody>
        </table>                
      </div>
    </div>
  </div>
</div>
</div>