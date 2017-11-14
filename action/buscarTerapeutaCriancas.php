  <?php
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Origin: *'); 
    
    if (isset($_GET['id'])){
    	require_once '../control/ControlTerapeuta.php';
	    
	    $CTerapeuta = new ControlTerapeuta();
	    $id =  $_GET['id'];
	  	$Terapeuta = $CTerapeuta->obterCriancas($id);
	  	$ret = $Terapeuta;
    }else{
	    $ret  = null;
    }
    
    echo json_encode($ret); 

  ?>
