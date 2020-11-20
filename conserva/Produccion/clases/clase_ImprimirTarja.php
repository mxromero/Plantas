<?php 
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once($_SESSION['pathCrud']);
/**
 * 
 */
class Imprimir
{


	private $crud;
	private $palet;
	private $fecha;
	private $hora;
	private $cant;
	private $nomTabla;
	private $condicion;


	private $ipaletizadora_;		
	private $iuma_;
	private $iexprt2_;
	private $ilote_;
	private $ifecha_;
	private $ihora_;
	private $icantidad_;
	private $iexprt1_;
	private $idescripcion_;


	function set_tabla($ax){			//tabla
		$this->nomTabla = $ax;
	}
	function get_tabla(){
		return $this->nomTabla;
	}

	function set_cond($ax){			//Cond
		$this->condicion = $ax;
	}
	function get_cond(){
		return $this->condicion;
	}

	function set_ipalet($ax){			//palet
		$this->palet = $post;
	}
	function get_ipalet(){
		return $this->palet;
	}

	function set_ifecha($ax){			//fecha
		$this->fecha = $post;
	}
	function get_ifecha(){
		return $this->fecha;
	}

	function set_ihora($ax){			//hora
		$this->hora = $post;
	}
	function get_ihora(){
		return $this->hora;
	}

	function set_icant($ax){			//cant
		$this->cant = $post;
	}
	function get_ican(){
		return $this->cant;
	}

	//Acá empiezo a traer datos de la vista vw_tarja_muestra_calidad

	function set_ipaletizadora($ax){			//datos de paletizadora
		$this->ipaletizadora_ = $ax;
	}
	function get_ipaletizadora(){
		return $this->ipaletizadora_;
	}

	function set_iuma($ax){						//datos de uma
		$this->iuma_ = $ax;
	}
	function get_iuma(){
		return $this->iuma_;
	}

	function set_iexprt2($ax){					//datos de exportacion2
		$this->iexprt2_ = $ax;
	}
	function get_iexprt2(){
		return $this->iexprt2_;
	}

	function set_ilote($ax){					//datos de lotes
		$this->ilote_ = $ax;
	}
	function get_ilote(){
		return $this->ilote_;
	}

	function set_ifecha_($ax){					//datos de fecha
		$this->ifecha_ = $ax;
	}
	function get_ifecha_(){
		return $this->ifecha_;
	}

	function set_ihora_($ax){					//datos de hora
		$this->ihora_ = $ax;
	}
	function get_ihora_(){
		return $this->ihora_;
	}

	function set_icantidad($ax){				//datos de cantidad
		$this->icantidad_ = $ax;
	}
	function get_icantidad(){
		return $this->icantidad_;
	}

	function set_iexprt1($ax){					//datos de exportacion1
		$this->iexprt1_ = $ax;
	}
	function get_iexprt1(){
		return $this->iexprt1_;
	}

	function set_idescripcion($ax){				//datos de exportacion1
		$this->idescripcion_ = $ax;
	}
	function get_idescripcion(){
		return $this->idescripcion_;
	}


	
	function __construct()				//CONSTRUCTOR
	{
		$this->crud = new CRUD();
		$this->crud->Conexion(UNP,UPP,S,DB);
	}

	

	function selectImprimirTarjaCalidad(){
		$row = null;


		$palet = $this->get_ipalet();
		$fecha = $this->get_ifecha();
		$hora = $this->get_ihora();

		$condicion= ' paletizadora='.$palet.' and fecha ='.$fecha.' and hora>'.$hora.' order by paletizadora ,fecha,hora';

		$row 		 = $this->crud->Select_datos2($this->get_ntabla(), $condicion);
		
		
		$rows = null;
		
		//seteo todo lo que encuentra en la consulta a la tabla
		for($x=0;$x<count($row);$x++){
					$this->set_ipaletizadora($row[$x]['paletizadora']) ;
					$this->set_iuma($row[$x]['uma']);
					$this->set_iexprt2($row[$x]['Expr2']);
					$this->set_ilote($row[$x]['lote']);
					$this->set_ifecha_($row[$x]['fecha']);
					$this->set_ihora_($row[$x]['hora']);
					$this->set_icantidad($row[$x]['cantidad']);
					$this->set_iexprt1($row[$x]['Expr1']);
					$this->set_idescripcion($row[$x]['Descripcion']);
		}
		
	}

