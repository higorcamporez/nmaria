<?php
 
    header('Access-Control-Allow-Origin: *'); 
    
    require_once '../control/ControlRegFalaRosto.php';
    
    $CRegFalaRosto= new ControlRegFalaRosto();
     
  	$RegFalaRosto = $CRegFalaRosto->obterUltimoRegFalaRosto();
  	
  	if($RegFalaRosto == null){
  		$falaRosto = null;
      $idRegistrosFalaRosto = null;
      $executado = null;
      $error = array('codigo' => 301 ,'descricao' => "Nenhum registro FalaRosto encontrado" );

    }else{
  		$falaRosto = $RegFalaRosto[0]['FalaRosto_numeroFalaRosto'];
      $idRegistrosFalaRosto = $RegFalaRosto[0]['idRegistrosFalaRosto'];
      $executado = $RegFalaRosto[0]['executado'];
      $error = array('codigo' => 1 ,'descricao' => "" );
  	}

  	$ret = array(
                 'idRegFalaRosto' => $idRegistrosFalaRosto,
                 'falaRosto' => $falaRosto,
                 'executado' => $executado,
                 'error' => array($error)
                );
  	
    echo json_encode($ret); 

  ?>
