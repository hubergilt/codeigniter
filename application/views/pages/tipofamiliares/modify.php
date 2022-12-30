  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php echo validation_errors(); ?>			
			<?php								
				$segmnets = sprintf("%s/%s", $tipoFamiliares_item['id'], $tipoFamiliares_item['tipoFamiliar_id']);
				echo form_open($menuitem."/modify/$segmnets");
			?>
				    <div class="form-group">
					    <label for="tipoFamiliar_id">Tipo Deposito ID</label>
					    <input type="input" name="tipoFamiliar_id" class="form-control" placeholder="TFA001"  value="<?php echo $tipoFamiliares_item['tipoFamiliar_id']; ?>" /><br />
					</div>
					
					<div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="EFECTIVO"  value="<?php echo $tipoFamiliares_item['nombre']; ?>" /><br />
					</div>

				    <input type="submit" name="submit" value="Modificar tipoFamiliares" class="btn btn-default"  />
				</form>
          </div>
        </div>