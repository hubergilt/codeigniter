  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php echo validation_errors(); ?>			
			<?php								
				$segmnets = sprintf("%s/%s", $arrendatarios_item['id'], $arrendatarios_item['arrendatario_id']);
				echo form_open($menuitem."/modify/$segmnets");
			?>
				    <div class="form-group">
					    <label for="arrendatario_id">Arrendatario ID</label>
					    <input type="input" name="arrendatario_id" class="form-control" placeholder="ARR001" value="<?php echo $arrendatarios_item['arrendatario_id']; ?>" /><br />
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
							echo form_dropdown('inmueble_id', $options, $arrendatarios_item['inmueble_id'], $attributes);
						?>						
					</div>

					<div class="form-group">
					    <label for="nombres">Nombres</label>
					    <input type="input" name="nombres" class="form-control" placeholder="Huber Paul" value="<?php echo $arrendatarios_item['nombres']; ?>" /><br />
					</div>

					<div class="form-group">
					    <label for="paterno">Paterno</label>
					    <input type="input" name="paterno" class="form-control" placeholder="Gilt" value="<?php echo $arrendatarios_item['paterno']; ?>" /><br />
					</div>

					<div class="form-group">
					    <label for="materno">Materno</label>
					    <input type="input" name="materno" class="form-control" placeholder="Lopez" value="<?php echo $arrendatarios_item['materno']; ?>" /><br />
					</div>

					<div class="form-group">
					    <label for="dni">Dni</label>
					    <input type="input" name="dni" class="form-control" placeholder="42166147" value="<?php echo $arrendatarios_item['dni']; ?>" /><br />
					</div>

				    <input type="submit" name="submit" value="Modificar Arrendatarios" class="btn btn-default" />
				</form>
          </div>
        </div>