  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>
				    <div class="form-group">
					    <label for="telefono_id">Telefono ID</label>
					    <input type="input" name="telefono_id" class="form-control" placeholder="TEL001" value="<?php echo $new_telefonos_id; ?>" /><br />
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
					    <label for="numero">Numero</label>
					    <input type="input" name="numero" class="form-control" placeholder="908051908" /><br />
					</div>

				    <input type="submit" name="submit" value="Crear Telefonos" class="btn btn-default" />
				</form>
          </div>
        </div>