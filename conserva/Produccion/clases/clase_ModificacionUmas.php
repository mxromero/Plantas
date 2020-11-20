<?php 
//session_start();
//ini_set('memory_limit', '128M');
error_reporting(E_ERROR | E_WARNING | E_PARSE);


require_once($_SESSION['pathCrud']);

class MODUMAS
{

		private $crud;
		private $nombreTabla;
		private $ModUma;
		private $condicionUma; //WHERE



		Public $Post;

		function set_post($post){
			$this->Post = $post;
		}
		function get_post(){
			return $this->Post;
		}

		function set_nTabla($ax){		// nombre de la tabla
			$this->nombreTabla = $ax;
		}
		function get_nTabla(){
			return $this->nombreTabla;
		}

		function set_nUma($ax){			//Selecciono La Uma para construir la tabla
			$this->ModUma= $ax;
		}
		function get_nUma(){
			return $this->ModUma;
		}

		function set_condicion($ax){			//Condicion Select para la modal
			$this->ModUma= $ax;
		}
		function get_condicion(){
			return $this->ModUma;
		}



	function __construct()
	{
		$this->crud = new CRUD();
		$this->crud->Conexion(UNP,UPP,S,DB);
	}

	function FormatoFecha($var)//Convertir el formato de Datetime
	{
		$date = new DateTime($var);
		return $date->format('d-m-Y');
	}

	function FormatoHora($varH)//Convertir el formato de Datetime
	{
		$hrs = new DateTime($varH);
		return $hrs->format('G:i');
	}

	function CerosInicialesUma($cadena)//Quita los Ceros iniciales
	{
		return preg_replace('/^0+/', '', $cadena);
	}

	function ExpSap_Pintar($auxiliar)//Funcion para pintar la tabla
	{	
		$retorno = (trim($auxiliar) == "X")?" style='background-color: #d8fde1'":" style='background-color: #ffbebe';";
		return $retorno;
	}


	function crearTablaModificacionUmas(){
		$row = null;

		$row 		 = $this->crud->Select_datos3($this->get_ntabla());
		
		//sort($row);
		$html="";
		
		/*LA FUNCIÓN WORDWRAP() LA DEJÉ EN 50 PARA ORDENAR LA VISTA MIENTRAS TANTO*/	
		$rows = null;
		
		for($x=0;$x<count($row);$x++){
					$clase=$this->ExpSap_Pintar($row[$x]['Exp_sap']);

			$html.= "<tr $clase>";
				$html.= "<td> <input type= 'hidden' id= 'umaUpdate_".$x."' value='".$row[$x]['uma']."'/>".$this->CerosInicialesUma($row[$x]['uma'])."</td>";//
				$html.= "<td>".$row[$x]['n_doc']."</td>";//
				$html.= "<td>".$row[$x]['VersionF']."</td>";//
				$html.= "<td>".$row[$x]['NOrdPrev']."</td>";//
				$html.= "<td>".$row[$x]['material']."</td>";//
				$html.= "<td>".$row[$x]['lote']."</td>";//
				$html.= "<td>".$row[$x]['cantidad']."</td>";//
				$html.= "<td>".$this->FormatoFecha($row[$x]['fecha'])."</td>";//
				$html.= "<td>".$this->FormatoHora($row[$x]['hora'])."</td>";//
				$html.= "<td>".$row[$x]['paletizadora']."</td>";//
				$html.= "<td>".$row[$x]['Exp_sap']."</td>";//
				$html.= "<td>".$row[$x]['li_mb']."</td>";//
				$html.= "<td>".$row[$x]['li_fq']."</td>";//


				//BOTONES

				$html.= "<td><ion-icon name='print-outline'></ion-icon><button type='button' id='btnUma_".$x."' OnClick='procesa(umaUpdate_".$x.")'  data-toggle='modal' data-target='#exampleModal'><ion-icon name='create-outline'></ion-icon></button><a href='acciones/delete.php?uma=<?php echo $row[$x]['uma']?'>Eliminar</a><ion-icon name='trash-outline'></ion-icon><ion-icon name='help-circle-outline'></ion-icon></td>";

				
		}
		$html.=  "</tr>";	

		echo $html;
	}//Fin de la funcion crearTablaModificacionUmas



	//Select a la tabla
	function CrearModal(){
		$row = null;

		//$valueUma= '00000002111633120078';

		$condicion = " uma = '".  $this->get_condicion() ."'";//uma

		$row 		 = $this->crud->Select_datos2($this->get_ntabla(), $condicion);
		//$row 		 = $this->crud->Select_datos2($this->get_ntabla(), $condicion);Esta es la consulta que debiera funcionar
		
		//sort($row);
		$html="";
			
		$rows = null;
					/*
					echo "<pre>";
						print_r($row);
					echo "</pre>";*/
		for($x=0;$x<count($row);$x++){ 

		$html.= "<tbody>";
		 $html.= "<tr><td>Palet	<td><input type= 'text' name='' value='".$row[$x]['paletizadora'].		"'class='form-control' readonly></td></tr><tr>";
		 $html.= "<td>Uma<td>		<input type= 'text' name='' value='".$row[$x]['uma'].				"'class='form-control' readonly></td></tr><tr>";
		 $html.= "<td>VFab<td>		<input type= 'text' name='' value='".$row[$x]['VersionF'].			"'class='form-control' readonly></td></tr><tr>";
		 $html.= "<td>OP<td>		<input type= 'text' name='' value='".$row[$x]['NOrdPrev'].			"'class='form-control' readonly></td></tr><tr>";
		 $html.= "<td>Material<td>	<input type= 'text' name='' value='".$row[$x]['material'].			"'class='form-control' readonly></td></tr><tr>";
		 $html.= "<td>Lote<td>		<input type= 'text' name='' value='".$row[$x]['lote'].				"'class='form-control' readonly></td></tr><tr>";
		 $html.= "<td>Cantidad<td>	<input type= 'text' name='ucantidad' value='".$row[$x]['cantidad'].	"'class='form-control'></td></tr><tr>";
		 $html.= "<td>Fecha<td><input type= 'text' name='' value='"."Original:   ".$this->FormatoFecha($row[$x]['fecha'])."'class='form-control' readonly>
		 							<input type= 'text' name='ufecha' 	 value='".date('Y-m-d')."' class='form-control'></td></tr><tr>";
		 $html.= "<td>Hora<td>		<input type= 'time' name='uhora' value='".$this->FormatoHora($row[$x]['hora']).	"'class='form-control'></td></tr><tr>";
		 $html.= "<td>ExpSap<td>	<input type= 'text' name='uexpsap' value='".$row[$x]['Exp_sap'].					"'class='form-control'></td></tr>";
	
		}
		$html.=  "</tbody>";	

		echo $html;
		
	}



}
?>