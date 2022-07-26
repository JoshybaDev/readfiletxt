<?php
$xOk=false;
$cad="";
if(isset($_FILES))
{
    $xOk=true;
}
if($xOk)
{
    if(isset($_FILES["files"]))
    {
        $x=1;
        $archivos=incoming_files();
        //var_dump($archivos);
        $dir=__DIR__."/filesinwait";
        foreach ($archivos as $index => $value) {
            if(RetornarExtension($value["name"])=='txt')
            {
                move_uploaded_file($value["tmp_name"],$dir."/file_$x.txt");
                $x++;
            }
        }
    }
    retornaListado($dir);
}
function incoming_files() {
    $files = $_FILES;
    $files2 = [];
    foreach ($files as $input => $infoArr) {
        $filesByInput = [];
        foreach ($infoArr as $key => $valueArr) {
            if (is_array($valueArr)) { // file input "multiple"
                foreach($valueArr as $i=>$value) {
                    $filesByInput[$i][$key] = $value;
                }
            }
            else { // -> string, normal file input
                $filesByInput[] = $infoArr;
                break;
            }
        }
        $files2 = array_merge($files2,$filesByInput);
    }
    $files3 = [];
    foreach($files2 as $file) { // let's filter empty & errors
        if (!$file['error']) $files3[] = $file;
    }
    return $files3;
}
function retornaListado($ruta)
{
    $dir = opendir($ruta);
    while ($file = readdir($dir)) 
    {
        if ($file != "." && $file != "..") 
        {
        ?>
        <div class="col-lg-4">
            <input type="text" class="form-control text-center Pendientes" placeholder="" aria-label="" id="<?=$file?>" readonly value="<?=$file?>">
            <div class="input-group">
            <!-- <input type="text" class="form-control text-center" placeholder="" aria-label="" readonly value="EN COLA" id="<?=$file?>_estatus"> -->
            <textarea name="<?=$file?>_estatus" id="<?=$file?>_estatus" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>        
        <?php
        }
    }
    clearstatcache();    
}
function RetornarExtension($data)
{
    return pathinfo($data,PATHINFO_EXTENSION);
}