<?php 
  
   if(isset($_GET["idusuario"])) {
    
    $idusuario = $_GET["idusuario"];
    
    include_once("vistas/modulos/usuarios.modelo.php");
    $oUsuario = new ModeloUsuarios(); //Clase
    $oUsuario->idusuario = $idusuario;
    $oUsuario->buscarUsuario();

  }

?>

<div class="content-wrapper">   <!-- Content Wrapper. Contains page content -->   
  <section class="content-header">  <!-- Content Header (Page header) -->
    <h1>
      Editar usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio">/ &nbsp; Inicio</a></li>
      <li><a href="usuarios"> &nbsp; Usuarios</a></li>
      <li>Editar usuario</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">  </div>
      <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin:0 auto" role="form" name="formulario" id="formulario" >
        <div class="box-body" >      <!-- ??? -->
            <div class="form-group has-feedback">
              <label for="txtNombre" class="col-lg-4 control-label">Nombre</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Escriba el nombre del usuario..." 
                value="<?php echo $oUsuario->nombre ?>" required>
                <span class="fa fa-user form-control-feedback"></span>
                <div id="errorNombre" class="errorValidar"></div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label for="txtCorreo" class="col-lg-4 control-label">Correo</label>
              <div class="col-lg-4">
                <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Escriba el correo..." 
                value="<?php echo $oUsuario->correo ?>" readonly >
                <span class="fa fa-envelope form-control-feedback"></span>
                <div id="errorCorreo" class="errorValidar"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="cmbPerfil" class="col-lg-4 control-label">Perfil <?php echo  $oUsuario->perfil; ?></label> 
              <div class="col-lg-4" >
                <select class="form-control" name="cmbPerfil" id="cmbPerfil">        
                  <option value="Proyeccionista" <?php echo "Proyeccionista" == $oUsuario->perfil ? "selected" : ""; ?>>Proyeccionista</option>
                  <option value="Cinefilo" <?php echo "Cinefilo" == $oUsuario->perfil ? "selected" : ""; ?> >Cinefilo</option>
                  <option value="Suscriptor" <?php echo "Suscriptor" == $oUsuario->perfil ? "selected" : ""; ?>>Suscriptor</option>
                  <option value="Novato" <?php echo "Novato" == $oUsuario->perfil ? "selected" : ""; ?>>Novato</option>
                  <option value="Fan" <?php echo "Fan" == $oUsuario->perfil ? "selected" : ""; ?>>Fan</option>
                  
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="cmbStatus" class="col-lg-4 control-label">Status</label>
              <div class="col-lg-4" >
                <select class="form-control" name="cmbStatus" id="cmbStatus">        
                  <option value="1" <?php echo "1" == $oUsuario->status ? "selected" : ""; ?>>Activo</option>
                  <option value="2" <?php echo "2" == $oUsuario->status ? "selected" : ""; ?>>Baja</option>
                  <option value="3" <?php echo "3" == $oUsuario->status ? "selected" : ""; ?>>Incapacitado</option>
                  <option value="4" <?php echo "4" == $oUsuario->status ? "selected" : ""; ?>>Temporal</option>
                  <option value="5" <?php echo "5" == $oUsuario->status ? "selected" : ""; ?>>Otro</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="txtFoto" class="col-lg-4 control-label">Agregar foto</label>
              <div class="col-lg-4" >   
                <input type="file" name="txtFoto" id="txtFoto" class="agregarFoto">
                <p class="help-block">Peso máximo de la foto 2 MB... 
                <div id="errorFoto" class="errorValidar"></div></p>
                <img src="<?php echo $oUsuario->foto ?>" class="img-thumbnail previsualizar" width="100px">
              </div>
            </div> 

            <input type="hidden" name="txtIdUsuario" value="<?php echo $oUsuario->idusuario; ?>">
            <input type="hidden" name="txtCorreoActual" value="<?php echo $oUsuario->correo;?>">
            <input type="hidden" name="txtFotoActual" value="<?php echo $oUsuario->foto; ?>">
            
          <div class="box-footer" >
                <button type="submit" name="submitEditarUsuario" class="btn btn-info pull-right">Editar usuario</button>
                <button type="button" name="buttonCancel" class="btn btn-info" onclick="location.href='usuarios'">Cancelar</button>           
          </div>
                    
        </div> <!-- /box-body -->

        <?php

          if(isset($_POST["submitEditarUsuario"])){
            require_once "controladores/usuarios.controlador.php";
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();
          }
        ?>
        
      </form> 
    </div>   <!-- /box -->
    
  </section>
</div>


