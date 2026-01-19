<?php 

class AjaxUsuarios{

	//VALIDAR CORREO
	public $validarCorreo;

	public function ajaxValidarCorreo(){

		require_once "../modelos/usuarios.modelo.php";
		
		$validarCorreo = $this->validarCorreo;
		$bolAux = false;
		
		$respuesta = new ModeloUsuarios();
        $respuesta->correo = $validarCorreo;
		$bolAux = $respuesta->mdlBuscarCorreo();
		
		if($bolAux == true){
			echo "1";
		}else{
			echo "0";
		}
	}
}	//class AjaxUsuarios{
	
//CONTRUCTORES ???

if(isset($_POST["validarCorreo"]))
{
    $validarCorreo = new AjaxUsuarios();
    $validarCorreo -> validarCorreo = $_POST["validarCorreo"];
    $validarCorreo -> ajaxValidarCorreo();
}
