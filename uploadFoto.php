<?php

session_start();

// Criação de variaveis
$errors = false;
$target_file = "upload/". basename($_FILES["imagem"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

function save_file($source){
    //O nome que vai ficar no ficheiro, e a path
    if(move_uploaded_file($source,"perfil/fotoPerfil".$_SESSION['username'].".jpg")){
        echo "Imagem de perfil atualizada com sucesso.";
    }else{
        echo "Erro ao fazer upload";
    }
}

// Aceita como formatos da imagem, jpg e png
if($imageFileType != "jpg" && 
   $imageFileType != "png") {
      echo "Apenas ficheiros JPG e PNG são permitidos.";
      $errors = true;
}

//Verifica se o tamanho do ficheiro submetido não é superior a 1mb
if ($_FILES["imagem"]["size"] > 1048576) {
    echo "Ficheiro excede o limite maximo de 1mb.";
    $errors = true;
}

if ($errors == true){
    echo "<p>A redirecionar para a pagina.</p>";
}

// Se não houver errors, vai submeter a imagem
if ($errors == false){
    save_file($_FILES['imagem']['tmp_name']);
}
    // Passado 3 segundos, vai redirecionar o utilizador para a pagina que anteriormente estava
    $url="http://127.0.0.1/projeto/perfil.php?opcao=".$_SESSION['username'];
    header("refresh:3;url=".$url);
    exit;
    
?>