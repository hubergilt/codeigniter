  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>
				    <div class="form-group">
					    <label for="arrendatario_id">Arrendatario ID</label>
					    <input type="input" name="arrendatario_id" class="form-control" placeholder="ARR001" value="<?php echo $new_arrendatario_id; ?>" /><br />
					</div>

					<div class="form-group">
						<label for="inmueble_id">Inmueble</label>
						<?php
							$options=array();
							$options[""]="Seleccionar un Inmueble";
							foreach ($inmuebles as $inmuebles_item){
								$options[$inmuebles_item['inmueble_id']]=$inmuebles_item['inmueble_id']."-".$inmuebles_item['nombre']."-".$inmuebles_item['direccion']."-".$inmuebles_item['distrito'];
							}
							$attributes = array("class"=>"form-control");
							echo form_dropdown('inmueble_id', $options, "", $attributes);
						?>						
					</div>					

					<div class="form-group">
					    <label for="nombres">Nombres</label>
					    <input type="input" name="nombres" class="form-control" placeholder="Huber Paul" /><br />
					</div>

					<div class="form-group">
					    <label for="paterno">Paterno</label>
					    <input type="input" name="paterno" class="form-control" placeholder="Gilt" /><br />
					</div>

					<div class="form-group">
					    <label for="materno">Materno</label>
					    <input type="input" name="materno" class="form-control" placeholder="Lopez" /><br />
					</div>

					<div class="form-group">
					    <label for="dni">Dni</label>
					    <input type="input" name="dni" class="form-control" placeholder="42166147" /><br />
					</div>

				    <input type="submit" name="submit" value="Crear Arrendatarios" class="btn btn-default" />
				</form>
          </div>
        </div>