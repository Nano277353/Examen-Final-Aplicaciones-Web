<?php

    class ControladorUsuarios
    {
        public function ctrLogin()
        {
            include_once("vistas/modulos/usuarios.modelo.php");
            $usuario = new ModeloUsuarios();
            $usuario->correo = $_POST["txtCorreo"];
            $password = crypt($_POST["txtPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $usuario->password = $password;
            $arrUsuario = $usuario->login();
    
            if ($arrUsuario != null) {
                
                foreach ($arrUsuario as $user) {
                    $idusuario = $user->idusuario;
                    $nombre = $user->nombre;
                    $correo = $user->correo;
                    $perfil = $user ->perfil;
                    $foto = $user->foto;
                    $estado = $user->estado;
                    $c = $c + 1;
                }

                $_SESSION["idusuario"] = $idusuario;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["correo"] = $correo;
                $_SESSION["perfil"] = $perfil;
                $_SESSION["foto"] = $foto;
                $_SESSION["estado"] = $estado;
                
                $_SESSION["iniciarSesion"] = "ok";
                
                echo '<script>window.location = "inicio";</script>';

            } else {
                
                echo '<br><div class="alert alert-danger">Error al ingresar, datos no coinciden. Favor de intentar de nuevo...</div>';
            }
        }

        public function ctrCrearUsuario()
        {
                
            include_once("vistas/modulos/usuarios.modelo.php");       
            $usuario = new ModeloUsuarios();                   
            $usuario->nombre = trim($_POST['txtNombre']);
            $usuario->correo = trim($_POST['txtCorreo']);       //admin@mail.com
            $nombreCorreo = explode("@", $usuario->correo);
            $nombreCorreo = $nombreCorreo[0];
            $password = crypt($nombreCorreo, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $usuario->password = $password;
            $usuario->perfil = $_POST["cmbPerfil"];
            $usuario->status = $_POST['cmbStatus'];

            $foto = $_FILES['txtFoto'];
            $directorio = "vistas/img/".$nombreCorreo."/";
            $ruta = "";
    
            if ($foto["name"] == "") {
                $ruta = $directorio."anonymous.png";
            } else {
                if ($foto["type"] == "image/jpeg") {
                    $ruta = $directorio.$nombreCorreo.".jpg";
                } elseif ($foto["type"] == "image/png") {
                    $ruta = $directorio.$nombreCorreo.".png";
                }
            }
    
            $usuario->foto = $ruta;

            if ($usuario->crearUsuario() == 1) {    //Manda llamar al método o función y válida...
    
                mkdir($directorio, 0755);
                
                if ($foto["name"] <> "") {
                    //OJO Falta validar el tamaño del archivo...
                    //Guardar foto en carpeta de Cliente...
                    list($ancho, $alto) = getimagesize($foto["tmp_name"]);
                    $nuevoAncho = 350;
                    $nuevoAlto = 350;
    
                    if ($foto["type"] == "image/jpeg") {
                        $ruta = $directorio.$nombreCorreo.".jpg";
                        $origen = imagecreatefromjpeg($foto["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                        imagejpeg($destino, $ruta);
                    }
    
                    if ($foto["type"] == "image/png") {
                        $ruta = $directorio.$nombreCorreo.".png";
                        $origen = imagecreatefrompng($foto["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                        imagepng($destino, $ruta);
                    }
                
                }else{

                    //Falta subir anonymous.png

                }

                //Mensaje de registrado...
                echo '<script>

                    swal({

                        type: "success",
                        text: "El usuario se ha registrado correctamente...",
                        showConfirmButton: true,
                        confirmButtonText: "Continuar",
                        width: "350px",
                        height: "250px"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "usuarios";

                        }

                    });
                
                    </script>';
                    
            } else {
            
            //Mensaje de registrado...
                echo "<script>window.alert('Error el usuario NO se ha registrado correctamente...')</script>";
                echo "<script>window.location = 'usuarios' </script>";
            }
                
            
        }   //Método crearUsuario


        public function ctrEditarUsuario()
        {
            
            $correoActual = trim($_POST['txtCorreoActual']);       
            $fotoActual = $_POST['txtFotoActual'];
            $nombreFotoActual = explode("/", $fotoActual);
            $nombreFotoActual = end($nombreFotoActual);

            include_once("vistas/modulos/usuarios.modelo.php");       
            $usuario = new ModeloUsuarios();
            $usuario->idusuario = $_POST['txtIdUsuario'];       //Campo oculto...  
            $usuario->nombre = trim($_POST['txtNombre']);
            $usuario->correo = trim($_POST['txtCorreo']);       //admin@mail.com
            $nombreCorreo = explode("@", $usuario->correo);
            $nombreCorreo = $nombreCorreo[0];
            $password = crypt($nombreCorreo, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $usuario->password = $password;
            $usuario->perfil = $_POST["cmbPerfil"];
            $usuario->status = $_POST['cmbStatus'];

            $foto = $_FILES['txtFoto'];
            $directorio = "vistas/img/".$nombreCorreo."/";
            $ruta = ""; 

            if ($foto["name"] == "") {
                $ruta = $directorio.$nombreFotoActual;
            } else {
                if ($foto["type"] == "image/jpeg") {
                    $ruta = $directorio.$nombreCorreo.".jpg";
                } elseif ($foto["type"] == "image/png") {
                    $ruta = $directorio.$nombreCorreo.".png";
                }
            }
    
            $usuario->foto = $ruta;

            if ($usuario->editarUsuario() == 1) {    //Manda llamar al método o función y válida...
    
               if ($correoActual <> $usuario->correo) {
                   mkdir($directorio, 0755);
               }
                if ($foto["name"] <> "") {
                    //OJO Falta validar el tamaño del archivo...
                    //Guardar foto en carpeta de Cliente...
                    list($ancho, $alto) = getimagesize($foto["tmp_name"]);
                    $nuevoAncho = 350;
                    $nuevoAlto = 350;
    
                    if ($foto["type"] == "image/jpeg") {
                        $ruta = $directorio.$nombreCorreo.".jpg";
                        $origen = imagecreatefromjpeg($foto["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                        imagejpeg($destino, $ruta);
                    }
    
                    if ($foto["type"] == "image/png") {
                        $ruta = $directorio.$nombreCorreo.".png";
                        $origen = imagecreatefrompng($foto["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                        imagepng($destino, $ruta);
                    }
                
                }else{

                    //Falta subir anonymous.png

                }

                //Mensaje de registrado...
                echo '<script>

                    swal({

                        type: "success",
                        text: "El usuario se ha editado correctamente...",
                        showConfirmButton: true,
                        confirmButtonText: "Continuar",
                        width: "350px",
                        height: "250px"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "usuarios";

                        }

                    });
                
                    </script>';
                    
            } else {
            
            //Mensaje de registrado...
                echo "<script>window.alert('Error el usuario NO se ha editado correctamente...')</script>";
                echo "<script>window.location = 'usuarios' </script>";
            }
                
            
        }   //Método editarUsuario


    }

?>