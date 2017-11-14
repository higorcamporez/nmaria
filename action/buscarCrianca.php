  <?php
 
    header('Access-Control-Allow-Origin: *'); 
    
    if (isset($_GET['id'])){
    	require_once '../control/ControlCrianca.php';
	    
	    $CCrianca= new ControlCrianca();
	    $id =  $_GET['id'];
	  	$Criancas = $CCrianca->obterCrianca("idCrianca = '".$id."'");
	  	$ret = $Criancas;
    }else{
	    $ret = "{}";
    }
    
    echo json_encode($ret); 

  ?>
