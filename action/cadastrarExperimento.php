<?php

    header('Access-Control-Allow-Origin: *'); 

    require_once '../control/ControlExperimento.php';    

    $CExperimento = new ControlExperimento();
     

  $Experimento = $CExperimento->obterExperimento("fimExperimento = '0000-00-00 00:00:00'");
  if( $Experimento == NULL){

    if( isset($_POST['idTerapeuta']) AND
        isset($_POST['idCrianca']) AND
        isset($_POST['idInstituicao'])
      ){
       
       $idTerapeuta = htmlspecialchars(addslashes(strip_tags($_POST['idTerapeuta'])));
       $idCrianca = htmlspecialchars(addslashes(strip_tags($_POST['idCrianca'])));
       $idInstituicao = htmlspecialchars(addslashes(strip_tags($_POST['idInstituicao'])));
        
        ///$idTerapeuta = 1;
        //$idCrianca = 1;
        //$idInstituicao = 1;
        
        $dados = array(
                        'inicioExperimento' => date("Y-m-d H:i:s", time()),
                        'fimExperimento' => 'NULL',
                        'terapeutas_idTerapeuta' => $idTerapeuta,
                        'criancas_idCrianca' => $idCrianca,
                        'instituicoes_idInstituicao' => $idInstituicao

                      );

         $resul = $Experimento = $CExperimento->cadastrarExperimento($dados);

        if($resul){
            $error = array('codigo' => 0,'descricao' => "" );
        }else{
            $error = array('codigo' => 201,'descricao' => "Erro ao salvar os dados no BD" );
        }

      }else{
        $error = array('codigo' => 1,'descricao' => "Erros nos paramentros enviados" );
      }

    }else{
      $error = array('codigo' => 102,'descricao' => "Ja existe um experimento em andamento" );
    }

    $ret = array(
                'erro' => array($error)
              );
    echo json_encode($ret); 

  ?>
