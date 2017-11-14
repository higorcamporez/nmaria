<?php
  header('Access-Control-Allow-Origin: *'); 


  require_once '../control/ControlRegComportamento.php';

  $CRegComportamento = new ControlRegComportamento();


  if( isset($_POST['idRegComportamento']) ){
     
      $idRegComportamento = htmlspecialchars(addslashes(strip_tags($_POST['idRegComportamento'])));
      

      //$idFalaRosto = 9;

      $dados = array(  
                'executado' => 'S'
              );
      


       $resul = $CRegComportamento->alterarRegComportamento($dados, "idRegistroComportamento = '".$idFalaRosto."'");

      if($resul){
          $error = array('codigo' => 0,'descricao' => "" );
      }else{
          $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD (Comportamento)" );
      }
    
  }else{
    $error = array('codigo' => 1,'descricao' => "Erros nos paramentros enviados" );
  }


  $ret = array(
              'erro' => array($error)
            );
  echo json_encode($ret); 

  ?>
