<?php
  header('Access-Control-Allow-Origin: *'); 

  require_once '../control/ControlToque.php';
  require_once '../control/ControlExperimento.php';    

  $CExperimento = new ControlExperimento();
  $CToque = new ControlToque();
     
  $Experimento = $CExperimento->obterExperimento("fimExperimento = '0000-00-00 00:00:00'");

  if( $Experimento != NULL){

    if( isset($_POST['idToque']) AND isset($_POST['tipoToque']) ) {
       
        $idToque = htmlspecialchars(addslashes(strip_tags($_POST['idToque'])));
        $tipoToque = htmlspecialchars(addslashes(strip_tags($_POST['tipoToque'])));
        
        //$idToque = 1;
        //$tipoToque = 1;
        $dados = array(   
                    'horarioToque' => date("Y-m-d H:i:s", time()),
                    'tipoToque' => $tipoToque,
                    'experimentos_idExperimentos' =>  $Experimento[0]['idExperimento'],
                    'sensoresToque_numeroSensor' => $idToque
                  );

       $resul = $CToque->cadastrarToque($dados);

      if($resul){
          $error = array('codigo' => 0,'descricao' => "" );
      }else{
          $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD (FalaRosto)" );
      }


      }else{
        $error = array('codigo' => 1,'descricao' => "Erros nos paramentros enviados" );
      }
     

    }else{
      $error = array('codigo' => 101,'descricao' => "Nenhum experimento em andamento" );
    }

    $ret = array(
                'erro' => array($error)
              );
    echo json_encode($ret); 

  ?>
