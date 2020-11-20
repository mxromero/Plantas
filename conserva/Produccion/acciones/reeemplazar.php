<?php  



$print_data	 = "^XA~TA000~JSN^LT0^JJ0,0,p,e,d,d^MNW^PON^PMN^LH20,20^JMA^PR2~SD15^JUS^LRN^CI0^XZ";  // (temperatura fija de impresion)nuevo codigo zebra gk420-t
$print_data .= "^XA~TA000~JSN^LT0^JJ0,0,p,e,d,d^MNW^PON^PMN^LH0,0^JMA^PR2,3^JUS^LRN^CI0^XZ";  //' nuevo codigo zebra gk420-t
$print_data .= "^XA^LL1598";
$print_data .= "^FT741,72^A0R,20,14^FH\^FD  R -  ACONCAGUA FOODS S.A. ^FS";
$print_data .= "^FT714,31^A0R,22,14^FH\^FDPRODUCT OF CHILE     PRODUCTO DE CHILE^FS";
$print_data .= "^FT731,648^A0R,43,62^FH\^FD" . $xlote_nvo . "^FS";
$print_data .= "^FO505,20^GB0,1548,5^FS";
$print_data .= "^FO604,18^GB0,1558,4^FS";
$print_data .= "^FT675,37^A0R,16,16^FH\^FDProducto/Product^FS";
$print_data .= "^FT615,40^A0R,73,38^FH\^FD" . Trim($DMatEsp) . " / " . Trim($DMatIng) . $Letra . "^FS";
$print_data .= "^FT568,34^A0R,28,31^FH\^FDCodigo / Code       P.Neto / Net Wt    P.Bruto / Gross Wt      Fecha Elab. / Date  Elab.     Hora / Time           Cab / Filler^FS";
$print_data .= "^FT522,35^A0R,49,43^FH\^FD" . $Material . "^FS";
$print_data .= "^FT522,319^A0R,41,67^FH\^FD" . $Neto . "^FS";
$print_data .= "^FT523,562^A0R,41,62^FH\^FD" . $Bruto . "^FS";
$print_data .= "^FT521,815^A0R,41,50^FH\^FD" . $Fecha_Creacion . "^FS";
$print_data .= "^FT523,1168^A0R,44,55^FH\^FD" . $Hora_ax . "^FS";
$print_data .= "^FO139,12^GB0,682,4^FS";
$print_data .= "^FT454,31^A0R,32,26^FH\^FDIngredientes    :^FS";
$print_data .= "^FT413,33^A0R,28,26^FH\^FDVida Util         :^FS";
$print_data .= "^FT298,37^A0R,28,24^FH\^FDAlmacenamiento:^FS";
$print_data .= "^FT412,842^A0R,28,24^FH\^FDShelf Life           :^FS";
$print_data .= "^FT303,847^A0R,28,26^FH\^FDStorage           :^FS";
$print_data .= "^FT453,840^A0R,32,26^FH\^FDIngredients      :^FS";
$print_data .= "^FT378,841^A0R,28,24^FH\^FDProduct Foods Grade^FS";
$print_data .= "^FT456,209^A0R,31,24^FH\^FD" . $DMatEsp . "^FS";
$print_data .= "^FT455,1021^A0R,32,26^FH\^FD" . $DMatIng . "^FS";
$print_data .= "^FT416,209^A0R,26,24^FH\^FD" . $Meses . " " . $VUtilEsp . "^FS";
$print_data .= "^FT411,1021^A0R,28,21^FH\^FD" . $Meses . " " . $VUtilIng . "^FS";
$print_data .= "^FT379,34^A0R,26,24^FH\^FDProducto Grado Alimenticio^FS";
$print_data .= "^FT299,209^A0R,26,24^FH\^FD" . Trim($AlmEsp1) . " ^FS";
$print_data .= "^FT306,1028^A0R,27,24^FH\^FD" . Trim($AlmIng1) . " ^FS";
$print_data .= "^FT261,210^A0R,25,21^FH\^FD" . str_replace("°", "\F8",Trim($AlmEsp2)) . "^FS";
$print_data .= "^FT272,1029^A0R,28,21^FH\^FD" . str_replace("°", "\F8",Trim($AlmIng2)) . "^FS";
$print_data .= "^FT343,842^A0R,25,24^FH\^FDDate Exp.           :^FS";
$print_data .= "^FT339,33^A0R,26,24^FH\^FDFecha Venc.       :^FS";
$print_data .= "^FT341,1042^A0R,28,24^FH\^FD" . $Fecha_Vencimiento . "^FS";
$print_data .= "^FT343,210^A0R,28,24^FH\^FD" . $Fecha_Vencimiento . "^FS";
$print_data .= "^FT163,31^A0R,28,19^FH\^FDRS N\F8 968 del 24/01/91 del S.S.M.A. Reg. Metropolitana.^FS";
$print_data .= "^FT109,34^A0R,28,26^FH\^FDcontact @aconcaguafoods.cl^FS";
$print_data .= "^FT75,35^A0R,28,24^FH\^FDJose Alberto Bravo 0278, Buin - Chile^FS";
$print_data .= "^FT32,37^A0R,28,24^FH\^FDPhone (56-2)28218280 - (56-2) 28218090^FS";
$print_data .= "^BY6,3,144^FT70,717^BCR,,Y,N";
$print_data .= "^FD>;" . $uma1 . ">6" . $uma2 . "^FS";
$print_data .= "^FT748,531^A0R,25,24^FH\^FDLote N\F8^FS";
$print_data .= "^FT719,994^A0R,25,24^FH\^FDDrum N\F8^FS";
$print_data .= "^FT717,531^A0R,20,24^FH\^FDLot   N\F8^FS";
$print_data .= "^FT518,1437^A0R,54,62^FH\^FD " . $Cabezal . "  ^FS";
$print_data .= "^FT761,32^A0R,21,12^FH\^FDPACKED BY /            ENVASADO POR^FS";
$print_data .= "^FO700,16^GB0,1569,3^FS";
$print_data .= "^FT759,992^A0R,25,21^FH\^FDTambor N\A7 ^FS";
$print_data .= "^FT94,561^A0R,28,28^FH\^FDUMA/Pallet^FS";
$print_data .= "^FT723,1120^A0R,54,91^FH\^FD5" . str_pad($IDCorTambor,9,"0",STR_PAD_LEFT) . " ^ FS";
$print_data .= "^PQ1,0,1,Y^XZ";

?>