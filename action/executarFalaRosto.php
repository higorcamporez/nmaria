<?php 

  header('Access-Control-Allow-Origin: *'); 

  require_once '../control/ControlRegFalaRosto.php'; 

  $CRegFalaRosto = new ControlRegFalaRosto();

     
	if( isset($_POST['idRegFalaRosto'])){
	   
	    $idFalaRosto = htmlspecialchars(addslashes(strip_tags($_POST['idRegFalaRosto'])));

	    //$idFalaRosto = 1;
	    
	    $dados = array(  
	                'executado' => 'S'
	              );

	    $resul = $CRegFalaRosto->alterarRegFalaRosto($dados, "idRegistrosFalaRosto = '".$idFalaRosto."'");

		if($resul){
	      $error = array('codigo' => 0,'descricao' => "" );
	    }else{
	      $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD (FalaRosto)" );
	  	}


	  }else{
	    $error = array('codigo' => 1,'descricao' => "Erros nos paramentros enviados" );
	  }

      

    $ret = array(
                'erro' => array($error)
              );
    echo json_encode($ret); 

  ?>

