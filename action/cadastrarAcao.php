<?php
  header('Access-Control-Allow-Origin: *'); 
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once '../control/ControlRegComportamento.php';
  require_once '../control/ControlRegFalaRosto.php'; 
  require_once '../control/ControlExperimento.php';    

  $CRegComportamento = new ControlRegComportamento();
  $CRegFalaRosto = new ControlRegFalaRosto();
  $CExperimento = new ControlExperimento();
     

  $Experimento = $CExperimento->obterExperimento("fimExperimento = '0000-00-00 00:00:00'");

  if( $Experimento != NULL){

    if( isset($_POST['idFalaRosto'])){
       
        $idFalaRosto = htmlspecialchars(addslashes(strip_tags($_POST['idFalaRosto'])));
        

        //$idFalaRosto = 1;

        if($idFalaRosto != -1){
            $dados = array(   
                        'inicioFalaRosto' => date("Y-m-d H:i:s", time()),
                        'experimentos_idExperimentos' =>  $Experimento[0]['idExperimento'],
                        'FalaRosto_numeroFalaRosto' => $idFalaRosto,
                        'executado' => 'N'
                      );

           $resul = $CRegFalaRosto->cadastrarRegFalaRosto($dados);

          if($resul){
              $error = array('codigo' => 0,'descricao' => "" );
          }else{
              $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD (FalaRosto)" );
          }

        }

        

      }else{
        $error = array('codigo' => 1,'descricao' => "Erros nos paramentros enviados" );
      }

      if( isset($_POST['idComportamento'])){
        //$idComportamento = 1;
        $idComportamento = htmlspecialchars(addslashes(strip_tags($_POST['idComportamento'])));
        if($idComportamento != -1){
          
                  
        
            $dados = array(   
                        'inicioComportamento' => date("Y-m-d H:i:s", time()),
                        'experimentos_idExperimentos' =>  $Experimento[0]['idExperimento'],
                        'comportamentos_numeroComportamento' => $idComportamento
                      );


           $resul = $CRegComportamento->cadastrarRegComportamento($dados);

          if($resul){
              $error = array('codigo' => 0,'descricao' => "" );
          }else{
              $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD (Comportamento)" );
          }
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
