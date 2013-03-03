<?php
	include('config.php');	
	
	
	if (isset($_GET['check_username'])){
		echo valida_username(strtolower($_GET['check_username']));
		exit;
	}
	
	if (isset($_GET['check_email'])){
		echo valida_email(anti_injection(strtolower($_GET['check_email'])));
		exit;
	}
	
	if (isset($_POST['termos_condicoes'])){
		$username      = anti_injection(trim(strtolower($_POST['username'])));
		$password      = anti_injection(trim($_POST['password']));
		$email         = anti_injection(trim(strtolower($_POST['email'])));
		
		if ($valida_username = valida_username($username) != 'ok'){
?>
			<script type="text/javascript">
				alert('<?php echo $valida_username; ?>');
				document.location.href="<?php echo $url_site; ?>cadastro.php";
			</script>
<?php
			exit;
		}
		
		if ($valida_email = valida_email($email) != 'ok'){
?>
			<script type="text/javascript">
				alert('<?php echo $valida_email; ?>');
				document.location.href="<?php echo $url_site; ?>cadastro.php";
			</script>
<?php
			exit;
		}		
		
		$user_folder    = create_dirs($username);
		$chave_cadastro = md5(time());
		
		$sql = "
		INSERT INTO users (
			email,
			username,
			password,
			data_cadastro,
			folder,
			chave_cadastro
		) VALUES (
			'" . $email . "',
			'" . $username . "',
			'" . $password . "',
			'" . date('Y-m-d H:i:s') . "',
			'" . $user_folder . "',
			'" . $chave_cadastro . "'
		)";
				
		$cadastro = pg_query($conn, $sql);
		
		if ($cadastro){
			$userID = getLastIdSeq('users_id_seq');
			pg_query($conn, "INSERT INTO perfil (user_id) VALUES ('" . $userID . "')");
			
			$perfilID = getLastIdSeq('perfil_id_seq');
			pg_query($conn, "INSERT INTO perfil_conjuge (perfil_id) VALUES ('" . $perfilID . "')");
			pg_query($conn, "INSERT INTO perfil_contatos (perfil_id) VALUES ('" . $perfilID . "')");
			pg_query($conn, "INSERT INTO perfil_interesses (perfil_id) VALUES ('" . $perfilID . "')");
			pg_query($conn, "INSERT INTO perfil_localizacao (perfil_id, pais_id, estado_id, cidade_id) VALUES ('" . $perfilID . "', '0', '0', '0')");
			
			include('emails/confirm_cadastro.php');
			$msg_email = str_replace(array('{username}', '{email}', '{chave_cadastro}', '{url_site}'), array($username, $email, $chave_cadastro, $url_site), $confirmCadastro);
			
			sendMail($email, $username, $username . ', confirme seu cadastro!', $msg_email);
?>
			<script type="text/javascript">
                //alert('Cadastro realizado com sucesso!');
				var redirect = 'confirmacao_cadastro.php?cc_cadastro=<?php echo $chave_cadastro; ?>&email=<?php echo $email; ?>&usr=<?php echo $username; ?>&referer=cadastro';
                document.location.href=redirect;
            </script>
<?php				
		}
	}
	
	
	include('include_topo.php');
?>

