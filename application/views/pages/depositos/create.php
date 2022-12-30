  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>
				    <div class="form-group">
					    <label for="deposito_id">Deposito ID</label>
					    <input type="input" name="deposito_id" class="form-control" placeholder="DEP001" value="<?php echo $new_deposito_id;; ?>" /><br />
					</div>

					<div class="form-group">
						<label for="ambiente_id">Ambiente</label>
						<?php
							$options=array();
							$options[""]="Seleccionar un Ambiente";
							if(isset($ambientes)){
								foreach ($ambientes as $ambientes_item){
									if (isset($tipoAmbientes[$ambientes_item['tipoAmbiente_id']]) &&
										isset($arrendatarios[$ambientes_item['arrendatario_id']]))
									{
										$tipoAmbientes_item = $tipoAmbientes[$ambientes_item['tipoAmbiente_id']];
										$arrendatarios_item = $arrendatarios[$ambientes_item['arrendatario_id']];
										$ocupado="Ocupado:";
										if($ambientes_item['ocupado']==="1"){
											$ocupado .= "SI";
										}else{
											$ocupado .= "NO";
										}
										$options[$ambientes_item['ambiente_id']]=$ambientes_item['ambiente_id']." - ".$ambientes_item['nombre']." - ".$tipoAmbientes_item['nombre']." - ".$ocupado." - ".$arrendatarios_item['arrendatario_id'].":".$arrendatarios_item['nombres']." ".$arrendatarios_item['paterno']." ".$arrendatarios_item['materno'];
									}
								}
							}
							$attributes = array("id"=>"id-ambiente", "class"=>"form-control");
							echo form_dropdown("ambiente_id", $options, "", $attributes);
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
						<label for="tipoDeposito_id">Tipo Deposito</label>
						<?php
							$options=array();
							$options[""]="Seleccionar un Tipo de Deposito";
							foreach ($tipoDepositos as $tipoDepositos_item){								
								$options[$tipoDepositos_item['tipoDeposito_id']]=$tipoDepositos_item['tipoDeposito_id']."-".$tipoDepositos_item['nombre'];
							}							
							$attributes = array("class"=>"form-control");
							echo form_dropdown('tipoDeposito_id', $options, "", $attributes);
						?>						
					</div>

					<div class="form-group">
					    <label for="monto">Monto S/.</label>
					    <input type="input" name="monto" class="form-control" placeholder="500" id="id-monto"/><br />
					</div>

					<div class="form-group">
						<label for="anio">Año</label>
						<?php
							$options = array("2015"=>"2015", "2016"=>"2016", "2017"=>"2017", "2018"=>"2018", "2019"=>"2019", "2020"=>"2020");
							$attributes = array("class"=>"form-control");
							echo form_dropdown('anio', $options, "", $attributes);
						?>						
					</div>					

					<div class="form-group">
						<label for="mes">Mes</label>
						<?php
							$options = array("ENE"=>"ENE", "FEB"=>"FEB", "MAR"=>"MAR", "ABR"=>"ABR", "MAY"=>"MAY", "JUN"=>"JUN", "JUL"=>"JUL", "AGO"=>"AGO", "SET"=>"SET", "OCT"=>"OCT", "NOV"=>"NOV", "DIC"=>"DIC");
							$attributes = array("class"=>"form-control");
							echo form_dropdown('mes', $options, "", $attributes);
						?>						
					</div>

					<div class="form-group">
					    <label for="fechaDeposito">Fecha de Deposito DD-MM-YYYY</label>
						<div class="input-group date">
						  <input type="text" name="fechaDeposito" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>					    
					</div>

					<div class="form-group">
					    <label for="observacion">Observacion</label>
					    <input type="input" name="observacion" class="form-control" placeholder="Ninguna" id="id-observacion" value="Ninguna" /><br />
					</div>

				    <input type="submit" name="submit" value="Crear Despositos" class="btn btn-default" id="id-submit-deposito"/>
				</form>
          </div>
        </div>