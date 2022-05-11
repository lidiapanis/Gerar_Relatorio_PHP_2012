<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$usuario = $_POST['usuario'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];



//elimina erros na digitação de e-mails
$email = str_replace(" ","",$email);
$email = str_replace("/","",$email);
$email = str_replace("@.","@",$email);
$email = str_replace(".@","@",$email);
$email = str_replace(",",".",$email);
$email = str_replace(";",".",$email);
//variável que informará a ocorrência de erros
$erro = 0;
//verifica se foi digitado o nome

if(empty($nome)){
$erro = 1;
$msg = "Nome não informado";
}
//verifica tamanho mínimo do e-mail e se existe “@” e ponto.
elseif(strlen($email)<8 || substr_count($email, "@")!=1 ||
substr_count($email,".")==0){
$erro = 1;
$msg = "E-mail não foi digitado corretamente";
}
//verifica se o estado foi selecionado
elseif(strlen($telefone)<10){
$erro = 1;
$msg = "Verifique se foi informado o DDD juntamente do telefone";
}
elseif(!is_numeric($telefone)){
$erro = 1;
$msg = "Telefone deve conter apenas numeros";
}

elseif(empty($endereco)){
$erro = 1;
$msg = "Endereço não pode ser vazio!";
}

elseif(strlen($usuario)<5 || strlen($usuario)>15){
$erro = 1;
$msg = "Login deve ter entre 5 e 15 caracteres";
}
//verifica se a senha contém espaços em branco
elseif(strstr($senha1,' ')!=false){
$erro = 1;
$msg = "A senha não deve conter espaços em branco";
}
//compara senha1 e senha2
elseif($senha1 != $senha2){
$erro = 1;
$msg = "Senhas digitadas não conferem";
}
elseif(empty($senha1)){
$erro = 1;
$msg = "Senha não pode ser vazia";
}
if($erro){
	echo "<html><body>";
	echo "<p align='center'>$msg</p>";
	echo "<p align='center'><a href='javascript:history.back()'>Voltar</a></p>";
	echo "</body></html>";
}else{
	include('conectar_funcionario.php');
	$query="insert into funcionario values (null, '$nome' ,'$email','$telefone','$endereco','$usuario','$senha1','$salario');";
	$grava=mysql_query($query);
	$num_linha=mysql_affected_rows();
	if ($num_linha==1){
		echo "<p align='center'>Cadastro Realizado com sucesso!<br><a href='javascript:history.back()'>Voltar</a></p>";
	}else{
		echo"<p align='center'>Não foi possivel cadastrar.<br> <a href='javascript:history.back()'>Voltar</a><br></p>";
	}
	mysql_close($con);
}
?>