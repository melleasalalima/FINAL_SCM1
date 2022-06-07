<?php  
    include('php/functions.php');
    $selinv_all = $shop_all=$con->query("SELECT * FROM inventory")or die($con->error);   
    $selinv_squid = $shop_squid=$con->query("SELECT * FROM inventory WHERE `p_type` = 'squid';")or die($con->error);  
    $selinv_fish = $shop_fish=$con->query("SELECT * FROM inventory WHERE `p_type` = 'fish';")or die($con->error);   
    $selinv_salmon = $shop_salmon=$con->query("SELECT * FROM inventory WHERE `p_type` = 'salmon';")or die($con->error);   
    $selinv_crab = $shop_crab=$con->query("SELECT * FROM inventory WHERE `p_type` = 'crab-shrimp';")or die($con->error);    
?>