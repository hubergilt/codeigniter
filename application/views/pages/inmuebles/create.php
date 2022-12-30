  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>
			
				    <div class="form-group">
					    <label for="inmueble_id">Ambiente ID</label>
					    <input type="input" name="inmueble_id" class="form-control" placeholder="AMB001" value="<?php echo $new_inmueble_id; ?>" /><br />
					</div>

					<div class="form-group">
						<label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="CASA PUNO" /><br />						
					</div>					

					<div class="form-group">
						<label for="direccion">Direccción</label>
					    <input type="input" name="direccion" class="form-control" placeholder="Av./Jr. nombre-de-via numero-de-puerta" /><br />					
					</div>

					<div class="form-group">
					    <label for="pisos">Pisos</label>
					    <input type="input" name="pisos" class="form-control" placeholder="1, 2, 3 ..." /><br />
					</div>

					<div class="form-group">
						<label for="departamento">Departamento</label>
						<?php
							$attributes = array("id"=>"departamento", "class"=>"form-control");
							echo form_dropdown('departamento', $departamentos, "LIMA", $attributes);
						?>						
					</div>									

					<div class="form-group">
					    <label for="provincia">Provincia</label>
						<?php
							$attributes = array("id"=>"provincia", "class"=>"form-control");
							echo form_dropdown('provincia', $provincias, "LIMA", $attributes);
						?>					    
					</div>

					<div class="form-group">
					    <label for="distrito">Distrito</label>
						<?php
							$attributes = array("id"=>"distrito", "class"=>"form-control");
							echo form_dropdown('distrito', $distritos,"LIMA", $attributes);
						?>					    
					</div>					

				    <input type="submit" name="submit" value="Crear Inmuebles" class="btn btn-default" />
				</form>
          </div>
        </div>