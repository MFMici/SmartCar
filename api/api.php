<?php

header('Content-Type: text/html; charset=utf-8');
// se existirem os parâmetros todos, então atualiza os ficheiros

//para o método POST
if($_SERVER['REQUEST_METHOD'] == "POST"){

 if(isset($_POST['valor']) && isset($_POST['nome']) && isset($_POST['hora']) && isset($_POST['pass'])){ 
 if($_POST['pass']=="ae123"){
  echo file_put_contents("files/".$_POST['nome']."/valor.txt",$_POST['valor']);
  echo file_put_contents("files/".$_POST['nome']."/hora.txt",$_POST['hora']);
  echo file_put_contents("files/".$_POST['nome']."/log.txt",$_POST['hora'].";".$_POST['valor']."|".PHP_EOL, FILE_APPEND);
}else{
  echo "Parâmetro 'pass' inválido";
}
}else{
  echo "Falta de parâmetros";
}

}
//para o método GET
elseif($_SERVER['REQUEST_METHOD'] == "GET"){
  if(isset($_GET['nome'])){

    if((file_get_contents("files/".$_GET['nome']."/valor.txt"))==null){
      http_response_code(400);
    }else{
     http_response_code(200);
     echo file_get_contents("files/".$_GET['nome']."/valor.txt");
   }
 }
 else{
  http_response_code(403);
  echo "faltam parametros no GET";
}
}
else //se o método existente não for nem o GET, nem o POST
{
 echo "Método não permitido";
}

?>