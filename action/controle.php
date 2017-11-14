<?php
 
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: GET, POST, PUT');
    require_once '../control/ControlPosicao.php';  
    require_once '../control/ControlExperimento.php';    
    require_once '../control/ControlRegComportamento.php';  
    
    $CPosicao = new ControlPosicao();
    $CExperimento = new ControlExperimento();
    $CRegComportamento = new ControlRegComportamento();
     
  
    $Experimento = $CExperimento->obterExperimento("fimExperimento = '0000-00-00 00:00:00'");

    //inicializações
    $idRegComportamento = null;
    $executado = null;

    //buscar experimento em aberto
    if ($Experimento != null){
      //verifica a existencia dos paramentros de entreda
      if( isset($_POST['xRobo']) AND
          isset($_POST['yRobo']) AND
          isset($_POST['xCrianca']) AND
          isset($_POST['yCrianca']) 
        ){
         
          $xRobo = htmlspecialchars(addslashes(strip_tags($_POST['xRobo'])));
          $yRobo = htmlspecialchars(addslashes(strip_tags($_POST['yRobo'])));
          $xCrianca = htmlspecialchars(addslashes(strip_tags($_POST['xCrianca'])));
          $yCrianca = htmlspecialchars(addslashes(strip_tags($_POST['yCrianca'])));
          
          
          //$xRobo = 1; 
          //$yRobo = 1;
          //$xCrianca = 1;
         // $yCrianca = 1;
          
          $dados = array(
                          
                          'xRobo' => $xRobo,
                          'yRobo' => $yRobo,
                          'xCrianca' => $xCrianca,
                          'yCrianca' => $yCrianca,
                          'experimentos_idexperimentos' => $Experimento[0]['idExperimento'],
                          'horaPosicao' => time()

                        );
          $resul = $CPosicao->cadastrarPosicao($dados);

          if($resul){
              $error = array('code' => 0,'descricao' => "" );
          }else{
              $error = array('code' => 201,'descricao' => "Erro ao salvar os dados no BD" );
          }

          //buscar ultamento comportamento 
          $Comportamento = $CRegComportamento->obterUltimoRegComportamento();
          if ($Comportamento != null){
            $idRegComportamento = $Comportamento[0]['idRegistroComportamento'];
            $comportamento = $Comportamento[0]['comportamentos_numeroComportamento'];
            $executado =  $Comportamento[0]['executado'];

          }else{
            $comportamento = null;
            $error = array('code' => 'x','descricao' => "Nenhum comportamento encontrado" );
          }

      }else{
        $comportamento = null;
        $error = array('code' => 1,'descricao' => "Erros nos paramentros enviados" );

      }
    }else{
      $comportamento = null;
      $error = array('code' => 101,'descricao' => "Nenhum experimento em andamento" );
    }
  
    $ret = array(
                'idRegComportamento' => $idRegComportamento,
                'comportamento' => $comportamento,
                'executado' => $executado,
                'error' => array($error)

              );
    echo json_encode($ret); 

  ?>
