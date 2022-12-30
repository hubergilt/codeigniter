  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php echo validation_errors(); ?>			
			<?php								
				$segmnets = sprintf("%s/%s", $telefonos_item['id'], $telefonos_item['telefono_id']);
				echo form_open($menuitem."/modify/$segmnets");
			?>
				    <div class="form-group">
					    <label for="telefono_id">Telefono ID</label>
					    <input type="input" name="telefono_id" class="form-control" placeholder="TEL001" value="<?php echo $telefonos_item['telefono_id']; ?>" /><br />
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
							echo form_dropdown("arrendatario_id", $options, $telefonos_item['arrendatario_id'], $attributes);
						?>						    
					</div>

					<div class="form-group">
					    <label for="numero">Numero</label>
					    <input type="input" name="numero" class="form-control" placeholder="908051908" value="<?php echo $telefonos_item['numero']; ?>" /><br />
					</div>

				    <input type="submit" name="submit" value="Modificar Arrendatarios" class="btn btn-default" />
				</form>
          </div>
        </div>