<?php	
	include('config.php');
	
	
	if (isset($_GET['cc'])){
		if (!empty($_GET['cc'])){
			$chave_cadastro = anti_injection($_GET['cc']);
			$email          = anti_injection($_GET['email']);
			$username       = anti_injection($_GET['usr']);
			
			$checa_chave = pg_query($conn, "SELECT id, email, username, password, status_cadastro FROM users WHERE chave_cadastro = '" . $chave_cadastro . "' AND username = '" . $username . "' LIMIT 1");
			$checa_chave = pg_fetch_array($checa_chave);
			
			if (!empty($checa_chave['id'])){
				if ($checa_chave['status_cadastro'] == 0){
					if ($checa_chave['email'] != $email){
						$sql = "UPDATE users SET email = '" . $email . "', status_cadastro = 1"; 
					} else {
						$sql = "UPDATE users SET status_cadastro = 1";
					}
					
					$sql .= " WHERE id = " . $checa_chave['id'] . " AND chave_cadastro = '" . $chave_cadastro . "'";
					
					$ativa_cadastro = pg_query($conn, $sql);
					
					if ($ativa_cadastro){
						include('emails/cadastro_confirmado.php');
						$msg_email = str_replace(array('{username}', '{senha}'), array($checa_chave['username'], $checa_chave['password']), $cadastroConfirmado);
						
						sendMail($email, $checa_chave['username'], $checa_chave['username'] . ', seu cadastro foi confirmado', $msg_email);
?>
						<script type="text/javascript">
                            //alert('<?php echo $checa_chave['username']; ?>, seu cadastro foi confirmado com sucesso!');
							var redirect = 'confirmacao_cadastro.php?email=<?php echo $checa_chave['email']; ?>&usr=<?php echo $checa_chave['username']; ?>&referer=confirmed';
                            document.location.href=redirect;
                        </script>
<?php
					}
				} elseif ($checa_chave['status_cadastro'] == 1) {
?>
					<script type="text/javascript">
						//alert('<?php echo $checa_chave['username']; ?>, parabéns, seu cadastro já encontra-se ativo!');
						var redirect = 'confirmacao_cadastro.php?email=<?php echo $checa_chave['email']; ?>&usr=<?php echo $checa_chave['username']; ?>&referer=email_ativo';
						document.location.href=redirect;
					</script>
<?php
				}
			} else {
?>
				<script type="text/javascript">
                	//alert('Chave de cadastro inválida!');
					var redirect = 'confirmacao_cadastro.php?cc_invalida=<?php echo $_GET['cc_invalida']; ?>&referer=cc_invalida';
					document.location.href=redirect;
                </script>
<?php
				exit;
			}
		}
	}
	
	
	if (isset($_POST['new_email'])){
		$new_email   = anti_injection($_POST['new_email']);
		$username    = anti_injection($_POST['user_cadastro']);
		$cc_cadastro = anti_injection($_POST['chave_cadastro']);
		$referer     = anti_injection($_POST['referer']);
		
		$checaStatus = pg_query($conn, "SELECT email, username, status_cadastro FROM users WHERE chave_cadastro = '" . $cc_cadastro . "' AND username = '" . $username . "'");
		$checaStatus = pg_fetch_array($checaStatus);
		
		if ($checaStatus['status_cadastro'] == 1){
?>
			<script type="text/javascript">
                var redirect = 'confirmacao_cadastro.php?email=<?php echo $checaStatus['email']; ?>&usr=<?php echo $checaStatus['username']; ?>&referer=email_ativo';
                document.location.href=redirect;
            </script>
<?php
		} else {
			include('emails/reenviar_email_confirmacao.php');	
			$msg_email = str_replace(array('{username}', '{email}', '{chave_cadastro}', '{url_site}'), array($username, $new_email, $chave_cadastro, $url_site), $reenviarEmailConfirmacao);
				
			sendMail($new_email, $username, $username . ', confirme seu cadastro!', $msg_email);
?>
			<script type="text/javascript">
                var redirect = 'confirmacao_cadastro.php?cc_cadastro=<?php echo $cc_cadastro; ?>&email=<?php echo $new_email; ?>&usr=<?php echo $username; ?>&referer=<?php echo $referer; ?>';
                document.location.href=redirect;
            </script>
<?php				
			exit;
		}
	}	
		
	
	include('include_topo.php');
?>

