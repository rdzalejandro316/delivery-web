<?php require '../App_Validation/redirect.php';?>
<?php require '../App_Validation/conection.php';?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!--<link href="../App_Styles/reporte/reporte.css" rel="stylesheet" />-->
    <link href="../App_Styles/reset.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">  
    <script src="../App_Scripts/reporte.js"></script>
</head>
    <body>    
    <?php            

    	$sql = "select doc.idrow,CONVERT(varchar(20), fecha_ingreso, 103)fecha_ingreso,destin.nom_destin,doc.contacto,doc.cod_predio,doc.remitente,courier.nom_courier,doc.guia,tipo.nom_tipoing,operador.nom_operador,doc.nota,CONVERT(varchar(20), fecha_entrega, 20)fecha_entrega,cod_operador_e,operadore.nom_operador as nom_operador_e,nota_entrega,doc.cod_autorizado,autorizado.nom_autorizado,CASE doc.estado WHEN 1 THEN 'Recibido' WHEN 2 THEN 'Reparto' WHEN 3 THEN 'Entregado' WHEN 4 THEN 'Devolucion' ELSE 'Anulado' END as estado from doc_ingreso as doc inner join mae_destinatarios as destin on doc.cod_destin = destin.cod_destin inner join mae_predios predios on predios.cod_predio = doc.cod_predio inner join mae_courier courier on courier.cod_courier = doc.cod_courier  inner join mae_tipoingreso tipo on tipo.cod_tipoing = doc.cod_tipoing inner join mae_operadores operador on operador.cod_operador = doc.cod_operador left join mae_operadores operadore on operadore.cod_operador = doc.cod_operador_e left join mae_autorizados autorizado on autorizado.cod_autorizado = doc.cod_autorizado where  doc.cod_predio = '".$codigo."' order by doc.fecha_ingreso";

        $stmt = sqlsrv_query($conn, $sql);
        //$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);

        try{        
                                    
            echo "
                        
            <div class='menu_p'>
                <ul>
                    <li class='usuario'>usuario: ".$nom." </li>
                    <li class='rig'><a href='../App_Validation/exit.php'>cerrar sesion</a></li>
                    <li class='rig'><a href='./index.php'>inicio</a></li>
                </ul>
            </div>

        <div class='caja-tabla'>

            <input required='' type='text' id='myInput' onkeyup='myFunction()''>
            <label alt='Placeholder' placeholder='Adaptive Placeholder'></label>


            <label class='custom-select'>
                <select id='selccionar'>
                    <option value='' disabled selected>selecione el metodo de filtrado</option>
                    <option value='0'>id</option>
                    <option value='1'>fecha de ingreso</option>
                    <option value='2'>nombre destino</option>
                    <option value='3'>contacto</option>
                    <option value='4'>codigo de predio</option>
                    <option value='5'>remitente</option>                    
                    <option value='6'>nombre courier</option>                    
                    <option value='7'>guia</option>                    
                    <option value='8'>tipo de ingreso</option>                    
                    <option value='9'>nombre del operador</option>                    
                    <option value='10'>fecha de entrega</option>                    
                    <option value='11'>codigo operador</option>                    
                    <option value='12'>nom operador e</option>                    
                    <option value='13'>nota entrega</option> 
                    <option value='14'>codigo de autorizado</option> 
                    <option value='15'>estado</option>                                 
                </select>
            </label>

            <div class='caja'>
                <div class='c'>
                    <label>fecha de ingreso </label>
                    <label>desde </label>
                    <input type='date' id='fini' name='bday'>

                    <label>hasta </label>
                    <input type='date' id='ffin' name='bday'>
                </div>

                <input type='button' id='bot' name='bot' value='filtrar por fechas' onclick='mostrar()'>

                <input type='button' id='bot' name='bot' value='quitar filtro' onclick='quitar()'>
                                
                <input type='button' id='bot' name='bot' class='icono_pdf' value='exportar a pdf' onclick='exportar()'>
                

            </div>

            <div class='over' id='style-3'>
                <div class='al'>
                    <table id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
                        <tr>
                            <th>id</th>
                            <th>fecha de ingreso</th>
                            <th>nombre destino</th>                            
                            <th>contacto</th>                            
                            <th>codigo predio</th>                            
                            <th>remitente</th>                            
                            <th>nombre courier</th> 
                            <th>guia</th>
                            <th>tipo de ingreso</th>
                            <th>nombre del operador</th>
                            <th>fecha de entrega</th>
                            <th>codigo operador</th>                            
                            <th>nota entrega</th>
                            <th>codigo de autorizado</th>
                            <th>estado</th>                            
                        </tr>
            ";
                
                while( $row = sqlsrv_fetch_array($stmt) ) {
                                                
                            
                            /*$fechaIngreso = $row['fecha_ingreso']->format('d/m/Y h:i:s');                               
                            $fechaEntrega = $row['fecha_entrega']->format('d/m/Y h:i:s');*/                            
                                                                        
                            echo "<tr>
                                <td>".$row['idrow']."</td>                                
                                <td>".$row['fecha_ingreso']."</td>
                                <td>".$row['nom_destin']."</td>       
                                <td>".$row['contacto']."</td>       
                                <td>".$row['cod_predio']."</td>       
                                <td>".$row['remitente']."</td>       
                                <td>".$row['nom_courier']."</td>
                                <td>".$row['guia']."</td>
                                <td>".$row['nom_tipoing']."</td>
                                <td>".$row['nom_operador']."</td>                                                                
                                <td>".$row['fecha_entrega']."</td>                                                                
                                <td>".$row['cod_operador_e']."</td>                                  
                                <td>".$row['nota_entrega']."</td>                            
                                <td>".$row['cod_autorizado']."</td>
                                <td>".$row['estado']."</td>
                                </tr>";
                }

                echo "</table>
                </div>
            </div>
        </div>";
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
          text: 'Custom PDF',
          extend: 'pdfHtml5',
          filename: 'dt_custom_pdf',
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
            var logo = 'data:image/jpeg;base64,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ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA=';
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
                    width: 24
                  },
                  {
                    alignment: 'left',
                    italics: true,
                    text: 'dataTables',
                    fontSize: 18,
                    margin: [10,0]
                  },
                  {
                    alignment: 'right',
                    fontSize: 14,
                    text: 'Custom PDF export with dataTables'
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

