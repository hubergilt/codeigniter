<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon/favicon.ico">
    
    <title>Registro de alquileres <?php echo 'CI:'.CI_VERSION; if(isset($home_title)){ echo '-'.$home_title; } ?></title>      

    <?php 
      $this->load->helper('html');
      echo link_tag('libs/bower_components/bootstrap/dist/css/bootstrap.min.css');
      echo link_tag('libs/css/dashboard.css');
      echo link_tag('libs/css/sticky-footer.css'); 
      echo link_tag("libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css");
      echo link_tag("libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css");
      echo link_tag("libs/font-awesome/css/font-awesome.min.css");
      echo script_tag('libs/js/ie-emulation-modes-warning.js');
      echo script_tag('libs/bower_components/bootstrap/js/button.js');
      echo script_tag('libs/bower_components/jquery/dist/jquery.js');
      echo script_tag('libs/bower_components/bootstrap/dist/js/bootstrap.js');
      echo script_tag('libs/js/vendor/holder.min.js');
      echo script_tag('libs/js/ie10-viewport-bug-workaround.js');
      echo script_tag('libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
      echo script_tag('libs/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js');
    ?>

    <script>
      $(document).ready(function(){
        // alert("Ingreso!");
        // alert(window.location.href);     // Returns full URL
        // alert(window.location.pathname);

        var uri = window.location.pathname;
        uri = uri.replace(/\s+/g, '');

        $(".table tbody tr")
          .click(function(){

            var id = $(this).data("id");
            // console.log(id);
            var aux_id = $(this).data("aux_id");
            // alert("id: "+id+" aux_id: "+aux_id);


            var new_uri="";
            var partes = uri.split("/");
            // alert(partes.length);
            if (partes.length>6){
              var pos = uri.indexOf("/index/");              
              if(pos!==-1){
                new_uri = uri.slice(0, pos);
              }
            }else{
              new_uri = uri;
            }

            // alert("new_uri: "+new_uri);
            var operation = $(".btn-group > .btn.active").text().toLowerCase().trim();
            // alert("operation: "+operation);
            if(operation==="actualizar"){
                window.location = new_uri+"/modify/"+id+"/"+aux_id;
            } else if (operation==="borrar"){
                if(confirm("Confirmar para borrar el registro ids: '"+id+","+aux_id+"'")){
                    window.location = new_uri+"/delete/"+id+"/"+aux_id;
                }
            }
        });

        $('.input-group.date')
          .datepicker({
            //format: "dd/mm/yyyy",
            format: "dd-mm-yyyy",
            language: "es",            
            todayBtn: true,
            clearBtn: true,
            autoclose: true,       
            todayHighlight: true
        });

        $("#departamento")
          .change(function(){
            //var departamento = $("#departamento option:selected").text();
            var departamento = $("#departamento");
            if(departamento.val()=="LIMA"){
                $("#provincia option:selected").removeAttr("selected");
                $("#provincia option[value='LIMA']").attr('selected', 'selected');
                $("#distrito option:selected").removeAttr("selected");
                $("#distrito option[value='LOS OLIVOS']").attr('selected', 'selected');
                
                $("#provincia optgroup[label='LIMA']").prop("disabled", false);
                $("#distrito optgroup[label='LIMA']").prop("disabled", false);
                $("#provincia optgroup[label='PUNO']").prop("disabled", true);                
                $("#distrito optgroup[label='PUNO']").prop("disabled", true);

            }
            else if(departamento.val()=="PUNO") {
                $("#provincia option:selected").removeAttr("selected");
                $("#provincia option[value='PUNO']").attr('selected', 'selected');
                $("#distrito option:selected").removeAttr("selected");
                $("#distrito option[value='PUNO']").attr('selected', 'selected');

                $("#provincia optgroup[label='PUNO']").prop("disabled", false);
                $("#distrito optgroup[label='PUNO']").prop("disabled", false);
                $("#provincia optgroup[label='LIMA']").prop("disabled", true);
                $("#distrito optgroup[label='LIMA']").prop("disabled", true);
                

            }
            else {
                alert("Esta opción no está activada.");                            
            }
        });

        var ambiente_id="NOFILTRO";
        var arrendatario_id="NOFILTRO";
        var hoy = new Date();
        var meses = ["ENE", "FEB", "MAR", "ABR", "MAY", "JUN",
                     "JUL", "AGO", "SEP", "OCT", "NOV", "DIC"];
        var anio = hoy.getFullYear();
        var mes = meses[hoy.getMonth()];        

        //    /index.php/Depositos/index/anio/2017/mes/DIC
        if(uri!==null || uri!==undefined){
          // var partes = uri.split("/");
          // alert(uri);
          var result = uri.match(/\d{4}/);
          if(result!==null){
            anio=result;
            $("#filter-anio").val(anio);
          }
          // alert(anio);
          result = uri.match(/[A-Z]{3}/);
          if(result!==null){
            mes=result;
            $("#filter-mes").val(mes);
          }
          // alert(mes);
          result = uri.match(/AMB\d{3}/);
          if(result!==null){
            ambiente_id=result;
            $("#filter-ambiente").val(ambiente_id);
          }
          // alert(ambiente_id);
          result = uri.match(/ARR\d{3}/);
          if(result!==null){
            arrendatario_id=result;
            $("#filter-arrendatario").val(arrendatario_id);
          }
          // alert(arrendatario_id);          
        }

        $("#filter-anio").val(anio);
        $("#filter-mes").val(mes);

        $("#filter-ambiente")
          .change(function(){
            if($(this).val()!=="NOFILTRO"){              
              $("#filter-arrendatario").val("NOFILTRO");
            }
        });

        $("#filter-arrendatario")
          .change(function(){
            if($(this).val()!=="NOFILTRO"){
              $("#filter-ambiente").val("NOFILTRO");              
            }
        });

        $("#filter-anio, #filter-mes, #filter-ambiente, #filter-arrendatario")
          .change(function(){            
            // alert($(this).attr("id"));

            var new_uri="";
            var partes = uri.split("/");
            // alert(partes.length);
            if (partes.length>6){
              var pos = uri.indexOf("/index/");              
              if(pos!==-1){
                new_uri = uri.slice(0, pos);
              }
            }else{
              new_uri = uri;
            }

            if($(this).attr("id")==="filter-anio"){
              anio = $(this).val();
            } else if($(this).attr("id")==="filter-mes"){
              mes = $(this).val();
            } else if($(this).attr("id")==="filter-ambiente"){
              ambiente_id = $(this).val();
              // if(ambiente_id!=="NOFILTRO"){
              //   $("#filter-arrendatario").val("NOFILTRO");
              // }
            } else if($(this).attr("id")==="filter-arrendatario"){
              arrendatario_id = $(this).val();
              // if(arrendatario_id!=="NOFILTRO"){
              //   $("#filter-ambiente").val("NOFILTRO");   
              // }
            }

            new_uri += "/index/anio/"+anio+"/mes/"+mes;

            // alert("ambiente_id: "+ambiente_id+" ,arrendatario_id: "+arrendatario_id);

            if(ambiente_id!=="NOFILTRO" && arrendatario_id==="NOFILTRO"){
              new_uri += "/ambiente_id/"+ambiente_id;
            }else if(ambiente_id==="NOFILTRO" && arrendatario_id!=="NOFILTRO"){
              new_uri += "/arrendatario_id/"+arrendatario_id;
            }
            
            // alert(new_uri);

            $("#filter-deposito").attr('action',new_uri);
        });

        var ambientes={};
        var arrendatarios={};

        $("#filter-ambiente option")
          .each(function(){
            var val  = $(this).val();
            var text = $(this).text();
            if (!ambientes.hasOwnProperty(val)){
              // alert("val: "+val);
              ambientes[val]=text;  
            }           
        });

        $("#filter-arrendatario option")
          .each(function(){
            var val  = $(this).val();
            var text = $(this).text();
            if (!arrendatarios.hasOwnProperty(val)){
              // alert("val: "+val);
              arrendatarios[val]=text;  
            }            
        });

        // make function() to restart cmb ambiente
        function reset_filters(){
          // alert("length: "+Object.keys(ambientes).length);
          $("#filter-ambiente option").remove();
          for(var value in ambientes){
            option = ambientes[value];
            $("#filter-ambiente").append("<option value='"+value+"'>"+option+"</option>");
          }

          $("#filter-arrendatario option").remove();
          for(var value in arrendatarios){
            option = arrendatarios[value];
            $("#filter-arrendatario").append("<option value='"+value+"'>"+option+"</option>");
          }
        };

        $("#filter-inmueble")
          .change(function(){
            if($(this).val()!=="NOFILTRO"){
              
              reset_filters();

              var valor=$(this).val();

              var ambientes_ids = [];
              var arrendatarios_ids = [];

              var inmueble_id="";
              var ambiente_id="";
              var arrendatario_id="";

              //filter-ambiente
              $("#filter-ambiente option" )
                .each(function() {
                    var option = $(this).text();
                    var partes = option.split("-");
                    if(partes.length>4){
                      ambiente_id=partes[3];
                      inmueble_id=partes[4];
                      if(inmueble_id!==valor){                        
                        ambientes_ids.push(ambiente_id);                        
                      }
                    }
              });
              for (var i=0; i< ambientes_ids.length; i++){
                $("#filter-ambiente option[value='"+ambientes_ids[i]+"']").remove();
              }

              //filter-arrendatario
              $("#filter-arrendatario option" )
                .each(function() {
                    var option = $(this).text();
                    var partes = option.split("-");
                    if(partes.length>2){
                      arrendatario_id=partes[1];
                      inmueble_id=partes[2];
                      if(inmueble_id!==valor){                        
                        arrendatarios_ids.push(arrendatario_id);                        
                      }
                    }
              });
              for (var i=0; i< arrendatarios_ids.length; i++){
                $("#filter-arrendatario option[value='"+arrendatarios_ids[i]+"']").remove();
              }

            }
        });

        $('input:radio[name=filter-radio]')
          .change(function() {
            ambiente_id="NOFILTRO";
            arrendatario_id="NOFILTRO";
            if ($(this).attr("id") == 'id-radio-ambiente') {
              if($("#filter-ambiente").val()!=="NOFILTRO"){
                $("#filter-arrendatario").val("NOFILTRO");
              }
              $("#filter-ambiente").prop("disabled", false);
              $("#filter-arrendatario").prop("disabled", true);
            }
            else if ($(this).attr("id") == 'id-radio-arrendatario') {
              if($("#filter-arrendatario").val()!=="NOFILTRO"){
                $("#filter-ambiente").val("NOFILTRO");
              }
              $("#filter-arrendatario").prop("disabled", false);
              $("#filter-ambiente").prop("disabled", true);
            }
        });          

        $("#id-ocupado")
          .change(function(){
            var ocupado = $(this).val();
            if(ocupado==="0"){
              $("#id-arrendatario").val("ARR000");
              // $("#id-arrendatario").prop("disabled", true);
            }else{
              $("#id-arrendatario").val("");
              $("#id-arrendatario").prop("disabled", false);
            }  
        });

        $("#id-arrendatario")
          .change(function(){           
            var arrendatario = $(this).val();
            if(arrendatario==="ARR000"){
              $("#id-ocupado").val("0");
              // $("#id-ocupado").prop("disabled", true);
            }else{
              $("#id-ocupado").val("1");
              $("#id-ocupado").prop("disabled", false);
            }
        });

        $("#id-ambiente")
          .change(function(){
            var valor = "";
            var ocupado = "SI";
            var arrendatario = "";

            $("#id-ambiente option:selected" )
              .each(function() {
                  valor += $(this).text() + " ";
            });
            
            var partes = valor.split("-");            
            if(partes.length>3){
              var str_ocupado = partes[3].replace(/\s+/g, '');
              var trozos = str_ocupado.split(":");
              if(trozos.length>1){
                ocupado=trozos[1];
              }
              str_arrendatario = partes[4].replace(/\s+/g, '');;
              trozos = str_arrendatario.split(":");
              if(trozos.length>1){
                arrendatario=trozos[0];
              }
            }

            if(ocupado==="NO"){
              $("#id-monto").val(0);
              // $("#id-monto").prop("disabled", true);
            }else{
              $("#id-arrendatario").val(arrendatario);
              // $("#id-arrendatario").prop("disabled", true);
              $("#id-monto").prop("disabled", false);
            }
        });

        $("#id-arrendatario")
          .change(function(){           
            var arrendatario = $(this).val();
            if(arrendatario==="ARR000"){
              $("#id-ocupado").val("0");
              // $("#id-ocupado").prop("disabled", true);
            }else{
              $("#id-ocupado").val("1");
              // $("#id-ocupado").prop("disabled", false);
            }
        });

      });
    </script>

    <style type="text/css">
        tbody tr:hover{
          cursor: pointer;
        }
        ul.nav-sidebar li#id-li-inmueble{
          border-top: 1px solid #428BCA; 
        }
        ul.nav-sidebar li{
          border-bottom: 1px solid #428BCA;
        }
        #filter-inmueble{          
          width: 120px;
        }
        #filter-ambiente, #filter-arrendatario{          
          width: 220px;
        }
        #id-radio-inline-ambiente, #id-radio-inline-arrendatario{
          border: 1px solid white;
          top: -14px;
        }
        #id-filter-submit{
          border: 1px solid white;
          top: -15px;
        }
    </style>

  </head>