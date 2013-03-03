<?php
	include('config.php');
	
	if (isset($_GET['login']) AND isset($_GET['senha'])){
		$login = anti_injection(trim($_GET['login']));
		$senha = anti_injection(trim($_GET['senha']));
		
		$checa_login = pg_query($conn, "SELECT * FROM users WHERE username = '" . $login . "' AND deleted = 0 LIMIT 1");
		
		if (pg_num_rows($checa_login) == 1){
			$checa_login = pg_fetch_array($checa_login);
			
			$userIP = $_SERVER['REMOTE_ADDR'];
			
			pg_query($conn, "UPDATE users SET last_login = '" . date('Y-m-d H:i:s') . "', last_login_ip = '" . $userIP . "' WHERE id = " . $checa_login['id']);
			
			if (strcasecmp($senha, $checa_login['password']) == 0){
				if ($checa_login['bloqueado'] == 0){
					if ($checa_login['status_cadastro'] == 1){
						$_SESSION['user_id']         = $checa_login['id'];
						$_SESSION['email']           = $checa_login['email'];
						$_SESSION['username']        = $checa_login['username'];
						$_SESSION['status_cadastro'] = $checa_login['status_cadastro'];
						$_SESSION['assinante']       = $checa_login['assinante'];
						$_SESSION['status_online']   = $checa_login['status_online'];
						$_SESSION['avatar']          = $checa_login['avatar'];
						$_SESSION['folder']          = $checa_login['folder'];
						$_SESSION['is_logged']       = 1;
						$_SESSION['last_login_ip']   = $userIP;
						
						if ($checa_login['assinante'] == 1){
?>
                            <div id="box_logged">
                                <img src="<?php echo str_replace('.jpg', '_50x50.jpg', pathAvatar($_SESSION['user_id'])); ?>" class="photo_logged" width="50" height="50">
                                
                                <div class="menu_logged">
                                    <a href="#" class="logged_login">
                                        <?php
                                            if ($_SESSION['assinante'] == 1){
                                        ?>
                                                <img src="i/icons/star13x13.png" title="você é um usuário assinante" alt="" class="star mr5">
                                        <?php 
                                            }
                                            echo $_SESSION['username']; 
                                        ?>
                                    </a>
                                    
                                    <ul>
                                        <li><a href="#">Meu booksex</a></li>
                                        <li><a href="perfil.php?pf=<?php echo $_SESSION['username']; ?>">Meu Perfil</a></li>
                                        <li><a href="#">Recados(1000)</a></li>
                                        <li><a href="painel.php">Painel de controle</a></li>
                                        <li><a href="logout.php">Sair</a></li>
                                    </ul>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
<?php
							exit;
						} else {
							echo 'error_005'; // nao assinante, redirecionar para o painel
							exit;
						}
					} elseif ($checa_login['status_cadastro'] == 0){
						echo 'error_004;' . $checa_login['username'] . ';' . $checa_login['email'] . ';' . $checa_login['chave_cadastro']; // confirmcao de cadastro
						exit;
					}
				} else {
					echo 'error_003'; // login bloqueado
					exit;
				}
			} else {
				echo 'error_001'; // usuario ou senha invalidos.
				exit;
			}
		} else {
			echo 'error_001'; // usuario ou senha invalidos.
			exit;
		}		
	} else {
		echo 'error_002'; // usuario ou senha em branco
		exit;
	}
?>