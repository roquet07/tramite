<?php
include_once '../includes/solicitud.php';
include_once '../includes/solicitudpretension.php';
include_once '../includes/solicitudanexo.php';

$id = $_GET["id"];

// $id = 4;

$Solicitud = new Solicitud();
$VSolicitud = $Solicitud->EditarSolicitud_v2($id);

$Pretensiones = new SolicitudPretension();
$VPretensiones = $Pretensiones->ListarSolicitudPretension($id);

$Anexos = new SolicitudAnexo();
$VAnexos = $Anexos->ListarSolicitudAnexo($id);


$diaActual = date('d');
$nroMes = date('m');
$anioActual = date('Y');

switch($nroMes)
{   
case 1:
$mesActual = "Enero";
break;
case 2:
$mesActual = "Febrero";
break;
case 3:
$mesActual = "Marzo";
break;
case 4:
$mesActual = "Abril";
break;
case 5:
$mesActual = "Mayo";
break;
case 6:
$mesActual = "Junio";
break;
case 7:
$mesActual = "Julio";
break;
case 8:
$mesActual = "Agosto";
break;
case 9:
$mesActual = "Setiembre";
break;
case 10:
$mesActual = "Octubre";
break;
case 11:
$mesActual = "Noviembre";
break;
case 12:
$mesActual = "Diciembre";
break;

    //...
}


ob_start();

function titleCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI"))
{

    /*
     * Exceptions in lower case are words you don't want converted
     * Exceptions all in upper case are any words you don't want converted to title case
     *   but should be converted to upper case, e.g.:
     *   king henry viii or king henry Viii should be King Henry VIII
     */
    $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
    foreach ($delimiters as $dlnr => $delimiter) {
        $words = explode($delimiter, $string);
        $newwords = array();
        foreach ($words as $wordnr => $word) {
            if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                // check exceptions list for any words that should be in upper case
                $word = mb_strtoupper($word, "UTF-8");
            } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                // check exceptions list for any words that should be in upper case
                $word = mb_strtolower($word, "UTF-8");
            } elseif (!in_array($word, $exceptions)) {
                // convert to uppercase (non-utf8 only)
                $word = ucfirst($word);
            }
            array_push($newwords, $word);
        }
        $string = join($delimiter, $newwords);
   }//foreach
   return $string;
}




$nombre="Juan Carlos Tadeo Sanchez";

/*---------------------------------------Estilos-------------------------------------------*/

$margin_doc = "padding:40px 40px 40px 40px;font-family:Optima;";
$titulo = "font-weight: bold;text-align:center;font-size:14px;padding-bottom:12px;";
$Subtitulo = "font-weight: bold;font-size:14px;margin-top:5px;margin-bottom:-10px;padding-top:5px;";
$Subtitulo2 = "font-weight: bold;font-size:14px;margin-top:5px;margin-bottom:-10px;padding-top:0px;";
$Subtitulo_subra = "font-weight: bold;font-size:14px;margin-top:-10px;margin-bottom:-10px;text-decoration: underline;";
$Subtitulo_principal = "font-weight: bold;font-size:14px;margin-top:-10px;margin-bottom:5px;text-align:justify;";
$parrafo_bold = "font-weight: bold;font-size:13px;";
$parrafo_bold2 = "font-weight: bold;font-size:13px;margin-bottom:5px;margin-top:50px;padding-top:10px;";
$parrafo_bold_underline_space = "font-weight: bold;font-size:13px;text-decoration: underline;padding-left:18px;";
$parrafo = "font-size:14px;padding-left:25px;padding-bottom:-10px;padding-top:0px;";
$parrafo_space = "font-size:14px;padding-left:35px;margin-bottom:-10px;margin-top:-19px;text-align:justify;";
$parrafo_space_help = "font-size:12px;margin-left:33px,color:darkslategray;border-top: 1px solid #9e9e9e;margin-bottom:-5px";
$parrafo_space_table = "font-size:14px;padding-left:33px;margin-bottom:0px;margin-top:-13px;padding-bottom:-19px;";
$parrafo_rigth = "font-size:14px;text-align:right;padding-bottom:-15px;padding-top:-15px;";
$parrafo_rigth_line = "font-size:14px;text-align:right;padding-bottom:-15px;padding-top:45px;";
$parrafo_rigth_firma = "font-size:14px;text-align:right;margin-rigth:15px;padding-rigth:20px;";
$parrafo_rigth_bold = "font-size:14px;text-align:right;margin-bottom:-14px;font-weight: bold;";
$parrafo_rigth_bold_2 = "font-size:14px;text-align:right;margin-bottom:18px;font-weight: bold;";
?>

