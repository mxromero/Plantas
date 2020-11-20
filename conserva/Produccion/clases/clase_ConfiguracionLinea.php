<?php 
require_once("./ws_cl_servicio_crud.php");
class CALIDADLINEA
{

		private $crud;
		private $nombreTabla;

		function set_nTabla($ax){
			$this->nombreTabla = $ax;
		}
		function get_nTabla(){
			return $this->nombreTabla;
		}


	
	function __construct()
	{
		$this->crud = new CRUD();
		$this->crud->Conexion(UNP,UPP,S,DB);

	}


	function crearTablaConfiguracionLinea(){
		$row = null;

		$row 		 = $this->crud->Select_datos4($this->get_ntabla());
		
		sort($row);
		$html="";
		
		/*LA FUNCIÓN WORDWRAP() LA DEJÉ EN 50 PARA ORDENAR LA VISTA MIENTRAS TANTO*/	
		$rows = null;
		
		for($x=0;$x<count($row);$x++){
			$html.= "<tr>";
				$html.= "<td><input type= 'hidden' id= 'paletizadora_".$x."' value='".$row[$x]['paletizadora']."'/>".$row[$x]['paletizadora']."</td>";
				$html.= "<td><input type= 'hidden' id= 'ordprev_".$x."' value='".$row[$x]['NOrdPrev']."'/>".$row[$x]['NOrdPrev']."</td>";
				$html.= "<td>".$row[$x]['fecha']."</td>";
				$html.= "<td>".$row[$x]['VersionF']."</td>";
				$html.= "<td>".$row[$x]['centro']."</td>";
				$html.= "<td>".$row[$x]['almacen']."</td>";
				$html.= "<td>".$row[$x]['material_orden']."</td>";


				//BOTONES

				$html.= "<td><button type='button' id='btnOrPrev_' OnClick='procesa(paletizadora_".$x."),procesa2(".$x.")' data-toggle='modal' data-target='#exampleModal'><ion-icon name='create-outline'></ion-icon></button></td>";
				$html.= "<td><div class='form-check'><input class='form-check-input' type='radio' name='radio1' checked='checked' onclick='mostrarDetalle()'><label class='form-check-label'>Radio</label>
                        </div></td>";

				//id='btnOrPrev_".$x."'
		}
		$html.=  "</tr>";	

		echo $html;
	}

	function ImpdatosWS(){
		
	}

	function UpdteLinea(){

		$data= $this->get_npost();
		$condicion = " variable = '".  $this->get_condUp() ."'";

		$campos =" variable = '".$data['']."', 
				   variable = '".$data['']."',
				   variable = '".$data['']."',
				   variable = '".$data['']."'";

		$crud = new CALIDADLINEA();

			$resp = $this->crud->UPDATE($this->get_ntabla(),$campos, $condicion);//está modificando datos sin validar :/ 

	}

}


?>