<?php
	session_start();
	
	include('databases.php');
	
	$url_site = 'http://localhost/logsexy/';

	$config['genders'] = array(
		1 => 'Homem',
		2 => 'Mulher',
		3 => 'Transex',
		4 => 'Casal (Ele/Ela)',
		5 => 'Casal (Ele/Ele)',
		6 => 'Casal (Ela/Ela)',
	);
	
	$config['estadoCivil'] = array(
		1 => 'Sem resposta',
		2 => 'Solteiro',
		3 => 'Namorando',
		4 => 'Casado',
		5 => 'Separado',
		6 => 'Liberal'
	);
	
	$config['etnia'] = array(
		1 => 'Sem resposta',
		2 => 'Branco(a)',
		3 => 'Negro(a)',
		4 => 'Oriental',
		5 => 'Indígina'
	);
	
	$config['cabelosCor'] = array(
		1 => 'Sem resposta',
		2 => 'Castanhos',
		3 => 'Pretos',
		4 => 'Ruivos',
		5 => 'Loiros',
		6 => 'Grisalhos',
		7 => 'Outros'
	);
	
	$config['cabelosTipo'] = array(
		1 => 'Sem resposta',
		2 => 'Lisos',
		3 => 'Curtos',
		4 => 'Compridos',
		5 => 'Cacheados',
		6 => 'Enrrolados',
		7 => 'Ondulados',
		8 => 'Raspados',
		9 => 'Careca'
	);
	
	$config['olhosCor'] = array(
		1 => 'Sem resposta',
		2 => 'Castanhos',
		3 => 'Pretos',
		4 => 'Verdes',
		5 => 'Azuis'
	);
	
	$config['olhosTipo'] = array(
		1 => 'Sem resposta',
		2 => 'Grandes',
		3 => 'Puchados',
		4 => 'Tristes',
		5 => 'Brilhantes',
		6 => 'Penetrantes'
	);
	
	$config['tiposFisico'] = array(
		1 => 'Sem resposta',
		2 => 'Magro',
		3 => 'Normal',
		4 => 'Atlético',
		5 => 'Acima do peso',
		6 => 'Obeso'
	);
	
	$config['fuma'] = array(
		1 => 'Sem resposta',
		2 => 'Sim',
		3 => 'Não',
		4 => 'Ocasionalmente',
		5 => 'Socialmente'
	);
	
	$config['bebe'] = array(
		1 => 'Sem resposta',
		2 => 'Sim',
		3 => 'Não',
		4 => 'Ocasionalmente',
		5 => 'Socialmente'
	);
	
	$config['orientacaoSexual'] = array(
		1 => 'Sem resposta',
		2 => 'Heterosexual',
		3 => 'Bissexual',
		4 => 'Homossexual'
	);
	
	$config['interessesRelacionamentos'] = array(
		1 => 'Sexo virtual',
		2 => 'Sexo a dois',
		3 => 'Swing',
		4 => 'Sexo em grupo',
		5 => 'Relacionamento discreto',
		6 => 'Apenas amizade'
	);
	
	$config['privacidadeContatos'] = array(
		1 => 'Visível para todos',
		2 => 'Ninguém',
		3 => 'Apenas amigos',
		4 => 'Apenas favoritos',
		5 => 'Amigos e favoritos'
	);
		
	$config['mesesDoAno'] = array(
		'01' => 'Janeiro',
		'02' => 'Fevereiro',
		'03' => 'Março',
		'04' => 'Abril',
		'05' => 'Maio',
		'06' => 'Junho',
		'07' => 'Julho',
		'08' => 'Agosto',
		'09' => 'Setembro',
		'10' => 'Outubro',
		'11' => 'Novembro',
		'12' => 'Dezembro',
	);
		
	$config['estadosBrasil'] = array(
		26 => 'Acre',
		14 => 'Alagoas',
		22 => 'Amapá',
		23 => 'Amazonas',
		9  => 'Bahia',
		19 => 'Ceará',
		5  => 'Distrito Federal',
		3  => 'Espírito Santo',
		10 => 'Goiás',
		20 => 'Maranhão',
		12 => 'Mato Grosso',
		6  => 'Mato Grosso do Sul',
		4  => 'Minas Gerais',
		24 => 'Pará',
		15 => 'Paraíba',
		7  => 'Paraná',
		16 => 'Pernambuco',
		17 => 'Piauí',
		1  => 'Rio de Janeiro',
		21 => 'Rio Grande do Norte',
		11 => 'Rio Grande do Sul',
		25 => 'Rondônia',
		27 => 'Roraima',
		8  => 'Santa Catarina',
		2  => 'São Paulo',
		13 => 'Sergipe',
		18 => 'Tocantins',
	);
	
	
	$config['pathFotos'] = array(
		'avatar' => 'uploads/avatar/',
	);
	
	
	$config['thumbSize'] = array(
		'width' => 130,
		'height' => 110
	);
		
	$reserved_usernames = array(
		'logsexy', 'book', 'sex', 'images', 'temp', 'data', 'pedofilia', 'puberdade', 'crime',
		'pedofilo', 'abuso', 'estupro', 'estuprador', 'efebofilia', 'crianca', 'criancas', 'pederastia',
		'infancia', 'bebe', 'nenem', 'admin', 'adm', 'administrador', 'administrator', 'administracao',
		'moderador', 'moderadora', 'sexmessenger', 'administradores', 'superadmin', 'super_admin',
		'children', 'pedophilia', 'infantil', 'contato', 'denuncia', 'lolicon', 'info', 'violencia',
		'morte', 'informacoes', 'assassino', 'static', 'modules', 'application', 'sql', 'drop', 'table',
		'insert', 'update', 'delete', 'select', 'system', 'criancinha', 'criancinhas', 'script', 'language',
		'javascript'
	);
	
	
	$emails = array(
		'confirm_cadastro' => 'Olá {username}, seja bem vindo ao logsexy!<br>
			Seu cadastro foi realizado com sucesso, agora você só precisa confirmar que recebeu este email, para isso, basta clicar no link abaixo!<br><br>
			<a href="' . $url_site . 'confirmacao_cadastro.php?cc={chave_cadastro}&email={email}&usr={username}">{username}, clique aqui para confirmar seu cadastro</a><br><br>
			Atenciosamente,<br>Central de ralacionamentos do logsexy.com.br',
			
		'cadastro_confirmado' => 'Olá {username}, parabéns, seu cadastro foi confirmado e ativado com sucesso!<br> 
			Agora você já pode acessar o logsexy com seu usuário e senha abaixo:<br><br>
			Usuário: {username}<br>
			Senha: {senha}<br><br>
			Atenciosamente,<br>Central de ralacionamentos do logsexy.com.br',
		
		'reenviar_email_confirmacao' => 'Olá {username}, estamos reenviando para você o email para confirmação do cadastro!<br>
			Seu cadastro foi realizado com sucesso, agora você só precisa confirmar que recebeu este email, para isso, basta clicar no link abaixo!<br><br>
			<a href="' . $url_site . 'confirmacao_cadastro.php?cc={chave_cadastro}&email={email}&usr={username}">{username}, clique aqui para confirmar seu cadastro</a><br><br>
			Atenciosamente,<br>Central de ralacionamentos do logsexy.com.br',
			
		'esqueci_a_senha' => 'Olá {username}, abaixo segue seus dados de acesso ao <a href="http://www.logsexy.com.br">Logsexy.com.br</a><br><br>
			Usuário: {username}<br>
			Senha: {senha}<br><br>
			Atenciosamente,<br>Central de ralacionamentos do logsexy.com.br',
	);
	
	
	include('main_functions.php');

?>