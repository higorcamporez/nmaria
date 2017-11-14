  <?php
 
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Origin: *'); 
    
    require_once '../control/ControlCrianca.php';
    
    $CCrianca= new ControlCrianca();
     
  	$Criancas = $CCrianca->obterCriancas();


    echo json_encode($Criancas); 

  ?>
