<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="../App_Styles/reporte/reporte.css" rel="stylesheet" />
    <link href="../App_Styles/reset.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">      
</head>
<body>        
  <?php
    require '../App_Validation/redirect.php';
    require '../App_Validation/conection.php';

    $FechaInicio=$_POST['fechaIni'];
    $FechaFinal=$_POST['fechaFin'];

      $dateFechaFin = new DateTime($FechaFinal);      
      $fechaFin = str_replace('-', '/', $dateFechaFin->format('d-m-Y'));
      $fechaFin .= ' 23:00:00';

      $dateFechaIn = new DateTime($FechaInicio);      
      $fechain = str_replace('-', '/', $dateFechaIn->format('d-m-Y'));

      $Todo=$_POST['todo'];

      if($Todo == 'todo'){

        $sql = "select doc.idrow,CONVERT(varchar(20), fecha_ingreso, 103)fecha_ingreso,destin.nom_destin,doc.contacto,doc.remitente,courier.nom_courier,doc.guia,tipo.nom_tipoing,operador.nom_operador,doc.nota,CONVERT(varchar(20), fecha_entrega, 20)fecha_entrega,operadore.nom_operador as nom_operador_e,nota_entrega,doc.cod_autorizado,autorizado.nom_autorizado,CASE doc.estado WHEN 1 THEN 'Recibido' WHEN 2 THEN 'Reparto' WHEN 3 THEN 'Entregado' WHEN 4 THEN 'Devolucion' ELSE 'Anulado' END as estado from doc_ingreso as doc inner join mae_destinatarios as destin on doc.cod_destin = destin.cod_destin inner join mae_predios predios on predios.cod_predio = doc.cod_predio inner join mae_courier courier on courier.cod_courier = doc.cod_courier  inner join mae_tipoingreso tipo on tipo.cod_tipoing = doc.cod_tipoing inner join mae_operadores operador on operador.cod_operador = doc.cod_operador left join mae_operadores operadore on operadore.cod_operador = doc.cod_operador_e left join mae_autorizados autorizado on autorizado.cod_autorizado = doc.cod_autorizado where  doc.cod_predio = '".$codigo."' order by doc.fecha_ingreso";  

      }else{

        $sql = "select doc.idrow,CONVERT(varchar(20), fecha_ingreso, 103)fecha_ingreso,destin.nom_destin,doc.contacto,doc.cod_predio,doc.remitente,courier.nom_courier,doc.guia,tipo.nom_tipoing,operador.nom_operador,doc.nota,CONVERT(varchar(20), fecha_entrega, 20)fecha_entrega,cod_operador_e,operadore.nom_operador as nom_operador_e,nota_entrega,doc.cod_autorizado,autorizado.nom_autorizado,CASE doc.estado WHEN 1 THEN 'Recibido' WHEN 2 THEN 'Reparto' WHEN 3 THEN 'Entregado' WHEN 4 THEN 'Devolucion' ELSE 'Anulado' END as estado from doc_ingreso as doc inner join mae_destinatarios as destin on doc.cod_destin = destin.cod_destin inner join mae_predios predios on predios.cod_predio = doc.cod_predio inner join mae_courier courier on courier.cod_courier = doc.cod_courier  inner join mae_tipoingreso tipo on tipo.cod_tipoing = doc.cod_tipoing inner join mae_operadores operador on operador.cod_operador = doc.cod_operador left join mae_operadores operadore on operadore.cod_operador = doc.cod_operador_e left join mae_autorizados autorizado on autorizado.cod_autorizado = doc.cod_autorizado where  doc.cod_predio = '".$codigo."' AND fecha_ingreso >= '".$fechain."' AND fecha_ingreso <= '".$fechaFin."' order by doc.fecha_ingreso";  
      }




      //echo "fecha inicial--".$fechain;
      //echo "fecha final--".$fechaFin;
      //echo str_replace('-', '/', $FechaFinal);

      
    ?>
   
    <?php include './menu.php';?>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>id</th>
            <th>fecha de ingreso</th>
            <th>nombre destino</th>                            
            <th>contacto</th>                                      
            <th>remitente</th>                            
            <th>nombre courier</th> 
            <th>guia</th>
            <th>tipo de ingreso</th>
            <th>nombre del operador</th>
            <th>fecha de entrega</th>       
            <th>nota entrega</th>
            <th>nombre de autorizado</th>
            <th>estado</th>                            
        </tr>
    </thead>

