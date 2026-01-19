<div class="content-wrapper">   <!-- Content Wrapper. Contains page content -->
  <section class="content-header">    <!-- Content Header (Page header) -->
    <h1>
      Miembros <small>Bienvenidos Cinéfilos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio">/ &nbsp; Inicio</a></li>
      <li>Meimbros</li>
    </ol>
  </section>
  <section class="content">   <!-- Main content -->
    <div class="box">     <!-- Default box -->
      <div class="box-header with-border">
        <a href="crear-usuario">
          <button class="btn btn-primary">
            Inscribir nuevo miembro a CineClub
          </button>
        </a>
      </div>  <!-- /.box-header -->
      
      <div class="box-body" id="tblUsuarios">   
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">  <!-- tablas en class ??? -->
          <thead>
            <tr>
              <th style="width:7px">#</th>
              <th style="width:150px">Nombre</th>
              <th style="width:150px">Correo</th>
              <th style="width:70px">Perfil</th>
              <th style="width:50px">Status</th>
              <th style="width:30px">Foto</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php

              include_once("vistas/modulos/usuarios.modelo.php");
              $oUsuario = new ModeloUsuarios(); //Objeto
              $arrUsuarios = null; //Arreglo de Usuarios
              $arrUsuarios = $oUsuario->buscarUsuarios();

              if($arrUsuarios == null){
                echo "No hay usuarios en el sistema";
              }else{
                $i = 1;
                foreach($arrUsuarios as $usuario){

            ?>
            
          <tr>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $usuario->nombre;?>
            </td>
            <td>
              <?php echo $usuario->correo;?>
            </td>
            <td>
              <?php echo $usuario->perfil;?>
            </td>
            <td>
              <?php echo $usuario->status;?>
            </td>
            <td style="text-align: center"> 
              <img src="<?php echo $usuario->foto; ?>" class=""  width="30px">    <!-- img-thumbnail -->
            </td>          
            <td>
              <div class="btn-group">
                <button class="btn btn-warning btnEditarUsuario" idusuario="">
                <i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btnEliminarUsuario" idusuario="">
                <i class="fa fa-times"></i></button>
              </div> 
            </td>
          </tr>
            
            <?php
                $i = $i +1;
                  }
              }
            ?>

          </tbody>
        </table>

        </div>  <!-- /.box-body -->
    </div>    <!-- /.box -->
  </section>     <!-- /section content -->
</div>   <!-- /.content-wrapper -->