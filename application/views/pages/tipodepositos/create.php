  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>

					<div class="form-group">
					    <label for="tipoDeposito_id">Tipo Deposito ID</label>
					    <input type="input" name="tipoDeposito_id" class="form-control" placeholder="TDE001" value="<?php echo $new_tipoDeposito_id; ?>" /><br />
					</div>
					
					<div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="EFECTIVO" /><br />
					</div>

				    <input type="submit" name="submit" value="Crear tipoDepositos" class="btn btn-default" />
				</form>
          </div>
        </div>