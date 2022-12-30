  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php echo validation_errors(); ?>			
			<?php								
				$segmnets = sprintf("%s/%s", $tipoDepositos_item['id'], $tipoDepositos_item['tipoDeposito_id']);
				echo form_open($menuitem."/modify/$segmnets");
			?>
				    <div class="form-group">
					    <label for="tipoDeposito_id">Tipo Deposito ID</label>
					    <input type="input" name="tipoDeposito_id" class="form-control" placeholder="TDE001"  value="<?php echo $tipoDepositos_item['tipoDeposito_id']; ?>" /><br />
					</div>
					
					<div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="EFECTIVO"  value="<?php echo $tipoDepositos_item['nombre']; ?>" /><br />
					</div>

				    <input type="submit" name="submit" value="Modificar tipoDepositos" class="btn btn-default"  />
				</form>
          </div>
        </div>