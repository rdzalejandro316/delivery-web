<?php 
require('fpdf.php'); 
require ('../../App_Validation/redirect.php');
require ('../../App_Validation/conection.php');

class PDF extends FPDF 
{ 
  function header() 
  { 
    $this->SetFont('arial','B',7); 
    $this->Cell(50);
    //$this->Image('logo.png',10,10,-300); 
    $this->Cell(500,10,'REPORTE DELIVERY',0,0,'C'); 
    $this->Ln(10); 
    $this->Cell(80,10,'_____________________',0,0,'C');
    $this->Ln(15); 
  } 
  function Footer() 
  { 
    $this->SetY(-10); 
    $this->SetFont('Arial','I',8); 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C'); 
  }
  function TablaColores($header,$stmt)
  {
  //Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(33,150,243);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(30, 75, 75, 75, 45, 30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();

    $this->SetFillColor(20,20,20);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    while($row = sqlsrv_fetch_array($stmt)){       
      $this->Cell(30,7,$row['fecha_ingreso'],1,0,'L'); 
      $this->Cell(75,7,$row['nom_destin'],1,0,'L'); 
      $this->Cell(75,7,$row['contacto'],1,0,'L'); 
      $this->Cell(75,7,$row['remitente'],1,0,'L'); 
      $this->Cell(45,7,$row['nom_courier'],1,0,'L'); 
      $this->Cell(30,7,$row['fecha_entrega'],1,0,'L'); 
      $this->Ln(); 
    } 
  } 

} 

$sql = "select doc.idrow,CONVERT(varchar(20), fecha_ingreso, 20)fecha_ingreso,destin.nom_destin,doc.contacto,doc.cod_predio,doc.remitente,courier.nom_courier,doc.guia,tipo.nom_tipoing,operador.nom_operador,doc.nota,CONVERT(varchar(20), fecha_entrega, 20)fecha_entrega,cod_operador_e,operadore.nom_operador as nom_operador_e,nota_entrega,doc.cod_autorizado,autorizado.nom_autorizado,CASE doc.estado WHEN 1 THEN 'Recibido' WHEN 2 THEN 'Reparto' WHEN 3 THEN 'Entregado' WHEN 4 THEN 'Devolucion' ELSE 'Anulado' END as estado from doc_ingreso as doc inner join mae_destinatarios as destin on doc.cod_destin = destin.cod_destin inner join mae_predios predios on predios.cod_predio = doc.cod_predio inner join mae_courier courier on courier.cod_courier = doc.cod_courier  inner join mae_tipoingreso tipo on tipo.cod_tipoing = doc.cod_tipoing inner join mae_operadores operador on operador.cod_operador = doc.cod_operador left join mae_operadores operadore on operadore.cod_operador = doc.cod_operador_e left join mae_autorizados autorizado on autorizado.cod_autorizado = doc.cod_autorizado  where  doc.cod_predio = '".$codigo."' order by doc.fecha_ingreso";;

$stmt = sqlsrv_query( $conn, $sql);
//$row = sqlsrv_fetch_array($stmt);

$header=array('FECHA DE INGRESO', 'NOMBRE DESTINO','CONTACTO','REMITENTE','MENSAJERO', 'FECHA DE ENTREGA');

$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage('L','Legal'); 
$pdf->TablaColores($header,$stmt);



$pdf->Output(); 
?> 