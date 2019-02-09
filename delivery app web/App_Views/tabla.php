<?php require '../App_Validation/redirect.php';?>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
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
    </thead>

<?php            
        //$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
    require './reporte.php';

    

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