	function selectImprimirTarja_PRD()
	{
		
	}

	
	function fn_limpiarDatos(){
		$uma_auxiliar = preg_replace('/^0+/','',$uma);
		$uma1 = substr($uma_auxiliar,0, 12);
		$uma2 = substr($uma_auxiliar,-1, 1);
		//---------------------------------------
		$nueva_hora = explode(":",$Hora_2);
		$Hora_ax = $nueva_hora[0] . ":" . $nueva_hora[1];
	}



		//2110006501412 uma de prueba
		//código zpl 2
	function CreacionTarjaCalidad(){//Tarja Calidad Muestras

		$print_data="^XA~TA0~JSO^LT0^MMT^MNW^MTT^PON^PMN^LH0,0^JMA^PR2,2^MD0^JUS^LRN^CI0^XZ";
		$print_data.="^XA^LL0799";
		$print_data.="^PW799";
		$print_data.="^FO,73^FS";
		$print_data.="^FT27,65^A0N,58,67^FH\^FDAconcagua Foods^FS";
		$print_data.="^FO,38^FS";
		$print_data.="^FT28,109^A0N,31,31^FH\^FDMuestras Calidad^FS";
		$print_data.="^FO15,446^GB766,0,3^FS";
		$print_data.="^FO19,119^GB766,0,4^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT504,374^A0N,37,38^FH\^FDUMA^FS";
		$print_data.="^FO,52^FS";
		$print_data.="^FT502,432^A0N,42,43^FH\^FD".$uma_auxiliar."^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT278,374^A0N,37,38^FH\^FDLote^FS";
		$print_data.="^FO,52^FS";
		$print_data.="^FT272,432^A0N,42,43^FH\^FD".$this->get_ilote()."^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT23,374^A0N,37,38^FH\^FDCodigo^FS";
		$print_data.="^FO,52^FS";
		$print_data.="^FT21,432^A0N,42,43^FH\^FD".$this->get_imaterial()."^FS";
		$print_data.="^FO,52^FS";
		$print_data.="^FT678,319^A0N,42,43^FH\^FD".$this->c."^FS";
		$print_data.="^FO,53^FS";
		$print_data.="^FT527,316^A0N,42,43^FH\^FD".$ipalet_."^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT502,261^A0N,37,38^FH\^FDPalet^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT326,261^A0N,37,38^FH\^FDHora^FS";
		$print_data.="^FO,53^FS";
		$print_data.="^FT314,316^A0N,42,43^FH\^FD".$ihora_."^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT28,261^A0N,37,38^FH\^FDFecha^FS";
		$print_data.="^FO,53^FS";
		$print_data.="^FT26,316^A0N,42,43^FH\^FD".$ifecha_."^FS";
		$print_data.="^FO,46^FS";
		$print_data.="^FT28,162^A0N,37,38^FH\^FDProducto^FS";
		$print_data.="^FO,52^FS";
		$print_data.="^FT26,204^A0N,42,43^FH\^FD".$this->get_idescripcion()."^FS";
		$print_data.="^BY4,3,171^FT154,632^BCN,,Y,N";
		$print_data .= "^FD>;" . $uma1 . ">6" . $uma2 . "^FS";
		$print_data.="^PQ".$icant_.",0,1,Y^XZ";
	}

