  <?php
 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Origin: *');  
    
    require_once '../control/ControlTerapeuta.php';
    
    $CCrianca= new ControlTerapeuta();
     
  	$Criancas = $CCrianca->obterTerapeutas();


    echo json_encode($Criancas); 

  ?>
