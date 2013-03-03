<?php
	include('config.php');
	
	
	// ALTERAR SENHA
	if (isset($_POST['new_pass']) AND isset($_POST['new_pass_confirm'])){
		$newPass        = anti_injection($_POST['new_pass']);
		$newPassConfirm = anti_injection($_POST['new_pass_confirm']);
		
		if ($newPass == ''){
			echo 'Digite sua nova senha!';
			exit;
		}
		
		if ($newPass != $newPassConfirm){
			echo 'As senhas estão diferentes!';
			exit;
		}
		
		$resultSet = pg_query($conn, "UPDATE users SET password = '" . $newPass . "' WHERE id = " . $_SESSION['user_id']);
		
		if ($resultSet){
			echo 'ok';
			exit;
		} else {
			echo 'Ocorreu um erro e sua senha não pode ser alterada. Por favor, tente novamente!';
			exit;
		}
	}
	
	
	// BLOQUEAR OU DESBLOQUEAR CONTA
	if (isset($_POST['opcaoBloqueio'])){
		if ($_POST['opcaoBloqueio'] == 'bloquear_conta'){
			$opcao = 1;
			$opc   = 'bloqueada';
		} else {
			$opcao = 0;
			$opc   = 'desbloqueada';
		}
		
		$resultSet = pg_query($conn, "UPDATE users SET bloqueado = " . $opcao . " WHERE id = " . $_SESSION['user_id']);
		
		if ($resultSet){
			$retorno['status'] = 'ok';
			$retorno['msg']    = 'Conta ' . $opc . ' com sucesso!';
		} else {
			$retorno['status'] = 'error';
			$retorno['msg']    = 'Conta ' . $opc . ' com sucesso!';
		}
		
		echo json_encode($retorno);
		exit;
	}
	
	
	//EXCLUIR CONTA
	if (isset($_POST['excluir_minha_conta'])){
		$_SESSION['excluir_minha_conta'] = (!empty($_POST['motivo_exclusao']) ? anti_injection($_POST['motivo_exclusao']) : '');
		echo json_encode(array('status' => 'ok'));
		exit;
	}
	
	
	
	include('include_topo.php');
?>


<div id="content" class="container_12">
    <div class="grid_12 alpha omega">
        <div id="content_panel">
            <?php include('painel_left.php'); ?>
            
            <div id="content_main" class="grid_9 alpha omega">
        		<div id="content_center" class="grid_6 alpha omega" style="width:470px;">
                    <div class="title_bar">
                        <h3>Minha conta</h3>
                    </div>
                    
                    <div class="tabs_wrap_painel" style="position: relative;">
                        <div class="editar_perfil_tabs">
                            <ul class="tabs_painel">
                                <li class="current"><a href="#minha_senha">Minha senha</a></li>
                                <li><a href="#bloqueio">Bloqueio</a></li>
                                <li><a href="#excluir">Excluir</a></li>
                            </ul>
                            
                            <div class="clear"></div>
                        </div>
                        
                        <div id="minha_senha" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Trocar minha senha</span>
                            </div>
                            
                            <div class="painel_simple_form">
                                <div class="painel_simple_box_form">
                                    <div class="painel_box_form">
                                        <form method="post" id="trocar_senha">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="label"><label for="new_pass">Nova senha:</label></td>
                                                    <td><input type="password" name="new_pass" id="new_pass" value="" class="simple_form_pass"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="new_pass_confirm">Confirme a senha:</label></td>
                                                    <td><input type="password" name="new_pass_confirm" id="new_pass_confirm" value="" class="simple_form_pass"></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="submit" class="button green" value="Trocar senha">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="bloqueio" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Bloquear / Desbloquear conta</span>
                            </div>
                            
                            <div class="bloqueio_conta">
                                <div class="atencao_bloqueio">
                                    <p>Caso necessite bloquear sua conta você pode utilizar a opção abaixo. Bloqueando sua conta, nem seu perfil, nem seu booksex poderão ser acessados. Você também não será mais listado na busca. O booksex garante que suas fotos e comentários permanecerão armazenados pelos próximos 30 dias ao bloqueio de sua conta. Após este período, suas fotos poderão ser excluidas do booksex. Bloquear sua conta não irá restituir dias de associação caso você seja um assinante do booksex. A qualquer momento, você poderá entrar com seu login e senha, acessar a opção "Minha Conta" no seu Painel de Controle, e reativar sua conta. </p>
                                    <div class="botao_bloquear_conta">
                                        <?php
											$statusConta = statusConta($_SESSION['user_id']);
											
											if ($statusConta == 0){
										?>
                                        		<input type="button" class="button green bloquear_desbloquear" id="bloquear_conta" value="Bloquear conta">
                                        <?php	
											} else {
										?>
                                        		<input type="button" class="button green bloquear_desbloquear" id="desbloquear_conta" value="Desbloquear conta">
                                        <?php	
											}
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="excluir" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Excluir minha conta</span>
                            </div>
                            
                            <div class="excluir_conta">
                                <div class="atencao_excluir_conta">
                                    <p>Antes de solicitar a exclusão da sua conta, verifique a possibilidade de apenas bloqueá-la. Seu booksex e seu perfil não serão mais acessíveis e você poderá manter sua conta bloqueada por tempo indeterminado. Lembre-se, caso você exclua sua conta, perderá todas as suas fotos bem como todos os comentários, amigos, favoritos e todas as opções do seu booksex. Você também perderá direto sobre o endereço do seu booksex e não poderá reativar ou recuperar esta conta. Caso realmente queira excluir sua conta, siga as instruções abaixo:</p>
                                </div>
                            </div>
                            
                            <div class="box_form_excluir_conta">
                            	<form method="post" id="excluir_conta">
                                    <p class="pergunta"><strong>Deseja mesmo excluir sua conta?</strong></p>
                                    <p><label for="excluir_minha_conta"><input type="checkbox" name="excluir_minha_conta" id="excluir_minha_conta" value="1"> Sim, desejo excluir minha conta</label></p>
                                    
                                    <p class="pergunta"><strong>Está ciente de que irá perder todas as informações relacionadas ao seu perfil?</strong></p>
                                    <p><label for="confirma_excluir_conta"><input type="checkbox" name="confirma_excluir_conta" id="confirma_excluir_conta" value="1"> Sim, estou ciente e concordo</label></p>
                                    
                                    <p class="pergunta"><strong>Diga o porque você está querendo excluir sua conta!</strong></p>
                                    <p><textarea id="motivo_exclusao" name="motivo_exclusao"></textarea></p>
                                    
                                    <div class="botao_bloquear_conta" style="text-align:left;">
                                        <input type="submit" class="button green" value="Excluir conta">
                                    </div>
                                </form>
                            </div>
                        </div>                                
                        <div class="clear"></div>
                    </div>
                </div>                       
                                
            
                <?php include('painel_right.php'); ?>
            </div>
            
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php
	include('include_footer.php');
