<?php
highlight_file(__FILE__);
include('flag.php');
$a = $_GET['a'];
$b = unserialize ($a);
$b->c = $flag;
foreach($b as $key => $value)
{
        if($key==='c')
        {
                continue;
        }
        echo $value;
}
?>