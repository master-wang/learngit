<?php
header("content-type:text/html;charset=utf-8");

$data=31;

echo "<table width='700px' border='1px'>";

for($i=1;$i<$data;){
    echo "<tr>"; 
    for($j=0;$j<7;$j++){
        if($i>$data){
            echo "<td>&nbsp;</td>";
        }else{
            echo "<td>{$i}</td>";
        }


        $i++;
    }   
    echo "</tr>";    
}
 echo "</table>";

?>