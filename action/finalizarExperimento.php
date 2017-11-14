<?php

  header('Access-Control-Allow-Origin: *'); 

  require_once '../control/ControlExperimento.php';    

  $CExperimento = new ControlExperimento();
     
  $Experimento = $CExperimento->obterExperimento("fimExperimento = '0000-00-00 00:00:00'");

  if( $Experimento != NULL){
     

      $dados = array(
                      'fimExperimento' => date("Y-m-d H:i:s", time()),
                    );

       $resul = $Experimento = $CExperimento->alterarExperimento($dados,"idExperimento ='".$Experimento[0]['idExperimento']."'");

      if($resul){
          $error = array('codigo' => 0,'descricao' => "" );
      }else{
          $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD" );
      }

    }else{
      $error = array('codigo' => 101,'descricao' => "Nenhum experimento em andamento" );
    }
  
    $ret = array(
                'erro' => array($error)
              );
    echo json_encode($ret); 

  ?>
