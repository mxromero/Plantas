<?php 

//require_once("..\Produccion\ws_cl_servicio_crud.php");
require_once($_SESSION['pathCrud']);
/**
 * 
 */

class UPDATE{

		private $crud;
		private $nombreTabla;
		private $condUp;
		private $cantidadUP;  //CANTIDAD
		private $fechaUP;		
		private $horaUP;
		private $expor_sapUP;
		private $post;

		
		function set_npost($ax){		// nombre de la tabla
			$this->post = $ax;
		}
		function get_npost(){
			return $this->post;
		}

		function set_nTabla($ax){		// nombre de la tabla
			$this->nombreTabla = $ax;
		}
		function get_nTabla(){
			return $this->nombreTabla;
		}

		function set_condUp($ax){		//Condicion Update
			$this->condUp= $ax;
		}
		function get_condUp(){
			return $this->condUp;
		}

		function set_cantUp($ax1){			//Cantidad
			$this->$cantidadUP= $ax1;
		}
		function get_cantUp(){
			return $this->$cantidadUP;
		}
				
		function set_fecUp($ax2){		 	//Fecha
			$this->$fechaUP= $ax2;
		}
		function get_fecUp(){
			return $this->$fechaUP;
		}
				
		function set_hrsUp($ax3){			//Hora
			$this->$horaUP= $ax3;
		}
		function get_hrsUp(){
			return $this->$horaUP;
		}
				
		function set_expUp($ax4){			//ExpSap
			$this->$expor_sapUP= $ax4;
		}
		function get_expUp(){
			return $this->$expor_sapUP;
		}


	
	function __construct()
	{
		$this->crud = new CRUD();
		$this->crud->Conexion(UNP,UPP,S,DB);
	}



	function funcionPost(){



		$data= $this->get_npost();
		//(str_replace(":","",($_POST['uhora'])));
		/*$this->set_cantUp($data['ucantidad']);
		$this->set_expUp($data['uexpsap']);
		$this->set_fecUp($data['ufecha']);
		$this->set_hrsUp($data['uhora']);
		print_r($data);

		echo $this->get_cantUp()."</br>";
			*/



		$condicion = " uma = '".  $this->get_condUp() ."'";

		$campos =" cantidad = '".$data['ucantidad']."', 
					   Exp_sap = '".$data['uexpsap']."',
					   fecha = '". $data['ufecha']."',
					   hora = '" .$data['uhora']."'";

		$crud = new MODUMAS();

			$resp = $this->crud->Update($this->get_ntabla(),$campos, $condicion);//está modificando datos sin validar :/ 

	}

}




 ?>