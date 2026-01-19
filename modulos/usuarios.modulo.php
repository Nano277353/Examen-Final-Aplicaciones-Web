<?php
    class ModeloUsuarios{
        public function login(){
            $arrTodos = null;
            $c        = 0;
            $sql = "SELECT * FROM usuarios WHERE correo = :correo AND password = :password";
            try{
                $stmt = null;
                $datos = null;
                $stmt = $this->conn->prepare($sql);
                $correo = $this->correo;
                $password = $this->password;
                $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
                $stmt->bindParam(':password',$password, PDO::PARAM_STR);
                $stmt->execute();
                while ($datos = $stmt->fetch () ){
                    $oUsuario = new ModeloUsuario();
                    $oUsuario->idusuario = $datos[0];
                    $oUsuario->nombre = $datos[1];
                    $oUsuario->correo = $datos[2];
                    $oUsuario->password = $datos[3];
                    $oUsuario->perfil = $datos[4];
                    $oUsuario->foto = $datos[5];
                    $oUsuario->estado = $datos[6];
                    $oUsuario->login = $datos[7];
                    $oUsuario->fecha = $datos[8];
                    $arrTodos[$c] = $oUsuario;
                    $c = $c +1;
                }
            }catch(Exception $e) {
            }
            return $arrTodos;
        }
        public $db;
        public $response;
        public $conn;
        function __construct() {
            require_once dirname(__FILE__) . '/Dbconnect.php';
            $db = new DbConnect();
            $this->conn = $db->connect ();
        }
    }
?>