?>

<script type="text/javascript">
	$('#trocar_senha').submit(function(event){
		var $form = $(this),
		$inputs = $form.find("input, select, button, textarea"),
		serializedData = $form.serialize();
		$inputs.attr("disabled", "disabled");
		
		var senha  = $('#new_pass').val();
		var senha2 = $('#new_pass_confirm').val();
		
		$('div.announcement-message').slideUp()
		$('div.announcement-message-successful').slideUp()
		
		if (senha == ''){
			$('p.announcement').html('Digite sua nova senha!');
			$('div.announcement-message').slideDown();
			$inputs.removeAttr("disabled");
			return false;
		} else 
		
		if (senha != senha2){
			$('p.announcement').html('As senhas estão diferentes!');
			$('div.announcement-message').slideDown();
			$inputs.removeAttr("disabled");
			return false;
		} else {
			$.ajax({
				url: "painel_minha_conta.php",
				type: "post",
				data: serializedData,
				success: function(response, textStatus, jqXHR){
					if (response == 'ok'){
						$('p.announcement').html('Senha alterada com sucesso!');
						$('div.announcement-message-successful').slideDown();
					} else {
						$('p.announcement').html(response);
						$('div.announcement-message').slideDown();
					}
				},
				complete: function(){
					$inputs.removeAttr("disabled");
				}
			});
		}
		
		event.preventDefault();
	})
	
	
	$('.bloquear_desbloquear').click(function(){
		opcao = $(this).attr('id');
		
		if (opcao == 'bloquear_conta'){
			txtConfirm = 'Deseja mesmo bloquear sua conta!';
			attrID = 'desbloquear_conta';
			buttonValue = 'Desbloquear conta';
		} else {
			txtConfirm = 'Deseja mesmo desbloquear sua conta!';
			attrID = 'bloquear_conta';
			buttonValue = 'Bloquear conta';
		}
		
		if (confirm(txtConfirm)){
			$.ajax({
				url: "painel_minha_conta.php",
				type: "post",
				dataType: "json",
				data: {opcaoBloqueio: opcao},
				success: function(response, textStatus, jqXHR){
					if (response.status == 'ok'){
						$('p.announcement').html(response.msg);
						$('div.announcement-message-successful').slideDown();
						
						$('.bloquear_desbloquear').attr('id', attrID);
						$('.bloquear_desbloquear').attr('value', buttonValue);
					} else {
						$('p.announcement').html(response.msg);
						$('div.announcement-message').slideDown();
					}
				}
			});
		} else {
			return false;
		}
	})
	
	
	$('#excluir_conta').submit(function(event){
		if ($('input[type=checkbox][name=excluir_minha_conta]:checked').length == 0 || $('input[type=checkbox][name=confirma_excluir_conta]:checked').length == 0){
			$('p.announcement').html('Selecione as opções para excluir sua conta!');
			$('div.announcement-message').slideDown();
		} else {
			if (confirm("Tem certeza de que você quer excluir permanentemente sua conta?")){
				var $form = $(this),
				$inputs = $form.find("input, select, button, textarea"),
				serializedData = $form.serialize();
				$inputs.attr("disabled", "disabled");
				
				$.ajax({
					url: "painel_minha_conta.php",
					type: "post",
					dataType: "json",
					data: serializedData,
					success: function(response, textStatus, jqXHR){
						if (response.status == 'ok'){
							document.location.href="painel_confirmacao_exclusao.php";
						} else {
							$('p.announcement').html(response.msg);
							$('div.announcement-message').slideDown();
						}
					}
				});
			}
		}
		
		return false;
		
		event.preventDefault();
	})
</script>

</body>
</html>