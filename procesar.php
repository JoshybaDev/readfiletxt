<?php
$xOk = false;
$cad = "";
if (isset($_GET)) {
    $xOk = true;
}
if ($xOk) {
    if (isset($_GET["file"])) {
        $xFilePath=__DIR__."/filesinwait/".$_GET["file"];
        if(file_exists($xFilePath))
        {
            $xFile = file_get_contents($xFilePath);
            echo $xFile;
            // $xFile=str_replace('=\r:',"=:",$xFile);
            // $xFile=str_replace('=\r:',"=:",$xFile);
            //$xFile=htmlspecialchars($xFile);
            // $lineas = file($xFile);
            // foreach ($lineas as $num_linea => $linea) {
            //     if(strpos($linea,"<td>") || strpos($linea,"</td>") || strpos($linea,"<th>") || strpos($linea,"</th>"))
            //     {
            //         $linea=str_replace('=C3=AD',"i",$linea);
            //         $linea=str_replace('=C3=B3',"o",$linea);
            //         $linea=str_replace('<= span class=3D"resaltar">',"",$linea);
            //         $linea=str_replace('<span class=3D"resaltar">',"",$linea);
            //         $linea=str_replace('class=3D"derecha"',"",$linea);
            //         $linea=str_replace('=:',":",$linea);
                    
            //         $linea=str_replace("<td>","",$linea);
            //         $linea=str_replace("</td>","",$linea);
            //         $linea=str_replace("<td >","",$linea);
            //         $linea=str_replace("</ td >","",$linea);
            //         $linea=str_replace("<th>","",$linea);
            //         $linea=str_replace("</th>","",$linea);                    
            //         $linea=str_replace('<span class=3D"resaltatipo">',":",$linea);   
            //         $linea=str_replace("</span> :",":",$linea);  
            //         //echo htmlspecialchars($linea);
            //         echo htmlspecialchars($linea) ."\n";
            //     }
            // }
            // $lineas = file_get_contents($xFile);
            //echo $lineas;
			unlink($xFilePath);
        }
        echo "\n========================\nPROCESADO";
    }
}
