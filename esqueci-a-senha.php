<?php
	include('config.php');	
	
	
	if (isset($_POST['email'])){
		$email = anti_injection($_POST['email']);
		
		$checaEmail = pg_query($conn, "SELECT email, username, password, status_cadastro, chave_cadastro FROM users WHERE email = '" . $email . "'");
		
		if (pg_num_rows($checaEmail) >= 1){
			$checaEmail = pg_fetch_array($checaEmail);
			
			if ($checaEmail['status_cadastro'] == 1){				
				include('emails/esqueci_a_senha.php');
				$msg_email = str_replace(array('{username}', '{senha}'), array($checaEmail['username'], $checaEmail['password']), $esqueciASenha);
				
				sendMail($email, $checaEmail['username'], $checaEmail['username'] . ', seus dados de acesso', $msg_email);
?>
				<script type="text/javascript">
                	var redirect = "esqueci-a-senha.php?successful=1&user=<?php echo $checaEmail['username']; ?>&email=<?php echo $email; ?>";
					document.location.href=redirect;
                </script>
<?php
			} elseif ($checaEmail['status_cadastro'] == 0){
?>
				<script type="text/javascript">
					var redirect = "confirmacao_cadastro.php?cc_enviada=<?php echo $checaEmail['chave_cadastro']; ?>&user=<?php echo $checaEmail['username']; ?>&email=<?php echo $checaEmail['email']; ?>&referer=need_confirm_email";
					document.location.href=redirect;
				</script>
<?php
			}
		} else {
?>
			<script type="text/javascript">
            	var redirect = "esqueci-a-senha.php?error=1&email=<?php echo $_POST['email']; ?>";
				document.location.href=redirect;
            </script>
<?php
		}
	}
	
	
	include('include_topo.php');
?>

<div id="content" class="container_12">
	<div class="grid_12 alpha omega">
		<div id="simple_form" class="prefix_2 grid_8 confirmacao_cadastro">
            <?php
				if (!isset($error) AND !isset($successful)){
			?>
            		<h1>Esqueceu sua senha?</h1>
           			<p>Digite seu email cadastrado abaixo que nós reenviamos ela pra você!</p>
            
                    <div class="simple_box_form">
                        <div class="box_form">
                            <form id="esqueci-a-senha" action="" method="post">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label"><label for="cad_email" class="tp10">Email:</label></td>
                                    <td>
                                        <input type="text" name="email" id="cad_email" value="" title="Informe seu email cadastrado!">
                                        <p id="waiting_ckeck_email" class="msg_waiting" style="display:none;"></p>
                                        <p id="success_ckeck_email" class="msg_success" style="display:none;"></p>
                                        <p id="error_ckeck_email" class="msg_error" style="display:none;"></p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="submit" class="button green" value="Reenviar minha senha">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
            <?php	
				} else {
					if (isset($_GET['error'])){
						if ($_GET['error'] == 1){ // email não existe
			?>
            				<div class="box_error">
                                <h1>Email não encontrado!</h1>
                            </div>
                            
                            <p>Desculpe, mas o email <span class="italic bold">"<?php echo $_GET['email']; ?>"</span> não foi encontrado.</p>
                            
		                    <p>Caso esteja tendo problemas para recuperar sua senha, você pode entrar em contato através da nossa central de suporte <a href="#">clicando aqui</a>.</p>
                            
                            <p>
                            	<a href="esqueci-a-senha.php" class="button green">Tentar novamente</a>
                            </p>
            <?php
						}
					} else if(isset($_GET['successful'])){
			?>
            			<div class="box_successful">
                            <h1>Email enviado com sucesso!</h1>
                        </div>
                        
                        <p><?php echo ucfirst($_GET['user']); ?>, seus dados de acesso foram enviados com sucesso para o email <span class="italic bold">"<?php echo $_GET['email']; ?>"</span>.</p>
                        
                        <p>Digite seu usuário e senha acima para acessar seu painel de controle.</p>
            <?php
					}
				}
			?>            
        </div>
	</div>
</div>

<?php
	include('include_footer.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.button').click(function(){
			var email = $('#cad_email').val();
			
			if (email == ''){
				$('p.announcement').html('Digite seu email corretamente!');
				$('div.announcement-message').slideDown();				
				return false;
			} else {
				$('form#esqueci-a-senha').submit();
			}
		})
	})
</script>