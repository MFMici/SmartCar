<?php


header('Content-Type: text/html; charset=utf-8');

// Requer um POST do servidor
if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_FILES['imagem'])){

        //print_r($_FILES['imagem']); mostra os valores todos numa linha
        // Apresenta o nome, tamanho, e o tipo da imagem.
        echo "<br>".$_FILES['imagem']['name'];
        echo "<br>".$_FILES['imagem']['size'];
        echo "<br>".$_FILES['imagem']['type']."<br>";
        

        // Inicia-se a variavel a 0, e guarda todas as fotos no diretorio uploads
        $directory = "uploads/";
        $filecount = 0;
        $files = glob($directory . "*"); //ver o que faz este glob
        if ($files){
            $filecount = count($files);
        }
        // Faz upload da imagem submetida para o diretorio uploads com o nome de webcam + "contador".jpg
        if(move_uploaded_file($_FILES['imagem']['tmp_name'],"uploads/webcam".$filecount.".jpg")){
            echo "Imagem descarregada com sucesso";
        }else{
            echo "Erro ao fazer upload";
        }

    }else{
     echo "ERROR: Imagem não encontrada";
 }
// Se não receber um metodo POST vai mandar mensagem de erro.
}else{
    echo(http_response_code(403));
    echo "Método POST não encontrado";
}
?>