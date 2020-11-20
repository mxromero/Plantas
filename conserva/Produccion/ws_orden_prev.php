<?php
//extract($_POST);
//require_once($_SESSION['pathCrud']);

class Ws_OP{
	
	private $OP;
	private $post;			//Valores que traigo desde el POST
	private $condUp;		//Condicion Seteada desde el editarOP.php (paletizadora 2,3,8,12)
	private $wCantidad;
	private $wKdauf;
	private $wKdpos;
	private $wLgort;
	private $wLtxcj;
	private $wMaktx;
	private $wMatnr;
	private $wPlnum;
	private $wUm;
	private $wVerid;
	private $wWerks;
	private $condicionWS;	//Traigo Paletizadora desde WS (condicion para update tabla)

	function set_condWS($ax){
		$this->condicionWS = $ax;	
	}

	function get_condWS(){
		return $this->condicionWS;
	}

	function set_condUp($ax){
		$this->condUp = $ax;
	}

	function get_condUp(){
		return $this->condUp;
	}

	function set_npost($ax){
		$this->post = $ax;
	}

	function get_npost(){
		return $this->post;
	}

	function set_ordenPrevicional($ax){
		$this->OP = $ax;
	}
	function get_ordenPrevicional(){
		return $this->OP;
	}

	function set_nCantidad($ax){
		$this->wCantidad = $ax;
	}
	function get_nCantidad(){
		return $this->wCantidad;
	}

	function set_nKdauf($ax){
		$this->wKdauf = $ax;
	}
	function get_nKdauf(){
		return $this->wKdauf;
	}

	function set_nKdpos($ax){
		$this->wKdpos = $ax;
	}
	function get_nKdpos(){
		return $this->wKdpos;
	}

	function set_nLgort($ax){
		$this->wLgort = $ax;
	}
	function get_nLgort(){
		return $this->wLgort;
	}

	function set_nLtxcj($ax){
		$this->wLtxcj = $ax;
	}
	function get_nLtxcj(){
		return $this->wLtxcj;
	}

	function set_nMaktx($ax){
		$this->wMaktx = $ax;
	}
	function get_nMaktx(){
		return $this->wMaktx;
	}

	function set_nMatnr($ax){
		$this->wMatnr = $ax;
	}
	function get_nMatnr(){
		return $this->wMatnr;
	}

	function set_nPlnum($ax){
		$this->wPlnum = $ax;
	}
	function get_nPlnum(){
		return $this->wPlnum;
	}

	function set_nUm($ax){
		$this->wUm = $ax;
	}
	function get_nUm(){
		return $this->wUm;
	}

	function set_nVerid($ax){
		$this->wVerid = $ax;
	}
	function get_nVerid(){
		return $this->wVerid;
	}						

	function set_nWerks($ax){
		$this->wWerks = $ax;
	}
	function get_nWerks(){
		return $this->wWerks;
	}	

	function __construct(){
		//$this->crud = new CRUD();
		//$this->crud->Conexion(UNP,UPP,S,DB);
	}
	
	function retorna_WS(){
	 	$SOAP_AUTH = array( 'login'    => 'intranet',
					'password' => 'int33102010');
							
			//Revisar Servicio Web Etiquetado0005	 
		$WSDL = "http://aplaco2.aconcaguafoods.cl:8000/sap/bc/srt/wsdl/bndg_EA12C08B15BAC1F190A20050560120A0/wsdl11/allinone/standard/document?sap-client=500";
		$client = new SoapClient($WSDL,$SOAP_AUTH);
		
		try{
			
				$params =  array( 'WPlnum2' => $this->get_ordenPrevicional());
				
				$retorno = $client->ZwsPpDatosOrdenprev2($params);
				
				$this->set_nCantidad($retorno->WCant);		//Cantidad Segun Dato Maestro-
						//$this->($retorno->WKdauf);		//Pedido
						//$this->($retorno->WKdpos);		//Posision en pedido
				$this->set_nLgort($retorno->WLgort);		//Almacen Notificacion-
						//$this->($retorno->WLtxcj);		//Latas x Cajas Segun Dato Maestro
						//$this->($retorno->WMaktx);		//Descripción Material
				$this->set_nMatnr($retorno->WMatnr);		//Material-
						//$this->($retorno->WPlnum);		//Orden Previsional-
						//$this->($retorno->WUm);			//Unidad de Medida
				$this->set_nVerid($retorno->WVerid);		//Version Fabricación-
				$this->set_nWerks($retorno->WWerks);		//Centro -
				
			/*	echo $wCantidad . "|" . $wKdauf . "|" . $wKdpos . "|" . $wLgort . "|" . $wLtxcj . "|" . $wMaktx . "|" . $wMatnr	. "|" . $wPlnum . "|" . $wUm . "|" . $wVerid . "|" . $wWerks;*/

		}catch(SoapFault $exception){
			
			echo "<pre>";
				print_r($exception);
			echo "</pre>";
			
	 }
	
	}//cierra funcion retorna_WS

	function getValOrdPrev(){
		?>
	        $('#ax_ordprev').val('<?php echo $this->get_ordenPrevicional(); ?>'); //OP
	        $('#ax_version').val('<?php echo $this->get_nVerid(); ?>');
	        $('#ax_centro').val('<?php echo $this->get_nWerks(); ?>');
	        $('#ax_almacen').val('<?php echo $this->get_nLgort(); ?>');
	        $('#ax_matorden').val('<?php echo $this->get_nMatnr(); ?>');
	        $('#ax_cant').val('<?php echo $this->get_nCantidad(); ?>');
	    <?php
	 /*$('#ax_condicion').val('<?php echo $this->get_npaletizadora(); ?>');*/
	}//fin getValOrdPrev

	function UpdateConfLin(){

	 	$data= $this->get_npost();
		$condicion = " paletizadora = '".  $this->get_condUp() ."'";

		$campos =" paletizadora = '".$data['']."', 
				   NOrdPrev = '".$data['']."',
				   fecha = '". $data['']."',
				   VersionF = '" .$data['']."'
				   centro = '". $data['']."',
				   almacen = '". $data['']."',
				   material_orden = '". $data['']."',";

		$crud = new Ws_OP();

			$resp = $this->crud->Update($this->get_ntabla(),$campos, $condicion);//está modificando datos sin validar :/ 

	}//fin UpdateConfLin
  


}//fin de la clase



?>