  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>
				    <div class="form-group">
					    <label for="familiar_id">Familiar ID</label>
					    <input type="input" name="familiar_id" class="form-control" placeholder="FAM001"  value="<?php echo $new_familiar_id; ?>" /><br />
					</div>

					<div class="form-group">
					    <label for="arrendatario_id">Arrendatario</label>
					    <!-- <input type="input" name="arrendatario_id" class="form-control" placeholder="ARR001" /><br /> -->
						<?php
							$options=array();
							$options[""]="Seleccionar un Arrendatarios";
							foreach ($arrendatarios as $arrendatarios_item){								
								$options[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item['arrendatario_id']."-".$arrendatarios_item['nombres']." ".$arrendatarios_item['paterno']." ".$arrendatarios_item['materno'];
							}
							$attributes = array("class"=>"form-control");
							echo form_dropdown("arrendatario_id", $options, "", $attributes);
						?>						    
					</div>

					<div class="form-group">
					    <label for="tipoFamiliar_id">Tipo Familiar</label>
					    <!-- <input type="input" name="tipoFamiliar_id" class="form-control" placeholder="TFA001" /><br /> -->
						<?php
							$options=array();
							$options[""]="Seleccionar un Tipo Familiar";
							foreach ($tipoFamiliares as $tipoFamiliares_item){								
								$options[$tipoFamiliares_item['tipoFamiliar_id']]=$tipoFamiliares_item['tipoFamiliar_id']."-".$tipoFamiliares_item['nombre'];
							}
							$attributes = array("class"=>"form-control");
							echo form_dropdown("tipoFamiliar_id", $options, "", $attributes);
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

				    <input type="submit" name="submit" value="Crear Familiares" class="btn btn-default" />
				</form>
          </div>
        </div>