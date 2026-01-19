<?php 

class ModeloUsuarios{

    public function login(){
        
		$arrTodos = null;
		$c 		  = 0;
		$sql = "SELECT * FROM usuarios WHERE correo = :correo  AND password = :password";

		try{
	        
			$stmt = null;
			$datos = null;
            $stmt =  $this->conn->prepare($sql);
            $correo = $this->correo;
            $password = $this->password;
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            
			while( $datos = $stmt->fetch() ){
				$oUsuario = new ModeloUsuarios(); 
                $oUsuario->idusuario = $datos[0];
                $oUsuario->nombre   = $datos[1];
                $oUsuario->correo = $datos[2];
				$oUsuario->password = $datos[3];
				$oUsuario->perfil = $datos[4]; 
                $oUsuario->foto = $datos[5];
                $oUsuario->estado = $datos[6];
                $oUsuario->login = $datos[7];
                $oUsuario->fecha = $datos[8];
               
				$arrTodos[$c] = $oUsuario;
				$c = $c + 1;
			}
			
		}catch(Exception $e){
			
		}
		return $arrTodos;       
    }

    public function crearUsuario(){

        $registro = 0;
        $query = "INSERT INTO usuarios (nombre, correo, password, perfil, estado, foto) 
                  VALUES (:nombre, :correo, :password, :perfil, :status, :foto);";

        try{
          
          $stmt = null;
          $stmt =  $this->conn->prepare($query);
          $nombre = $this->nombre;
          $correo = $this->correo;
          $password = $this->password;
          $perfil = $this->perfil;
          $status = $this->status;
          $foto = $this->foto;
          
          $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
          $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
          $stmt->bindParam(':password', $password, PDO::PARAM_STR);
          $stmt->bindParam(':perfil', $perfil, PDO::PARAM_STR);
          $stmt->bindParam(':status', $status, PDO::PARAM_INT);
          $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
          
          $registro = $stmt->execute();

      }catch(Exception $e){
          
        echo $e->getMessage();
  
      }

      return $registro;        
    }

    public function buscarUsuarios(){
        
        $arrTodos = null;
		$c 		  = 0;
        $sql = "SELECT * FROM usuarios";

		try{
	       
			$stmt = null;
			$datos = null;
            $stmt =  $this->conn->prepare($sql);
           
            $stmt->execute();
            
			while( $datos = $stmt->fetch() ){
                $oUsuario = new ModeloUsuarios();
                $oUsuario->idusuario = $datos[0];
                $oUsuario->nombre = $datos[1];
                $oUsuario->correo = $datos[2];
                $oUsuario->perfil = $datos[4];
                $oUsuario->status = $datos[5];
                $oUsuario->foto = $datos[6];
                $oUsuario->login = $datos[7];
                $oUsuario->fecha = $datos[8];
                
                $arrTodos[$c] = $oUsuario;
				$c = $c + 1;
			}
			
		}catch(Exception $e){
			
		}
		return $arrTodos;       

    }

    public function buscarUsuario(){
        
        $arrTodos = null;
		$c = 0;
        $sql = "SELECT * FROM usuarios WHERE idusuario = :idusuario ";

		try{
	       
			$stmt = null;
			$datos = null;
            $stmt =  $this->conn->prepare($sql);
            $idusuario = $this->idusuario;
            $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
           
            $stmt->execute();
            
			while( $datos = $stmt->fetch() ){
                
                $this->idusuario = $datos[0];     //THIS cuando se busque un solo registro...
                $this->nombre = $datos[1];
                $this->correo = $datos[2];
                $this->password = $datos[3];
                $this->perfil = $datos[4];
                $this->status = $datos[5];
                $this->foto = $datos[6];
                $this->login = $datos[7];
                $this->fecha = $datos[8];
            
			}
			
		}catch(Exception $e){
			
		}
		return $arrTodos;       

    }

    public function mdlBuscarCorreo(){
            
        $bol = false;
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";

        try{
	       
			$stmt = null;
            $stmt =  $this->conn->prepare($sql);
            $correo = $this->correo;
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);

            $stmt->execute();
            while ($datos = $stmt->fetch()) {       // CUANDO ES UN SELECT TIENES QUE UTILIZAR EL WHILE
                $bol = true;
            }

		}catch(Exception $e){
			//echo $e->getMessage();      //???
		}
	
        return $bol;
    }

    public function editarUsuario(){

        $rA = 0;
        $query = "UPDATE usuarios set nombre =:nombre, correo = :correo, perfil = :perfil, estado = :status, foto = :foto  
                   WHERE idusuario = :idusuario";

        try{
          $stmt = null;
          $datos = null;
          $stmt =  $this->conn->prepare($query);
  
          $idusuario = $this->idusuario;
          $nombre = $this->nombre;
          $correo = $this->correo;
          $perfil = $this->perfil;
          $status = $this->status;
          $foto = $this->foto;
          
          
          $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
           
          $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
          
          $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
          $stmt->bindParam(':perfil', $perfil, PDO::PARAM_STR);
          $stmt->bindParam(':status', $status, PDO::PARAM_INT);
          $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
          
          $rA = $stmt->execute();

      }catch(Exception $e){
          
        echo $e->getMessage();
  
      }

      return $rA;        
    }



    public $db;
    public $response;
    public $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/Dbconnect.php';
            // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

}