<?php            
        //$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
    try{        
        $stmt = sqlsrv_query($conn, $sql);
        echo"           
            <tbody>                               
        ";
        while( $row = sqlsrv_fetch_array($stmt) ) {                                                            
                                                                        
        echo "
            
                <tr>
                    <td>".$row['idrow']."</td>                                
                    <td>".$row['fecha_ingreso']."</td>
                    <td>".$row['nom_destin']."</td>       
                    <td>".$row['contacto']."</td>                           
                    <td>".$row['remitente']."</td>       
                    <td>".$row['nom_courier']."</td>
                    <td>".$row['guia']."</td>
                    <td>".$row['nom_tipoing']."</td>
                    <td>".$row['nom_operador']."</td>                                                                
                    <td>".$row['fecha_entrega']."</td>                                                                              
                    <td>".$row['nota_entrega']."</td>                            
                    <td>".$row['nom_autorizado']."</td>
                    <td>".$row['estado']."</td>
                </tr>
            ";
        }

        echo "
        </tbody>
            </table>";
    }
    catch(Exception $e)
    {
        echo "<div>fallo query</div>";   
    }

?>

</body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/vfs_fonts.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
  // Function to convert an img URL to data URL
  function getBase64FromImageUrl(url) {
    var img = new Image();
    img.crossOrigin = "anonymous";
    img.onload = function () {
        var canvas = document.createElement("canvas");
        canvas.width =this.width;
        canvas.height =this.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
    };
    img.src = url;
  }
  // DataTable initialisation
  $('#example').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        {
          text: 'exportar a PDF',
          extend: 'pdfHtml5',
          filename: 'DELIVERY',
          orientation: 'landscape', //portrait
          pageSize: 'A4', //A3 , A5 , A6 , legal , letter
          exportOptions: {
            columns: ':visible',
            search: 'applied',
            order: 'applied'
          },
          customize: function (doc) {
            //Remove the title created by datatTables
            doc.content.splice(0,1);
            //Create a date string that we use in the footer. Format is dd-mm-yyyy
            var now = new Date();
            var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
            // Logo converted to base64
            // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
            // The above call should work, but not when called from codepen.io
            // So we use a online converter and paste the string in.
            // Done on http://codebeautify.org/image-to-base64-converter
            // It's a LONG string scroll down to see the rest of the code !!!
            var logo = 'data:image/png;base64,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';
            // A documentation reference can be found at
            // https://github.com/bpampuch/pdfmake#getting-started
            // Set page margins [left,top,right,bottom] or [horizontal,vertical]
            // or one number for equal spread
            // It's important to create enough space at the top for a header !!!
            doc.pageMargins = [20,60,20,30];
            // Set the font size fot the entire document
            doc.defaultStyle.fontSize = 7;
            // Set the fontsize for the table header
            doc.styles.tableHeader.fontSize = 7;
            // Create a header object with 3 columns
            // Left side: Logo
            // Middle: brandname
            // Right side: A document title
            doc['header']=(function() {
              return {
                columns: [
                  {
                    image: logo,
                    width: 35
                  },
                  {
                    alignment: 'left',
                    italics: true,
                    text: 'REPORTE',
                    fontSize: 14,
                    margin: [10,0]
                  },
                  {
                    alignment: 'right',
                    fontSize: 18,
                    text: 'DELIVERY'
                  }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        }
        }]
    });
});
  </script>  
</html>