	function CreacionTarjaPRD_Conserva(){
		
		$print_data.="^XA~TA000~JSN^LT0^MNW^MTT^PON^PMN^LH0,0^JMA^PR2,2~SD20^JUS^LRN^CI0^XZ";
	    $print_data.= "^XA";
		$print_data.= "^MMT";
		$print_data.= "^PW790";
		$print_data.= "^LL0890";
		$print_data.= "^LS0";
		$print_data.= "^FT80,70^A0N,34,33^FH\^FDAconcagua Foods^FS";
		$print_data.= "^FT80,94^A0N,20,19^FH\^FDProduccion Conserva^FS";
		$print_data.= "^FO0,100^GB795,0,2^FS";
		$print_data.= "^FT80,139^A0N,28,28^FH\^FDProducto^FS";
		$print_data.= "^FT80,172^A0N,25,28^FH\^FD" & descripcion & "^FS";
		$print_data.= "^FT80,216^A0N,28,28^FH\^FDFecha^FS";
		$print_data.= "^FT80,251^A0N,25,24^FH\^FD" & fecha & "^FS";
		$print_data.= "^FT407,216^A0N,28,28^FH\^FDHora^FS";
		$print_data.= "^FT406,251^A0N,25,24^FH\^FD" & hora & "^FS";
		$print_data.= "^FT80,293^A0N,28,28^FH\^FDCodigo^FS";
		$print_data.= "^FT80,327^A0N,25,24^FH\^FD" & material & "^FS";
		$print_data.= "^FT405,293^A0N,28,28^FH\^FDCantidad^FS";
		$print_data.= "^FT406,327^A0N,25,24^FH\^FD" & cantidad & "^FS";
		$print_data.= "^FT80,366^A0N,28,28^FH\^FDLote^FS";
		$print_data.= "^FT80,400^A0N,25,24^FH\^FD" & lote & "^FS";
		$print_data.= "^FT659,70^A0N,28,28^FH\^FDR^FS";
		$print_data.= "^FT406,366^A0N,28,28^FH\^FDPallet^FS";
		$print_data.= "^FT407,400^A0N,25,24^FH\^FD" & paletizadora & "^FS";
		$print_data.= "^FT80,439^A0N,28,28^FH\^FDUMA^FS";
		$print_data.= "^FT80,477^A0N,28,28^FH\^" & CDbl(uma) & "^FS";
		$print_data.= "^BY5,3,238^FT102,714^BCN,,Y,N";
		$print_data.= "^FD>;" & Mid(CStr(CDbl(uma)), 1, 12) & ">6" & Mid(CStr(CDbl(uma)), 13, 1) & ">6^FS";
		$print_data.= "^PQ1,0,1,Y^XZ";

	}



		function imprimeTarja($value=''){
			try { 

			if($Cabezal == "P"){
				$IpImpresora = (string)$ImpresoraP;
			}else{
				$IpImpresora = (string)$ImpresoraAB;
			}

			$fp=fsockopen($IpImpresora,(int)$Puerto); 

			fputs($fp,$print_data); 

			fclose($fp);  

			

			} catch (Exception $e){ 

					Generar_Log_imp($e->getMessage());
					
			}
		}


		function checkPuerto($dominio,$puerto){
			
		    $starttime = microtime(true);
		    $file      = @fsockopen ($dominio, $puerto, $errno, $errstr, 10);
		    $stoptime  = microtime(true);
		    $status    = 0;
		  
		    if (!$file){    
		        $status = -1;  // Sitio caído
		    } else {
		        fclose($file);
		        $status = ($stoptime - $starttime) * 1000;
		        $status = floor($status);
		    }
		     
		    if ($status <> -1) {
		        return true;
		    } else {
		        return false;
		    }
		     
		}

		function Generar_Log_imp($Error){
			
			date_default_timezone_set('Chile/Continental');
			
		    $xml = new DomDocument('1.0', 'UTF-8');
		 
		    $biblioteca = $xml->createElement('Log_Error');
		    $biblioteca = $xml->appendChild($biblioteca);
		 
		    $libro = $xml->createElement('TipoError');
		    $libro = $biblioteca->appendChild($libro);
		     
		    $libro->setAttribute('Error', $Error);
		 
		    $xml->formatOutput = true;
		    $el_xml = $xml->saveXML();
		    $xml->save('Log_Error_'.date("Ymd_Gis").'.xml');
		 }


}





 ?>