<div id="content" class="container_12">
	<div class="grid_12 alpha omega">
		<div class="prefix_1 grid_10 confirmacao_cadastro">
        	<?php
				if ($_GET['referer'] == 'cadastro'){
			?>
                    <div class="box_successful">
                        <h1>Cadastro realizado com sucesso!</h1>
                    </div>
                    
                    <h2><?php echo ucfirst($_GET['usr']); ?>, seja bem vindo ao Logsexy.</h2>
                    
                    <p>Seu cadastro foi realizado com sucesso, mas você ainda precisa confirmar o seu cadastro. Clique no link de confirmação que foi enviado para o e-mail <span class="italic bold"><?php echo $_GET['email']; ?></span>.</p>
                    
                    <p>Caso não tenha recebido este e-mail em até cinco minutos, você pode solicitar o reenvio abaixo ou solicitar ajuda através da nossa central de suporte aos usuários do Logsexy <a href="#" target="_blank">clicando aqui</a>.</p>
                
                    <p><strong>Lembre-se de verificar as suas pastas de "lixo eletrônico" (Spam). Você também pode adicionar o endereço logsexy.com.br como seguro em sua conta de e-mail para garantir o recebimento das mensagens.</strong></p>
                
                    <p>Desejo reenviar a confirmação para o e-mail:</p>
                    
                    <p>
                        <form action="" method="post">
                        	<input type="hidden" name="chave_cadastro" id="chave_cadastro" value="<?php echo (isset($_GET['cc_cadastro']) ? $_GET['cc_cadastro'] : ''); ?>" />
                            <input type="hidden" name="user_cadastro" id="user_cadastro" value="<?php echo (isset($_GET['usr']) ? $_GET['usr'] : ''); ?>" />
                            <input type="hidden" name="referer" id="referer" value="reenviar_email" />
                            <input type="text" name="new_email" id="new_email" size="50" value="<?php echo (isset($_GET['email']) ? $_GET['email'] : ''); ?>">
                            <input type="submit" class="button green" value="Reenviar email de confirmação" />
                        </form>
                    </p>
            <?php
				}
				
				if ($_GET['referer'] == 'confirmed'){
			?>
            		<div class="box_successful">
                        <h1>Email confirmado com sucesso!</h1>
                    </div>
                    
                    <h2><?php echo ucfirst($_GET['usr']); ?>, definitivamente, seja bem vindo ao Logsexy.</h2>
                    
                    <p>Parabéns, seu cadastro foi confirmado, agora você já pode desfrutar de todos os benefícios que o Logsexy fornece a seus usuários. Digite seu login e senha acima para acessar o seu painel de controle.</p>
                    
                    <p><strong>Edite seu perfil:</strong></p>
                    
                    <p>Acesse o seu painel de controle e edite seu perfil. Usuários com um perfil completo tem mais chances de conseguir um contato com outros usuários.</p>
                    
                    <p>
                        &nbsp; &nbsp; &nbsp; &nbsp; - Informe sobre você, suas características físicas;<br />
                        &nbsp; &nbsp; &nbsp; &nbsp; - Informe sobre sua localização;<br />
                        &nbsp; &nbsp; &nbsp; &nbsp; - Informe seus meios de contato, facebook, MSN, twitter e orkut;<br />
                        &nbsp; &nbsp; &nbsp; &nbsp; - Informe sobre seus interesses, o que você espera encontrar no Logsexy;
                    </p>
                    
                    <p><strong>E claro, adicione suas fotos:</strong></p>
                    
                    <p>Não deixe de registrar seus momentos de prazer, suas "festinhas", aqui no Logsexy está cheio de usuários querendo ver.</p>
            <?php
				}
				
				if ($_GET['referer'] == 'email_ativo'){
			?>
            		<div class="box_successful">
                        <h1>Parabéns, seu cadastro já estava ativo!</h1>
                    </div>
                    
                    <h2><?php echo ucfirst($_GET['usr']); ?>, seu cadastro já encontra-se ativo no Logsexy.</h2>
                    
                    <p>Digite seu login e senha acima para acessar o seu painel de controle.</p>
            <?php	
				}
				
				if ($_GET['referer'] == 'cc_invalida'){
			?>
            		<div class="box_error">
                        <h1>Chave de autenticação inválida!</h1>
                    </div>
                    
                    <h2>Desculpe, mas a chave de autenticação é inválida.</h2>
                    
                    <p>Se você apenas clicou no link enviado em seu email e mesmo assim aparece que a chave de autenticação é inválida, entre em contato com a central de suporte <a href="#">clicando aqui</a>.</p>
            <?php	
				}
				
				if ($_GET['referer'] == 'need_confirm_email'){
			?>
            		<div class="box_notification">
                        <h1><?php echo ucfirst($_GET['user']); ?>, você precisa confirmar o seu cadastro!</h1>
                    </div>
                    
                    <h2>Desculpe, mas seu email ainda não foi confirmado.</h2>
                    
                    <p>Para confirmar seu cadastro, clique no link de confirmação que foi enviado para o e-mail <span class="italic bold"><?php echo $_GET['email']; ?></span>.</p>
                    
                    <p>Caso não tenha recebido este e-mail, você pode solicitar o reenvio abaixo ou solicitar ajuda através da nossa central de suporte aos usuários do Logsexy <a href="#" target="_blank">clicando aqui</a>.</p>
                
                    <p><strong>Lembre-se de verificar as suas pastas de "lixo eletrônico" (Spam). Você também pode adicionar o endereço logsexy.com.br como seguro em sua conta de e-mail para garantir o recebimento das mensagens.</strong></p>
                
                    <p>Desejo reenviar a confirmação para o e-mail:</p>
                    
                    <p>
                        <form action="" method="post">
                        	<input type="hidden" name="chave_cadastro" id="chave_cadastro" value="<?php echo (isset($_GET['cc_enviada']) ? $_GET['cc_enviada'] : ''); ?>" />
                            <input type="hidden" name="user_cadastro" id="user_cadastro" value="<?php echo (isset($_GET['user']) ? $_GET['user'] : ''); ?>" />
                            <input type="hidden" name="referer" id="referer" value="reenviar_email" />
                            <input type="text" name="new_email" id="new_email" size="50" value="<?php echo (isset($_GET['email']) ? $_GET['email'] : ''); ?>">
                            <input type="submit" class="button green" value="Reenviar email de confirmação" />
                        </form>
                    </p>
            <?php	
				}
				
				if ($_GET['referer'] == 'reenviar_email'){
			?>
            		<div class="box_successful">
                        <h1>Email de confirmação reenviado com sucesso!</h1>
                    </div>
                    
                    <h2><?php echo ucfirst($_GET['usr']); ?>, nós reenviamos o email de confirmação.</h2>
                    
                    <p>Seu cadastro foi realizado com sucesso, mas você ainda precisa confirmar o seu cadastro. Clique no link de confirmação que foi reenviado para o e-mail <span class="italic bold"><?php echo $_GET['email']; ?></span>.</p>
                    
                    <p>Caso não tenha recebido este e-mail em até cinco minutos, você pode solicitar o reenvio abaixo ou solicitar ajuda através da nossa central de suporte aos usuários do Logsexy <a href="#" target="_blank">clicando aqui</a>.</p>
                
                    <p><strong>Lembre-se de verificar as suas pastas de "lixo eletrônico" (Spam). Você também pode adicionar o endereço logsexy.com.br como seguro em sua conta de e-mail para garantir o recebimento das mensagens.</strong></p>
                
                    <p>Desejo reenviar a confirmação para o e-mail:</p>
                    
                    <p>
                        <form action="" method="post">
                        	<input type="hidden" name="chave_cadastro" id="chave_cadastro" value="<?php echo (isset($_GET['cc_cadastro']) ? $_GET['cc_cadastro'] : ''); ?>" />
                            <input type="hidden" name="user_cadastro" id="user_cadastro" value="<?php echo (isset($_GET['usr']) ? $_GET['usr'] : ''); ?>" />
                            <input type="hidden" name="referer" id="referer" value="reenviar_email" />
                            <input type="text" name="new_email" id="new_email" size="50" value="<?php echo (isset($_GET['email']) ? $_GET['email'] : ''); ?>">
                            <input type="submit" class="button green" value="Reenviar email de confirmação" />
                        </form>
                    </p>
            <?php	
				}
			?>
        </div>
	</div>
</div>

<?php
	$js_array = array(
		'js/libs/jquery.colorbox-min.js'
	);
	
	$css_array = array(
		'css/colorbox.css'
	);
		
	include('include_footer.php');
?>

<script type="text/javascript">
	/*$(document).ready(function(){
		$('.button').click(function(){
			alert('aqui');
		})
	})*/
</script>