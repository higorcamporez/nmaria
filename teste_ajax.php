  <?php
 
    header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title></title>
  </head>
  <body onload="send()">
  <p id='resp'>asdasd</p>
  </body>
</html>

<script type="text/javascript">
    function send() {
        var dados = {
            xRobo: 1,
            yRobo: 2,
            xCrianca: 3,
            yCrianca: 4
        }


        $.ajax({
            url: 'http://nmaria.000webhostapp.com/action/controle.php',
            type: 'post',

            dataType: 'json',

            success: function (data) {
                //$('#target').html(data.msg);
                console.log(data);
                //$('#resp').html(data);
                var obj = JSON.parse(data);
                //console.log(obj.comportamento);
            },
            data: dados
        });
    }
</script>
