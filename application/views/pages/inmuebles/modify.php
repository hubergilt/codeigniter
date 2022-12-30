  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php echo validation_errors(); ?>			
			<?php								
				$segmnets = sprintf("%s/%s", $inmuebles_item['id'], $inmuebles_item['inmueble_id']);
				echo form_open($menuitem."/modify/$segmnets");				
			?>
			    <div class="form-group">
				    <label for="inmueble_id">Ambiente ID</label>
				    <input type="input" name="inmueble_id" class="form-control" placeholder="AMB001" value="<?php echo $inmuebles_item['inmueble_id']; ?>" /><br />
				</div>

				<div class="form-group">
					<label for="nombre">Nombre</label>
				    <input type="input" name="nombre" class="form-control" placeholder="P1" value="<?php echo $inmuebles_item['nombre']; ?>"/><br />						
				</div>					

				<div class="form-group">
					<label for="direccion">Direccción</label>
				    <input type="input" name="direccion" class="form-control" placeholder="Av./Jr. nombre-de-via numero-de-puerta" value="<?php echo $inmuebles_item['direccion']; ?>" /><br />					
				</div>

				<div class="form-group">
				    <label for="pisos">Pisos</label>
				    <input type="input" name="pisos" class="form-control" placeholder="1, 2, 3 ..." value="<?php echo $inmuebles_item['pisos']; ?>" /><br />
				</div>

				<div class="form-group">
					<label for="departamento">Departamento</label>
					<?php
						$attributes = array("id"=>"departamento", "class"=>"form-control");
						echo form_dropdown('departamento', $departamentos, $inmuebles_item['departamento'], $attributes);
					?>						
				</div>									

				<div class="form-group">
				    <label for="provincia">Provincia</label>
					<?php
						$attributes = array("id"=>"provincia", "class"=>"form-control");
						echo form_dropdown('provincia', $provincias, $inmuebles_item['provincia'], $attributes);
					?>					    
				</div>

				<div class="form-group">
				    <label for="distrito">Distrito</label>
					<?php
						$attributes = array("id"=>"distrito", "class"=>"form-control");
						echo form_dropdown('distrito', $distritos, $inmuebles_item['distrito'], $attributes);
					?>					    
				</div>					    

				    <input type="submit" name="submit" value="Modificar inmuebles" class="btn btn-default" />
				</form>
          </div>
        </div>