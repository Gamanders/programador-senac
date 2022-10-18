<form method="POST" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <button type="submit">Enviar</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $file = $_FILES["arquivo"];           
     // var_dump($file);

    if ($file["error"]) {

        throw new Exception("Error: ".$file["error"]);

    }

    $diretorio = "uploads";
    // Verifica se o diretorio existe
    if (!is_dir($diretorio)) {
        // não existindo cria o diretorio
        mkdir($diretorio);

    }

   //if (move_uploaded_file($file["tmp_name"], $diretorio . DIRECTORY_SEPARATOR . $file["name"])) {
   //if (move_uploaded_file($file["tmp_name"], "uploads/ehoempresario.exe")) {
   $hora = time(); 
   if (move_uploaded_file($file["tmp_name"], $diretorio . DIRECTORY_SEPARATOR . $hora ."_". $file["name"])) {

        echo "Arquivo arribado com sucesso!";

   } else {

        throw new Exception("Não foi possível arribar o arquivo.");

   }

}

?>