<?php
$param = 'DUMBWAYS';
drawImage($param);

function drawImage($param){
    echo "\n\n";
    $len = strlen($param);
    for ($i=0; $i<$len; $i++) { 
        for ($j=0; $j<$len; $j++) { 
            echo $i==$j ? $param[$i] : (defined('STDIN') ? '   ' : '&nbsp&nbsp&nbsp');
        }
        echo (defined('STDIN') ? "\n\n" : "<br>");
    }
}
?>