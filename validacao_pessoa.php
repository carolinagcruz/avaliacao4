<?php

function validaPessoa($nome, $cpf, $nascimento, $sexo, $estado, $telefone, $observacoes){

    $formValido = true;
    
$nome = trim($nome);
if(empty($nome)){
    echo "Por favor preencha o campo nome!<br>";
    $formValido = false;
}
else if(!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔóÓòÒúÚùÙçÇ\s]+$/", $nome)){
    echo "Formato inválido para o campo nome!<br>";
    $formValido = false;
}

$cpf = trim($cpf);
if(empty($cpf)){
    echo "Por favor preencha o campo cpf!<br>";
    $formValido = false;
}
else if(!preg_match("/^\d{3}\\.\d{3}\\.\d{3}\\-\d{2}$/", $cpf)){
    echo "Formato inválido para o campo cpf!<br>";
    $formValido = false;
}

$nascimento = trim($nascimento);
if(empty($nascimento)){
    echo "Por favor preencha o campo data de nascimento!<br>";
    $formValido = false;
}
else if(!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/",$nascimento)){
    echo "Formato inválido para o campo data de nascimento!<br>";
    $formValido = false;
}
else{
    $pedacos = explode('/', $nascimento);
    $dia = $pedacos[0];
    $mes = $pedacos[1];
    $ano = $pedacos[2];
    
    if(!checkdate($mes, $dia, $ano)){
        echo "Data inválida!<br>";
        $formValido = false;
    }
    else{
        $nascimentoYmd = $ano.$mes.$dia;
        $nascimentoAtual = date ('Ymd');
        
        if($nascimentoAtual < $nascimentoYmd){
            echo "É no futuro!<br>";
            $formValido = false;
        }
    }
}



if($sexo == null){
    echo "selecione uma opção para o campo sexo!";
    $formValido = false;
}



if($estado == -1){
    echo "Selecione uma opção para o campo estado!<br>";
    $formValido = false;   
}


$telefone = trim($telefone);
if(empty($telefone)){
    echo "Por favor preencha o campo telefone!<br>";
    $formValido = false;
}
else if(!preg_match("/^(\d{3}\s)?\d{4}-\d{4}$/", $telefone)){
    echo "Formato inválido para o campo telefone!<br>";
    $formValido = false;
}



$observacoes = trim($observacoes);
if(empty($observacoes)){
    echo "Por favor preencha o campo observações!<br>";
    $formValido = false;
}
else if(!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔóÓòÒúÚùÙçÇ\s\\.\\,]+$/", $observacoes)){
    echo "Formato inválido para o campo observações!<br>";
    $formValido = false;
}
  
  
    
    return $formValido;
}




?>