<!-- ------------------------------------ PLANTILLA -------------------------------------------------->
<div style="<?php echo $margin_doc; ?>">
	<!--<p style="<?php echo $titulo; ?>">SOLICITUD DE INICIO DE PROCEDIMIENTO ARBITRAL<p>-->
	<p style="<?php echo $parrafo_rigth_bold; ?>">Sumilla:<span> SOLICITUD DE INICIO DE</span><p>
	<p style="<?php echo $parrafo_rigth_bold_2; ?>"><span> ARBITRAJE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><p>
	<p style="<?php echo $Subtitulo_principal; ?>">A LA SECRETAR??A GENERAL DEL CENTRO DE ARBITRAJE LATINOAMERICANO E INVESTIGACIONES JUR??DICAS<p>
	<p style="<?php echo $parrafo_bold; ?>">Direcci??n: Av. Faustino S??nchez Carri??n N?? 615 Oficina 306 ??? Edificio V??rtice 22 ??? Distrito de Jes??s Mar??a ??? Lima<p>
	
	<!-- DATOS DEL DEMANDANTE ??-->
	<p style="<?php echo $Subtitulo; ?>">1.&nbsp;&nbsp;&nbsp;&nbsp;DATOS DEL DEMANDANTE:<p>
	
	<p style="<?php echo $parrafo; ?>">???	Nombre o Raz??n social<p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo titleCase($VSolicitud['RazSocDem']) ;?><p>
	
	<p style="<?php echo $parrafo; ?>">???	<?php echo titleCase($VSolicitud['tipdoc']).": ".$VSolicitud['NumDocDem'] ;?><p>
	
	<p style="<?php echo $parrafo; ?>">???	Domicilio:<p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo titleCase($VSolicitud['DesDirDem']) ;?><p>
	
	<p style="<?php echo $parrafo; ?>">???	Representante legal: <p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo titleCase($VSolicitud['ApeNomLeg']).", con ".titleCase($VSolicitud['tipDocRep']) . " N?? ".$VSolicitud['NumDocRep'].", facultado seg??n: ";?><p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo $VSolicitud['EscPubDem'];?><p>
	
	<p style="<?php echo $parrafo; ?>"><span><?php echo "???	Tel??fono: ".$VSolicitud['NumTelRep'];?></span><span style="padding-left: 150px"><?php echo "???	Celular: ".$VSolicitud['NumCelRep'];?></span><p>

	<p style="<?php echo $parrafo; ?>"><?php echo "???	Correo electr??nico: ".$VSolicitud['DirEmaRep'];?><p>
	<p style="<?php echo $parrafo; ?>"><?php echo "???	La factura o boleta se deber?? de emitir a nombre de: ".titleCase($VSolicitud['RazSocEmiCom']);?><p>

	<p style="<?php echo $parrafo_bold2; ?>">La presente solicitud de inicio de arbitraje se dirige contra: <p>

	<!-- DATOS DEL DEMANDADO ??-->
	<p style="<?php echo $Subtitulo; ?>">2.&nbsp;&nbsp;&nbsp;&nbsp;DATOS DEL DEMANDADO:<p>
	
	<p style="<?php echo $parrafo; ?>"><?php echo "???	Nombre o Raz??n social: ".$VSolicitud['RazSocDmd'];?><p>
	
	<p style="<?php echo $parrafo; ?>"><?php echo "???	Domicilio: ".titleCase($VSolicitud['DesDirDmd']);?><p>

	<p style="<?php echo $parrafo; ?>"><span><?php echo "???	Tel??fono: ".$VSolicitud['NumTelDmd'];?></span><span style="padding-left: 150px"><?php echo "???	Celular: ".$VSolicitud['NumCelDmd'];?></span><p>

	<p style="<?php echo $parrafo; ?>"><?php echo "???	Correo electr??nico: ".$VSolicitud['DirEmaDmd'];?><p>
	
	<p style="<?php echo $parrafo; ?>">???	<?php echo titleCase($VSolicitud['DesTipDocDmd']).": ".$VSolicitud['NumDocDmd'] ;?><p>
	<p style="<?php echo $parrafo; ?>"><?php echo "???	Autoridad representante: ".$VSolicitud['AutRepDmd'];?><p>
	<p style="<?php echo $parrafo; ?>"><?php echo "???	Procurador publico de corresponder: ".$VSolicitud['ProPubDmd'];?><p>

	<!-- 3.	CONVENIO ARBITRAL??-->
	<p style="<?php echo $Subtitulo; ?>">3.&nbsp;&nbsp;&nbsp;&nbsp;CONVENIO ARBITRAL:<p>

	<p style="<?php echo $parrafo_space; ?>">Indicar su inter??s que la controversia existente se organice y administre a trav??s del Centro de Arbitraje Latinoamericano e Investigacioines Jur??dicas, o indicar la cl??usula arbitral. <p>

	<p style="<?php echo $parrafo_space; ?>"><?php echo $VSolicitud['DesConArb'];?><p>

	<!-- 3.	TIPO ARBITRAJE??-->
	<p style="<?php echo $Subtitulo; ?>">4.&nbsp;&nbsp;&nbsp;&nbsp;TIPO DE ARBITRAJE:<p>
	
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgCtrDer'];?>) De Derecho P??blica<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgCtrCon'];?>) De Conciencia<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgCtrNac'];?>) Nacional<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgCtrInt'];?>) Internacional<p>

	<p style="<?php echo $parrafo_bold_underline_space; ?>">Especialidad:<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgEspCtr'];?>) Contrataci??n P??blica<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgEspCiv'];?>) Civil<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgEspLey'];?>) Ley General de Sociades<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgEspMin'];?>) Minero<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgEspCon'];?>) Concesiones<p>
	<p style="<?php echo $parrafo_space; ?>">(<?php echo $VSolicitud['flgEspOtr'];?>) Otros<p>

	<!-- 5.Narraci??n breve de los hechos que desee someter a arbitraje:??-->
	<p style="<?php echo $Subtitulo; ?>">5.&nbsp;&nbsp;&nbsp;&nbsp;Narraci??n breve de los hechos que desee someter a arbitraje:<p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo $VSolicitud['DesNarHec'];?><p>

	<!--6.	PRETENSIONES -->
	<p style="<?php echo $Subtitulo; ?>">6.&nbsp;&nbsp;&nbsp;&nbsp;PRETENSIONES:<span>(El petitorio debe ser determinado con claridad y precisi??n)</span><p>
	<table style="<?php echo $parrafo_space_table;?>">
	  <!--<tr><td><?php echo "1.".$PretensionDesc;?></td></tr>-->
	  <?php 
	  $contador=1;
	  foreach ($VPretensiones as $key => $value) {
	  	
	  	echo '<tr>
	  			<td>'.$contador.'. '.$value['desPretension'].'.</td>
	  		  </tr>';
	  	 $contador= $contador + 1; 
	  }
	 
	   ?>
	</table>
	<br>
	<!--7.	Informaci??n sobre procesos extra arbitrales  -->
	<p style="<?php echo $Subtitulo; ?>">7.&nbsp;&nbsp;&nbsp;&nbsp;Informaci??n sobre procesos extra arbitrales interpuestos ante el ??rbitro de emergencia o ante el ??rgano jurisdiccional ??? poder judicial ??? sobre la materia en arbitraje:<p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo $VSolicitud['DesMedCau'];?><p>
	<!--8.	CUANTIA  -->
	<p style="<?php echo $Subtitulo; ?>">8.&nbsp;&nbsp;&nbsp;&nbsp;CUANT??A:<p>
	<p style="<?php echo $parrafo_space; ?>">Se estima que el importe controvertido en el presente arbitraje asciende a (en n??meros y letras):<p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo $VSolicitud['SimMon']." ".$VSolicitud['ImpNCuant']." ".$VSolicitud['ImpLCuant'].".";?><p>

	<!--9.	DESIGNACION DE ARBITRO -->
	<p style="<?php echo $Subtitulo; ?>">9.&nbsp;&nbsp;&nbsp;&nbsp;Designaci??n de ??rbitro, de corresponder:<p>
	
	<p style="<?php echo $parrafo_space; ?>"><?php echo "Que designamos como ??rbitro de parte a ". $VSolicitud['ApeNomArb'] .", cuya direcci??n es ". $VSolicitud['DesDirArb'] .", su tel??fono ".$VSolicitud['NumTelArb']." y su correo electr??nico es ". $VSolicitud['DirEmaArb'].".";?><p>

	<p style="<?php echo $parrafo_space; ?>">En caso que la Parte no quiera designar directamente al ??rbitro de parte, marque la siguiente opci??n: <p>
	<p style="<?php echo $parrafo_space; ?>"><?php echo "(".$VSolicitud['FlgPrtArb'].")"." El Centro de Arbitraje designe al ??rbitro de parte.";?><p>

	<p style="<?php echo $parrafo_space; ?>">En caso de ??rbitro ??nico y no exista intenci??n de acuerdo sobre la designaci??n de ??rbitro ??nico, maque la siguiente opci??n: <p>

	<p style="<?php echo $parrafo_space; ?>"><?php echo "(".$VSolicitud['FlgUniArb'].")"." El Centro de Arbitraje designe al ??rbitro ??nico.";?><p>

	<!--10.	DOCUMENTOS ANEXOS -->
	<p style="<?php echo $Subtitulo; ?>">10.&nbsp;&nbsp;&nbsp;&nbsp;DOCUMENTOS ANEXOS:<p>
	<table style="<?php echo $parrafo_space_table;?>">
	<?php 
	$contador=1;
	  foreach ($VAnexos as $key => $value) {
	  	echo '<tr>
	  			<td>'.$contador.'. '.$value['desanx'].'.</td>
	  		  </tr>';
	  	$contador= $contador + 1; 
	  }
	  ?>
	</table>
	<br>

	<p style="<?php echo $parrafo_rigth; ?>"><?php echo "Lima,".$diaActual." de ".$mesActual." de ".$anioActual.".";?><p>
	<p style="<?php echo $parrafo_rigth_line; ?>">_______________________<p>
	<p style="<?php echo $parrafo_rigth_firma; ?>">Firma&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>
	<br>

	
	<!--
	<p style="<?php echo $Subtitulo; ?>">1.- NOTA PARA EFECTOS DE NOTIFICACI??N: <p><p style="<?php echo $parrafo_space; ?>">El art??culo 2 del Reglamento Procesal de Arbitraje, establece que las comunicaciones y/o notificaciones se remitir??n por correo electr??nico, para tal efecto, deber??n de se??alar la(s) cuenta(s) electr??nica(s) para la notificaci??n o comunicaci??n correspondiente, solo de manera excepcional y debidamente justificado, se podr?? notificar de manera f??sica, por lo que, se adicionar?? un costo de S/ 1,200.00 (un mil doscientos y 00/100 soles), el mismo que no incluye el IGV.<p>
	!-->
	<p style="<?php echo $Subtitulo_subra; ?>">1.-&nbsp;&nbsp;&nbsp;&nbsp;NOTA PARA EFECTOS DE NOTIFICACI??N: <p>
	<p style="<?php echo $parrafo_space; ?>">El art??culo 2 del Reglamento Procesal de Arbitraje, establece que las comunicaciones y/o notificaciones se remitir?? a trav??s de Casilla Electr??nica, para tal efecto, deber??n de se??alar la(s) cuenta(s) electr??nica(s) para la notificaci??n o comunicaci??n correspondiente, solo de manera excepcional y debidamente justificado, se podr?? notificar de manera f??sica, por lo que, se adicionar?? un costo de S/ 1,500.00 (un mil quinientos y 00/100 soles), el mismo que no incluye el IGV.<p>

	<p style="<?php echo $Subtitulo_subra; ?>">2.-&nbsp;&nbsp;&nbsp;&nbsp;EN CASO SOLICITES MEDIDA CAUTELAR ANTE EL ??RBITRO DE EMERGENCIA: <p>
	<p style="<?php echo $parrafo_space; ?>">Deber??s de tener en cuenta el art??culo 66 del Reglamento Procesal de Arbitraje, remitiendo tu solicitud cautelar ante la Secretar??a General o en su defecto utilizando el Sistema Electr??nico Arbitral.<p>


<div>