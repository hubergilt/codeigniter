  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
          <h1 class="sub-header"> Resumen </h1>
          <div class="table-responsive">

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-building-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($inmuebles)){
                                            echo count($inmuebles);
                                        }else{
                                            echo 0;
                                        }
                                    ?>
                                </div>
                                <div>Inmuebles!</div>
                            </div>
                        </div>
                    </div>                    
					<?php
						echo anchor('inmuebles', '
					        <div class="panel-footer">
					            <span class="pull-left">Ver detalles...</span>
					            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					            <div class="clearfix"></div>
					        </div>
						');
					?>                                        
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-suitcase fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($ambientes)){
                                            echo count($ambientes);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                
                                </div>
                                <div>Ambientes!</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('ambientes', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                    
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-male fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($arrendatarios)){
                                            echo count($arrendatarios);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Arrendatarios!</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('arrendatarios', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                     
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($depositos)){
                                            echo count($depositos);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Depositos!</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('depositos', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                        
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-female fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($familiares)){
                                            echo count($familiares);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Familiares</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('familiares', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                     
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-phone fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($telefonos)){
                                            echo count($telefonos);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Telefonos</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('telefonos', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                    
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-home fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($tipoAmbientes)){
                                            echo count($tipoAmbientes);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Tipo Ambientes!</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('tipoAmbientes', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                     
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bank fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($tipoDepositos)){
                                            echo count($tipoDepositos);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Tipo Depositos!</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('tipoDepositos', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                     
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                        if(isset($tipoFamiliares)){
                                            echo count($tipoFamiliares);
                                        }else{
                                            echo 0;
                                        }
                                    ?>                                    
                                </div>
                                <div>Tipo Familiares!</div>
                            </div>
                        </div>
                    </div>
					<?php
						echo anchor('tipoFamiliares', '
	                        <div class="panel-footer">
	                            <span class="pull-left">Ver detalles...</span>
	                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                            <div class="clearfix"></div>
	                        </div>
						');
					?>                    
                </div>
            </div>            

          </div>
        </div>
