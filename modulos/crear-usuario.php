<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
  <section class="content-header"> <!-- Content Header (Page header) -->
    <h1>
      Crear usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio">/ &nbsp; Inicio</a></li>
      <li><a href="usuarios"> &nbsp; Usuarios</a></li>
      <li>Crear usuario</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header"> </div>
      <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin:0 auto" role="form"
        name="formulario" id="formulario">
        <div class="box-body"> <!-- ??? -->
          <div class="form-group has-feedback">
            <label for="txtNombre" class="col-lg-4 control-label">Nombre</label>
            <div class="col-lg-4">
              <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                placeholder="Escriba el nombre del usuario..." value="" required>
              <span class="fa fa-user form-control-feedback"></span>
              <div id="errorNombre" class="errorValidar"></div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="txtCorreo" class="col-lg-4 control-label">Correo</label>
            <div class="col-lg-4">
              <input type="email" class="form-control" name="txtCorreo" id="txtCorreo"
                placeholder="Escriba el correo..." value="" required>
              <span class="fa fa-envelope form-control-feedback"></span>
              <div id="errorCorreo" class="errorValidar"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="cmbPerfil" class="col-lg-4 control-label">Perfil</label>
            <div class="col-lg-4">
              <select class="form-control" name="cmbPerfil" id="cmbPerfil">
                <option value="Administrador">Proyeccionista</option>
                <option value="Gerente">Cinefilo</option>
                <option value="Supervior">Suscriptor</option>
                <option value="Vendedor">Novato</option>
                <option value="Otro">Fan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="cmbStatus" class="col-lg-4 control-label">Status</label>
            <div class="col-lg-4">
              <select class="form-control" name="cmbStatus" id="cmbStatus">
                <option value="1">Activo</option>
                <option value="2">Baja</option>
                <option value="3">Incapacitado</option>
                <option value="4">Temporal</option>
                <option value="5">Otro</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="txtFoto" class="col-lg-4 control-label">Agregar foto</label>
            <div class="col-lg-4">
              <input type="file" name="txtFoto" id="txtFoto" class="agregarFoto">
              <p class="help-block">Peso máximo de la foto 2 MB...
              <div id="errorFoto" class="errorValidar"></div>
              </p>
              <img src="vistas/img/CINEMA.png" class="img-thumbnail previsualizar" width="100px">
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" name="submitUsuario" class="btn btn-info pull-right">Crear usuario</button>
            <button type="button" name="buttonCancel" class="btn btn-info"
              onclick="location.href='usuarios'">Cancelar</button>
          </div>

        </div> <!-- /box-body -->

        <?php
        if (isset($_POST["submitUsuario"])) {
          require_once "controladores/usuarios.controlador.php";
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario->ctrCrearUsuario();
        }
        ?>

      </form>
    </div> <!-- /box -->

  </section>
</div>