<div id="content" class="container_12">
	<div class="grid_12 alpha omega">
		<div id="simple_form" class="prefix_2 grid_8">
            <h1>Cadastre-se no LogSexy</h1>
            <p>é fácil, rápido e é GRÁTIS!</p>
            
            <div class="simple_box_form">
                <div class="box_form">
                    <form name="cadastro" id="form_cadastro" action="cadastro.php" method="post">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="label"><label for="cad_username" class="tp10">Usuário:</label></td>
                            <td>
                                <input type="text" name="username" id="cad_username" value="" title="Este será o seu login de acesso e seu endereço no logsexy">
                                <p id="waiting_ckeck_username" class="msg_waiting" style="display:none;"></p>
                                <p id="success_ckeck_username" class="msg_success" style="display:none;"></p>
                                <p id="error_ckeck_username" class="msg_error" style="display:none;"></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label"><label for="cad_email" class="tp10">Email:</label></td>
                            <td>
                            	<input type="text" name="email" id="cad_email" value="" title="Informe um email válido. Será necessário confirmá-lo!">
                                <p id="waiting_ckeck_email" class="msg_waiting" style="display:none;"></p>
                                <p id="success_ckeck_email" class="msg_success" style="display:none;"></p>
                                <p id="error_ckeck_email" class="msg_error" style="display:none;"></p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label"><label for="cad_password" class="tp10">Senha:</label></td>
                            <td><input type="password" name="password" id="cad_password" value="" class="simple_form_pass"></td>
                        </tr>                        
                        
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="checkbox" name="termos_condicoes" id="cad_termos" value="1">
                                <label for="cad_termos">Concordo com os <a href="termos.php" class="cad_termos">temos de uso</a></label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="button" class="btn_green_cadastro" value="Cadastre-se">
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>

<?php
	$js_array = array(
		'js/libs/jquery.tipsy.js',
		'js/libs/jquery.colorbox-min.js'
	);
	
	$css_array = array(
		'css/tipsy.css',
		'css/colorbox.css'
	);
		
	include('include_footer.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cad_username').blur(function(){
			var cad_username = $(this).val();
			if (cad_username != ""){
				$.ajax({
					url: 'cadastro.php?check_username=' + cad_username,
					type: 'get',
					global: false,
					success: function(response){
						$('#waiting_ckeck_username').hide();
						
						if (response == 'ok'){
							$('#error_ckeck_username').hide();
							$('#success_ckeck_username').show().html('Usuário disponível para cadastro!');
						} else {
							$('#success_ckeck_username').hide();
							$('#error_ckeck_username').show().html(response);
						}
					}
				})
			}
		})
		
		$('#cad_email').blur(function(){
			var cad_email = $(this).val();
			if (cad_email != ""){
				if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(cad_email))){
                	alert('Digite um email válido!');
            	} else {
					$('#success_ckeck_email').hide();
					$('#error_ckeck_email').hide();
					$('#waiting_ckeck_email').show().html('Aguarde, verificando disponibilidade!');
					
					$.ajax({
						url: 'cadastro.php?check_email=' + cad_email,
						type: 'get',
						global: false,
						success: function(response){
							$('#waiting_ckeck_email').hide();
							
							if (response == 'ok'){
								$('#error_ckeck_email').hide();
								$('#success_ckeck_email').show().html('Email disponível para cadastro!');
							} else {
								if (response == 'error_1'){
									$('#success_ckeck_email').hide();
									$('#error_ckeck_email').show().html('Email já cadastrado. Por favor, escolha outro!');
								} else if (response == 'error_2'){
									$('#success_ckeck_email').hide();
									$('#error_ckeck_email').show().html('Por favor, informe um email válido!');
								}
							}
						}
					})
				}
			}
		})
		
		$('.btn_green_cadastro').click(function(){
			var username = $('#cad_username').val();
			var password = $('#cad_password').val();
			var email    = $('#cad_email').val();
						
			var alerta = '';			
			
			if (username == '' || username.length <= 3){
				alerta += ' - Digite seu usuario. (Ele deve conter mais de 3 caracteres)';
			}
			
			if (password == '' || password.length <= 3){
				alerta += '\n - Digite sua senha. (Ela deve conter mais de 3 caracteres)';
			}
			
			if (email == ''){
				alerta += '\n - Digite seu email corretamente!';
			}
			
			if (document.getElementById('cad_termos').checked == false){ 
				alerta += '\n - Você precisa concordar com os termos para se cadastrar!';
			}
			
			if (alerta != ''){
				alert(alerta);
			} else {
				$('#form_cadastro').submit();
			}
		})
		
		
	})

	$('#simple_form [title]').tipsy({trigger: 'focus', gravity: 'w'}); // nw | n | ne | w | e | sw | s | se	
	$(".cad_termos").colorbox({iframe:true, width:"960px", height:"400px"});
</script>