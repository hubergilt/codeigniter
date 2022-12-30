  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php echo validation_errors(); ?>			
			<?php								
				$segmnets = sprintf("%s/%s", $tipoAmbientes_item['id'], $tipoAmbientes_item['tipoAmbiente_id']);
				echo form_open($menuitem."/modify/$segmnets");
			?>
				    <div class="form-group">
					    <label for="tipoAmbiente_id">Tipo Ambiente ID</label>
					    <input type="input" name="tipoAmbiente_id" class="form-control" placeholder="TAM001"  value="<?php echo $tipoAmbientes_item['tipoAmbiente_id']; ?>" /><br />
					</div>
					
					<div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="P1"  value="<?php echo $tipoAmbientes_item['nombre']; ?>" /><br />
					</div>

					<div class="form-group">
					    <label for="acabado">Acabado</label>
					    <input type="input" name="acabado" class="form-control" placeholder="False"  value="<?php echo $tipoAmbientes_item['acabado']; ?>" /><br />
					</div>

				    <input type="submit" name="submit" value="Modificar tipoAmbientes" class="btn btn-default"  />
				</form>
          </div>
        </div>