<?php
header("content-type:text/html;charset=utf-8");
for($i=1;$i<=9;$i++)
{
    for($j=1;$j<=$i;$j++){
        echo "$i*$j=".($i*$j);
        echo "&nbsp;&nbsp;&nbsp;";
    }
    echo "<br>";
}

?>