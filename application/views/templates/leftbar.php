<div class="container-fluid">
<div class="row">  
  <div class="col-sm-2 col-md-1 sidebar">
    <ul class="nav nav-sidebar">
      <li id="id-li-inmueble" data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="inmuebles") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('inmuebles', 'Inmueble');
        ?>
      </li>
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="arrendatarios") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('arrendatarios', 'Arrendatario');
        ?>
      </li>                
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="ambientes") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('ambientes', 'Ambiente');
        ?>
      </li>
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="depositos") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('depositos', 'Deposito');
        ?>
      </li>
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="familiares") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('familiares', 'Familiar');
        ?>
      </li> 

      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="telefonos") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('telefonos', 'Telefono');
        ?>
      </li>
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="tipoambientes") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('tipoAmbientes', 'Tipo Ambiente');
        ?>
      </li>    
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="tipodepositos") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('tipoDepositos', 'Tipo Deposito');
        ?>
      </li>    
      <li data-controller="<?php if (isset($menuitem)) { echo $menuitem; } ?>" class="<?php if (isset($menuitem)) { if (strtolower($menuitem)=="tipofamiliares") {echo "active"; } else  {echo "noactive";} }?>">
        <?php 
          $this->load->helper('url');
          echo anchor('tipoFamiliares', 'Tipo Familiar');
        ?>
      </li>
    </ul>
  </div> <!-- end sidebar -->
