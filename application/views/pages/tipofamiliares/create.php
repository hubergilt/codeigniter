  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"><?php echo $home_title; ?></h1>
          <div class="table-responsive">
			<?php 
				echo validation_errors();
				echo form_open($menuitem."/create");
			?>

					<div class="form-group">
					    <label for="tipoFamiliar_id">Tipo Familiar ID</label>
					    <input type="input" name="tipoFamiliar_id" class="form-control" placeholder="TFA001" value="<?php echo $new_tipoFamiliar_id; ?>" /><br />
					</div>
					
					<div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="input" name="nombre" class="form-control" placeholder="CONYUGE" /><br />
					</div>

				    <input type="submit" name="submit" value="Crear tipoFamiliares" class="btn btn-default" />
				</form>
          </div>
        </div>