<?php
ob_start();
$path = 'Vista/img/Pinchos.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        h2{
            text-align: center;
        }
        #img{
            background:url(<?php echo $base64?>);
            z-index: -1;
            position: absolute;
            margin-top: -20%;
            margin-left: -20%;

        }
        table{
            margin-left: 1%;
            width: 100%;
        }
        #fecha{
            border-bottom: black 5px solid;
            width: 23%;
        }
        td,th{
            text-align: center;
            background-color: #f5f5dc;
            padding: 0.4%;

        }
        th{
            color: black;
            background-color: #ffa114;
        }
        
    </style>
    <title>PDF Productos</title>
</head>

<body>
    <div id="pdf">
        <img id="img" src="<?php echo $base64?>">
        <h1 id="fecha"><?php echo date("Y-m-d")?></h1>
        <h2>Reporte Productos</h2>
        <table>
            <thead>
                <tr id="titulos">
                    <th>Nombre</th>
                    <th>Unidad de Medida</th>
                    <th>Cantidad Total</th>
                    <th>Cantidad Gastada</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)) : ?>
                <?php foreach ($result as $productos) : ?>
                        <tr>
                            <td><?php echo $productos["prod_nombre"]; ?></td>
                            <td><?php echo $productos["prod_unidad_medida"]; ?></td>
                            <td><?php echo $productos["prod_total_entrada"]; ?></td>
                            <td><?php echo $productos["prod_total_salidas"]; ?></td>
                        <tr>
                    <?php endforeach ?>        
                <?php endif ?>    
            </tbody>
            

        </table>
       
    </div>
</body>

</html>
<?php
$html = ob_get_clean();
//echo $html;

require_once 'Vista/lib/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper("letter");
$dompdf->render();
$dompdf->stream("Inventario Productos.pdf", array("Attachment" => false));

?>