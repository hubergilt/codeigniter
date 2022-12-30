  	<div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>
			
				    <div class="form-group">
					    <label for="ambiente_id">Ambiente ID</label>
					    <input type="input" name="ambiente_id" class="form-control" placeholder="AMB001" value="<?php echo $new_ambiente_id; ?>" /><br />
					</div>

				    <div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="CUARTO GRANDE" value="" /><br />
					</div>

					<div class="form-group">
						<label for="tipoAmbiente_id">Tipo Ambiente</label>
						<?php
							$options=array();
							$options[""]="Seleccionar un Tipo de Ambiente";
							foreach ($tipoAmbientes as $tipoAmbientes_item){
								$options[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item['tipoAmbiente_id']."-".$tipoAmbientes_item['nombre']."-".$tipoAmbientes_item['acabado'];
							}
							$attributes = array("class"=>"form-control");
							echo form_dropdown('tipoAmbiente_id', $options, "", $attributes);
						?>						
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
						<label for="arrendatario_id">Arredatario</label>
						<?php
							$options=array();
							$options[""]="Seleccionar un Arredatario";
							foreach ($arrendatarios as $arrendatarios_item){
								$options[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item['nombres']." ".$arrendatarios_item['paterno']." ".$arrendatarios_item['materno'].", DNI: ".$arrendatarios_item['dni'];
							}
							$attributes = array("id"=>"id-arrendatario", "class"=>"form-control");
							echo form_dropdown('arrendatario_id', $options, "", $attributes);
						?>						
					</div>					

					<div class="form-group">
					    <label for="piso">Piso</label>
					    <input type="input" name="piso" class="form-control" placeholder="P1" /><br />
					</div>

					<div class="form-group">
						<label for="ocupado">Ocupado</label>
						<?php
							$options = array("0"=>"No", "1"=>"Si");
							$attributes = array("id"=>"id-ocupado", "class"=>"form-control");
							echo form_dropdown('ocupado', $options, "", $attributes);
						?>						
					</div>

					<div class="form-group">
					    <label for="precio">Precio S/.</label>
					    <input type="input" name="precio" class="form-control" placeholder="500" /><br />
					</div>					

					<div class="form-group">
					    <label for="fechaInicio">Fecha Inicio DD-MM-YYYY</label>
						<div class="input-group date">
						  <input type="text" name="fechaInicio" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>					    
					</div>

					<div class="form-group">
					    <label for="fechaVencimiento">Fecha Vencimiento DD-MM-YYYY</label>
						<div class="input-group date">
						  <input type="text" name="fechaVencimiento" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>					    
					</div>

					<div class="form-group">
					    <label for="garantia">Garantia S/.</label>
					    <input type="input" name="garantia" class="form-control" placeholder="500" /><br />
					</div>

				    <input type="submit" name="submit" value="Crear ambientes" class="btn btn-default" />
				</form>
          </div>
        </div>