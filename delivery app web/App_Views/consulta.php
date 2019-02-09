<?php
		require '../App_Validation/redirect.php';
		require '../App_Validation/conection.php';

	    $sql = "select doc.idrow,CONVERT(varchar(20), fecha_ingreso, 103)fecha_ingreso,destin.nom_destin,doc.contacto,doc.cod_predio,doc.remitente,courier.nom_courier,doc.guia,tipo.nom_tipoing,operador.nom_operador,doc.nota,CONVERT(varchar(20), fecha_entrega, 20)fecha_entrega,cod_operador_e,operadore.nom_operador as nom_operador_e,nota_entrega,doc.cod_autorizado,autorizado.nom_autorizado,CASE doc.estado WHEN 1 THEN 'Recibido' WHEN 2 THEN 'Reparto' WHEN 3 THEN 'Entregado' WHEN 4 THEN 'Devolucion' ELSE 'Anulado' END as estado from doc_ingreso as doc inner join mae_destinatarios as destin on doc.cod_destin = destin.cod_destin inner join mae_predios predios on predios.cod_predio = doc.cod_predio inner join mae_courier courier on courier.cod_courier = doc.cod_courier  inner join mae_tipoingreso tipo on tipo.cod_tipoing = doc.cod_tipoing inner join mae_operadores operador on operador.cod_operador = doc.cod_operador left join mae_operadores operadore on operadore.cod_operador = doc.cod_operador_e left join mae_autorizados autorizado on autorizado.cod_autorizado = doc.cod_autorizado where  doc.cod_predio = '".$codigo."' order by doc.fecha_ingreso";

?>
    
