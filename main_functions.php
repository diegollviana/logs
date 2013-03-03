<?php
	//função para remover palavras que contenhas termos sql
	function anti_injection($sql){
		// remove palavras que contenham sintaxe sql
		//$sql = preg_replace("/(select|Select|SELECT|union|Union|UNION|insert|Insert|INSERT|delete|Delete|DELETE|where|drop|Drop|DROP|drop table|show tables|--|\\\\)/i","",$sql);
		$sql = str_ireplace(array('select', 'union', 'insert', 'delete', 'where', 'drop', 'drop table', 'show tables', '--'), '', $sql);
		$sql = trim($sql);//limpa espaços vazio
		$sql = strip_tags($sql);//tira tags html e php
		$sql = addslashes($sql);//Adiciona barras invertidas a uma string
		return $sql;
	}
	
	
	
	function valida_username($username){
		global $reserved_usernames;
		global $conn;
		
		if (strlen($username) < 3){
			return 'Seu usuário deve ter 3 ou mais caracteres!';
		}
		
		if (strlen($username) > 20){
			return 'Seu usuário deve ter até 20 caracteres!';
		}
		
		if (array_search($username, $reserved_usernames) === false){			
			foreach($reserved_usernames as $usernames_reservados):
				if (strpos($username, $usernames_reservados) !== false){
					return 'Login indisponível. Por favor, escolha outro!';
				}
			endforeach;
			
			if (!eregi("[^a-z^0-9^_]", $username) == FALSE){
				return 'Por favor digite apenas letras, n&uacute;meros ou _.';
			}
						
			$count_username = pg_query($conn, "SELECT COUNT(*) as COUNT FROM users WHERE username = '" . $username . "'");
			$count_username = pg_fetch_array($count_username);
			
			if ($count_username['count'] == 0){
				return 'ok';
			} elseif($count_username['count'] >= 1){
				return 'Usuário já cadastrado. Por favor, escolha outro!';
			}
		} else {
			return 'Login indisponível. Por favor, escolha outro!';
		}
	}
	
	
	function valida_email($email){
		global $conn;
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			$count_email = pg_query($conn, "SELECT COUNT(*) as COUNT FROM users WHERE email = '" . $email . "'");
			$count_email = pg_fetch_array($count_email);
			
			if ($count_email['count'] == 0){
				return 'ok';
			} elseif($count_email['count'] >= 1){
				return 'error_1';
			}
		} else {
			return 'error_2';
		}
	}
	
	
	function create_dirs($username){
		$dir = substr($username, 0, 1);

		$allow_dirs = array(1  => 'a', 2  => 'b', 3  => 'c', 4  => 'd', 5  => 'e', 6  => 'f', 7  => 'g', 8  => 'h', 9  => 'i', 10 => 'j',
		11 => 'k', 12 => 'l', 13 => 'm', 14 => 'n', 15 => 'o', 16 => 'p', 17 => 'q', 18 => 'r', 19 => 's', 20 => 't',
		21 => 'u', 22 => 'v', 23 => 'x', 24 => 'w', 25 => 'y',	26 => 'z'
		);

		if (!array_search($dir, $allow_dirs)){
			$dir = 'nodir';
		}
			
		$mes = str_replace('0', '', date('m'));

		$main_path = 'uploads';
		
		if (is_dir($main_path . '/avatar/' . $dir) == false){
			$create_dir_letter = mkdir($main_path . '/avatar/' . $dir, 0777);
		}
		
		if (is_dir($main_path . '/avatar/' . $dir . '/' . $mes) == false){			
			$create_dir_mes = mkdir($main_path . '/avatar/' . $dir . '/' . $mes, 0777);
		}

		if (is_dir($main_path . '/photos/' . $dir) == false){
			$create_dir_letter = mkdir($main_path . '/photos/' . $dir, 0777);
		}
		
		if (is_dir($main_path . '/photos/' . $dir . '/' . $mes) == false){
			$create_dir_mes = mkdir($main_path . '/photos/' . $dir . '/' . $mes, 0777);
		}

		if (is_dir($main_path . '/videos/' . $dir) == false){
			$create_dir_letter = mkdir($main_path . '/videos/' . $dir, 0777);
		}
		
		if (is_dir($main_path . '/videos/' . $dir . '/' . $mes) == false){
			$create_dir_mes = mkdir($main_path . '/videos/' . $dir . '/' . $mes, 0777);
		}

		return $dir . '/' . $mes;

	}
	
	
	function sendMail($to, $name = '', $subject, $email){		
		require('class/phpmailer/class.phpmailer.php');		
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Username = "dieglopviana@gmail.com";
		$mail->Password = "130saldanha";
		$mail->From = "contato@logsexy.com.br";
		$mail->FromName = "LogSexy";
		$mail->AddAddress($to, $name);
		$mail->IsHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $email;
		
		if ($mail->Send()){
			return true;
		} else {
			return false;
		}
	}
	
	
	function enc_convert($str,$ky=''){
		if ($ky == ''){
			return $str;
		}
		
		$ky = str_replace(chr(32), '', $ky);
		
		if (strlen($ky) < 8){
			exit('key error');
		}
		
		$kl = strlen($ky) < 32 ? strlen($ky) : 32;
		
		$k = array();
		
		for($i = 0; $i < $kl; $i++){
			$k[$i] = ord($ky{$i})&0x1F;
		}
		
		$j = 0;
		
		for($i = 0; $i < strlen($str); $i++){
			$e = ord($str{$i});
			$str{$i} = $e&0xE0 ? chr($e^$k[$j]) : chr($e);
			$j++;
			$j = $j == $kl ? 0: $j;
		}
		
		return $str;
	}
	
	
	function getLastIdSeq($seqName){
		 global $conn;
		 
		 $resultSet = pg_query($conn, "SELECT last_value FROM " . $seqName);
		 $result    = pg_fetch_row($resultSet, 0);
		 
		 return $result[0];
	}

	
	/* 
	 * Função para verificar se o perfil do usuario já foi criado
	 *
	 * @param $user_id - Código do usuário na tabela users
	 * @return ID do perfil
	 */
	function getPerfilID($user_id){
		global $conn;
		
		$result = pg_query($conn, "SELECT id FROM perfil WHERE user_id = " . $user_id);
		$result = pg_fetch_array($result);
		
		return (!empty($result['id'])) ? $result['id'] : 0;
	}
	
	
	/* 
	 * Função para verificar se o perfil do conjuge de um usuario já foi criado
	 *
	 * @param $perfil_id - Código do perfil do usuário na tabela perfil
	 * @return ID do perfil do conjuge
	 */
	function getPerfilConjugeID($perfil_id){
		global $conn;
		
		$result = pg_query($conn, "SELECT id FROM perfil_conjuge WHERE perfil_id = " . $perfil_id);
		$result = pg_fetch_array($result);
		
		return (!empty($result['id'])) ? $result['id'] : 0;
	}
	
	
	/* 
	 * Função para pegar os dados de um determinado perfil
	 *
	 * @param $user_id - Código do usuario na tabela users
	 * @return array com as informações do perfil
	 */
	function getPerfil($user_id){
		global $conn;
		
		$resultSetPerfil  = pg_query($conn, "SELECT * FROM perfil WHERE user_id = " . $user_id);
		$perfil['perfil'] = pg_fetch_array($resultSetPerfil);
		
		if ($perfil['perfil']['genero'] > 3){
			$resultSetPerfilConjuge  = pg_query($conn, "SELECT * FROM perfil_conjuge WHERE perfil_id = " . $perfil['perfil']['id']);
			$perfil['perfilConjuge'] = pg_fetch_array($resultSetPerfilConjuge);
		}
		
		$resultSetPerfilLocalizacao  = pg_query($conn, "SELECT * FROM perfil_localizacao WHERE perfil_id = " . $perfil['perfil']['id']);
		$perfil['perfilLocalizacao'] = pg_fetch_array($resultSetPerfilLocalizacao);
		
		$resultSetPerfilContatos     = pg_query($conn, "SELECT * FROM perfil_contatos WHERE perfil_id = " . $perfil['perfil']['id']);
		$perfil['perfilContatos']    = pg_fetch_array($resultSetPerfilContatos);
		
		$resultSetPerfilInteresses   = pg_query($conn, "SELECT * FROM perfil_interesses WHERE perfil_id = " . $perfil['perfil']['id']);
		$perfil['perfilInteresses']  = pg_fetch_array($resultSetPerfilInteresses);
		
		return $perfil;
	}
	
	
	function getLocalizacaoCidade($cidadeID){
		global $conn;
		
		$sql = "
		SELECT c.cidade, e.estado, e.sigla, p.pais
		FROM cidades c
		LEFT JOIN estados e ON (c.estado_id = e.id)
		LEFT JOIN paises p ON (e.pais_id = p.id)
		WHERE c.id = " . $cidadeID;
		
		$resultSet = pg_query($conn, $sql);
		
		if (pg_num_rows($resultSet) >= 1){
			return pg_fetch_array($resultSet);
		} else {
			return '';
		}
	}
	
	
	function getLocalizacaoEstado($estadoID){
		global $conn;
		
		$sql = "
		SELECT e.estado, e.sigla, p.pais
		FROM estados e
		LEFT JOIN paises p ON (e.pais_id = p.id)
		WHERE e.id = " . $estadoID;
		
		$resultSet = pg_query($conn, $sql);
		
		if (pg_num_rows($resultSet) >= 1){
			return pg_fetch_array($resultSet);
		} else {
			return '';
		}
	}
	
	
	function getLocalizacaoPais($paisID){
		global $conn;
		
		$sql = "SELECT pais FROM paises WHERE id = " . $paisID;
		
		$resultSet = pg_query($conn, $sql);
		
		if (pg_num_rows($resultSet) >= 1){
			return pg_fetch_array($resultSet);
		} else {
			return '';
		}
	}
	
	
	function getIdade($dataNasc){
		global $conn;
		
		if (!empty($dataNasc) AND $dataNasc != '1900-01-01'){
			$resultSet = pg_query($conn, "SELECT date_part('year', age(CURRENT_DATE, '" . $dataNasc . "')) AS idade");
			$result = pg_fetch_array($resultSet);
			
			return $result['idade'] . ' anos (' . strftime('%d/%m/%Y', strtotime($dataNasc)) . ')';
		} else {
			return 'sem resposta';
		}
	}
	
	
	/**
	 * Funcao responsavel por exibir o caminho do avatar do usuario.
	 * @param: $userID - Codigo do usuario
	 * @return: Caminho do avatar do usuario ou o avatar default.
	 */
	function pathAvatar($userID){
		global $conn;
		global $config;
		
		$resultSet = pg_query($conn, "SELECT username, avatar, folder FROM users WHERE id = " . $userID);
		
		if (pg_num_rows($resultSet) >= 1){
			$result = pg_fetch_array($resultSet);
			
			if (!empty($result['avatar'])){
				return $config['pathFotos']['avatar'] . $result['folder'] . '/' . $result['avatar'];
			} else {
				return 'i/no_avatar.jpg';
			}
		} else {
			return 'i/no_avatar.jpg';
		}
	}
	
	
	/**
	 * Verifica o status da conta do usuario, bloqueada ou desbloqueada
	 * @param: $userID - Codigo do usuario
	 * @return: Status da conta, 0 => desbloqueada, 1 => bloqueada
	 */
	function statusConta($userID){
		global $conn;
		
		$resultSet = pg_query($conn, "SELECT id, bloqueado FROM users WHERE id = " . $userID);
		$result = pg_fetch_array($resultSet);
			
		return $result['bloqueado'];
	}
?>