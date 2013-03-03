<?php
	include('config.php');	
	
	if (isset($_GET['pf']) AND !empty($_GET['pf'])){
		$userName = anti_injection($_GET['pf']);
		
		$resultSetUser = pg_query($conn, "SELECT * FROM users WHERE username = '" . $userName . "' AND deleted = 0");
		
		if (pg_num_rows($resultSetUser) >= 1){
			$user = pg_fetch_array($resultSetUser);
			
			if ($user['bloqueado'] == 0){
				$sql = "
				SELECT p.*, pc.*, pl.*, pi.*
				FROM perfil p
				LEFT JOIN perfil_contatos pc ON (pc.perfil_id = p.id)
				LEFT JOIN perfil_localizacao pl ON (pl.perfil_id = p.id)
				LEFT JOIN perfil_interesses pi ON (pi.perfil_id = p.id)
				WHERE p.user_id = " . $user['id'];
					
				$resultSetPerfil = pg_query($conn, $sql);
				
				if (pg_num_rows($resultSetPerfil) >= 1){
					$perfil = pg_fetch_array($resultSetPerfil);
					
					// se o perfil for de algum casal, devemos pegar o perfil do conjuge
					if ($perfil['genero'] > 3){
						$resultSetPerfilConjuge = pg_query($conn, "SELECT * FROM perfil_conjuge WHERE perfil_id = " . $perfil['perfil_id']);
						
						if (pg_num_rows($resultSetPerfilConjuge) >= 1){
							$perfilConjuge = pg_fetch_array($resultSetPerfilConjuge);
						} else {
							// perfil do conjuge nao existe
						}
					}
				} else {
					// perfil nao existe
					header("Location: 404.php");
					exit;
				}
			} else {
				// usuario bloqueado
				header("Location: 404.php");
				exit;
			}
		} else {
			// usuario nao existe
			header("Location: 404.php");
			exit;
		}
	} else {
		header("Location: 404.php");
		exit;
	}
	
	
	
	include('include_topo.php');
?>
        
<div id="content" class="container_12">
    <div class="grid_12 alpha omega">
        <div id="content_panel">
            <?php include('perfil_left.php'); ?>
            
            <div id="content_main" class="grid_9 alpha omega">
                <div id="content_center" class="grid_6 alpha omega" style="width:470px;">
                    <div class="title_bar">
                        <h3><?php echo strtoupper($user['username']); ?></h3>
                    </div>
                    
                    <div class="profile_info user_from">
                        <p><a href="perfil.php?pf=<?php echo $user['username']; ?>" class="<?php echo ($user['assinante'] == 1) ? 'assinante' : ''; ?>"><?php echo $user['username']; ?></a> <span><?php echo (!empty($perfil['genero']) ? '- ' . $config['genders'][$perfil['genero']] : ''); ?></span></p>
                        
						<?php
                        	if (!empty($perfil['cidade_id'])){
								$localizacao = getLocalizacaoCidade($perfil['cidade_id']);
						?>
                        		<p><?php echo (!empty($perfil['bairro']) ? $perfil['bairro'] . ' - ' : '') . $localizacao['cidade'] . ' - ' . $localizacao['estado'] . ', ' . $localizacao['pais']; ?></p>
                        <?php	
							} elseif (!empty($perfil['estado_id'])){
								$localizacao = getLocalizacaoEstado($perfil['estado_id']);
						?>
                        		<p><?php echo (!empty($perfil['bairro']) ? $perfil['bairro'] . ' - ' : '') . $localizacao['estado'] . ', ' . $localizacao['pais']; ?></p>
                        <?php
							} elseif (!empty($perfil['pais_id'])){
								$localizacao = getLocalizacaoPais($perfil['pais_id']);
						?>
                        		<p><?php echo (!empty($perfil['bairro']) ? $perfil['bairro'] . ' - ' : '') . $localizacao['pais']; ?></p>
                        <?php
							}
						?>

                        <p>Último acesso em: <?php echo (!empty($user['last_login']) ? strftime('%d/%m/%Y %Hh%Mm', strtotime($user['last_login'])) : ''); ?></p>
                        <p>Pertence ao logsexy desde <?php echo strftime('%d/%m/%Y', strtotime($user['data_cadastro'])); ?></p>
                    </div>
                    
                    <div class="perfil_contatos box_profile_info">
                        <h2>- Informações de contato</h2>
                        <div class="content_info mb5">
                        	<?php
								$emailMSN = (!empty($perfil['email_msn']) ? strtolower($perfil['email_msn']) : 'sem resposta');
								$skype    = (!empty($perfil['skype'])     ? strtolower($perfil['skype'])     : 'sem resposta');
								$facebook = (!empty($perfil['facebook'])  ? strtolower($perfil['facebook'])  : 'sem resposta');
								$twitter  = (!empty($perfil['twitter'])   ? strtolower($perfil['twitter'])   : 'sem resposta');
								$orkut    = (!empty($perfil['orkut'])     ? strtolower($perfil['orkut'])     : 'sem resposta');
							?>
                        
                            <p><a href="javascript:void(0);" class="msn" title="Email / MSN"><?php echo (strlen($emailMSN) >= 55) ? substr($emailMSN, 0, 55) . '...' : $emailMSN; ?></a></p>
                            <p><a href="javascript:void(0);" class="skype" title="Skype"><?php echo (strlen($skype) >= 55) ? substr($skype, 0, 55) . '...' : $skype; ?></a></p>
                            <p><a href="<?php echo $perfil['facebook']; ?>" class="facebook" title="Facebook" target="_blank"><?php echo (strlen($facebook) >= 55) ? substr($facebook, 0, 55) . '...' : $facebook; ?></a></p>
                            <p><a href="<?php echo $perfil['twitter']; ?>" class="twitter" title="Twitter" target="_blank"><?php echo (strlen($twitter) >= 55) ? substr($twitter, 0, 55) . '...' : $twitter; ?></a></p>
                            <p><a href="<?php echo $perfil['orkut']; ?>" class="orkut" title="Orkut" target="_blank"><?php echo (strlen($orkut) >= 55) ? substr($orkut, 0, 55) . '...' : $orkut; ?></a></p>
                        </div>
                    </div>
                    
                    
                    <div class="box_profile_info">
                        <h2>- Sobre <?php echo ($perfil['genero'] > 3) ? 'nós' : 'mim'; ?></h2>
                        <div class="content_info">
                            <p class="perfil_sobre"><?php echo (!empty($perfil['sobre']) ? nl2br($perfil['sobre']) : 'Sem resposta'); ?></p>
                        </div>
                    </div>
                    
                    <div class="perfil_info_pessoais box_profile_info">
                        <h2>- Informações pessoais</h2>
                        <div class="content_info">
                            <div class="box_info_left">
                                <p><strong><?php echo (!empty($perfil['nome']) ? $perfil['nome'] : 'Sem nome'); ?></strong></p>
                                <p><strong>Sexualidade:</strong> <?php echo $config['orientacaoSexual'][$perfil['orientacao_sexual']]; ?></p>
                                <p><strong>Idade:</strong> <?php echo getIdade($perfil['data_nascimento']); ?></p>
                                <p><strong>Etnia:</strong> <?php echo $config['etnia'][$perfil['etnia']]; ?></p>
                                
                                <?php
									if ($perfil['cabelos_cor'] != 1 AND $perfil['cabelos_tipo'] != 1){
								?>
                                		<p><strong>Cabelos:</strong> <?php echo $config['cabelosCor'][$perfil['cabelos_cor']] . ' (' . $config['cabelosTipo'][$perfil['cabelos_tipo']] . ')'; ?></p>
                                <?php
									} elseif ($perfil['cabelos_cor'] != 1 AND $perfil['cabelos_tipo'] == 1){
								?>
                                		<p><strong>Cabelos:</strong> <?php echo $config['cabelosCor'][$perfil['cabelos_cor']]; ?></p>
                                <?php
									} elseif ($perfil['cabelos_cor'] == 1 AND $perfil['cabelos_tipo'] != 1){
								?>
                                		<p><strong>Cabelos:</strong> <?php echo $config['cabelosTipo'][$perfil['cabelos_tipo']]; ?></p>
                                <?php
									} elseif ($perfil['cabelos_cor'] == 1 AND $perfil['cabelos_tipo'] == 1){
								?>
                                		<p><strong>Cabelos:</strong> Sem resposta</p>
                                <?php
									}
								?>
                                
                                <?php
									if ($perfil['olhos_cor'] != 1 AND $perfil['olhos_tipo'] != 1){
								?>
                                		<p><strong>Olhos:</strong> <?php echo $config['olhosCor'][$perfil['olhos_cor']] . ' (' . $config['olhosTipo'][$perfil['olhos_tipo']] . ')'; ?></p>
                                <?php
									} elseif ($perfil['olhos_cor'] != 1 AND $perfil['olhos_tipo'] == 1){
								?>
                                		<p><strong>Olhos:</strong> <?php echo $config['olhosCor'][$perfil['olhos_cor']]; ?></p>
                                <?php
									} elseif ($perfil['olhos_cor'] == 1 AND $perfil['olhos_tipo'] != 1){
								?>
                                		<p><strong>Olhos:</strong> <?php echo $config['olhosTipo'][$perfil['olhos_tipo']]; ?></p>
                                <?php
									} elseif ($perfil['olhos_cor'] == 1 AND $perfil['olhos_tipo'] == 1){
								?>
                                		<p><strong>Olhos:</strong> Sem resposta</p>
                                <?php
									}
								?>
                                
                                <p><strong>Altura:</strong> <?php echo (!empty($perfil['altura']) AND $perfil['altura'] != '0,00') ? $perfil['altura'] . 'm' : 'sem resposta'; ?></p>
                                
                                <?php
									if (!empty($perfil['peso']) AND $perfil['tipo_fisico'] != 1){
								?>
                                		<p><strong>Peso:</strong> <?php echo $perfil['peso'] . 'kg (' . $config['tiposFisico'][$perfil['tipo_fisico']] . ')'; ?></p>
                                <?php
									} elseif (!empty($perfil['peso']) AND $perfil['tipo_fisico'] == 1){
								?>
                                		<p><strong>Peso:</strong> <?php echo $perfil['peso'] . 'kg'; ?></p>
                                <?php
									} elseif (empty($perfil['peso']) AND $perfil['tipo_fisico'] != 1){
								?>
                                		<p><strong>Peso:</strong> <?php echo $config['tiposFisico'][$perfil['tipo_fisico']]; ?></p>
                                <?php
									} elseif (empty($perfil['peso']) AND $perfil['tipo_fisico'] == 1){
								?>
                                		<p><strong>Peso:</strong> Sem resposta</p>
                                <?php
									}
								?>
                                
                                <p><strong>Fumante:</strong> <?php echo $config['fuma'][$perfil['fuma']]; ?></p>
                                <p><strong>Bebe:</strong> <?php echo $config['bebe'][$perfil['bebe']]; ?></p>
                            </div>
                            
                            <?php
								if ($perfil['genero'] > 3){
							?>
                                    <div class="box_info_right">
                                        <p><strong><?php echo (!empty($perfilConjuge['nome']) ? $perfilConjuge['nome'] : 'Sem nome'); ?></strong></p>
                                        <p><strong>Sexualidade:</strong> <?php echo $config['orientacaoSexual'][$perfilConjuge['orientacao_sexual']]; ?></p>
                                        <p><strong>Idade:</strong> <?php echo getIdade($perfilConjuge['data_nascimento']); ?></p>
                                        <p><strong>Etnia:</strong> <?php echo $config['etnia'][$perfilConjuge['etnia']]; ?></p>
                                        
                                        <?php
                                            if ($perfilConjuge['cabelos_cor'] != 1 AND $perfilConjuge['cabelos_tipo'] != 1){
                                        ?>
                                                <p><strong>Cabelos:</strong> <?php echo $config['cabelosCor'][$perfilConjuge['cabelos_cor']] . ' (' . $config['cabelosTipo'][$perfilConjuge['cabelos_tipo']] . ')'; ?></p>
                                        <?php
                                            } elseif ($perfilConjuge['cabelos_cor'] != 1 AND $perfilConjuge['cabelos_tipo'] == 1){
                                        ?>
                                                <p><strong>Cabelos:</strong> <?php echo $config['cabelosCor'][$perfilConjuge['cabelos_cor']]; ?></p>
                                        <?php
                                            } elseif ($perfilConjuge['cabelos_cor'] == 1 AND $perfilConjuge['cabelos_tipo'] != 1){
                                        ?>
                                                <p><strong>Cabelos:</strong> <?php echo $config['cabelosTipo'][$perfilConjuge['cabelos_tipo']]; ?></p>
                                        <?php
                                            } elseif ($perfilConjuge['cabelos_cor'] == 1 AND $perfilConjuge['cabelos_tipo'] == 1){
                                        ?>
                                                <p><strong>Cabelos:</strong> Sem resposta</p>
                                        <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if ($perfilConjuge['olhos_cor'] != 1 AND $perfilConjuge['olhos_tipo'] != 1){
                                        ?>
                                                <p><strong>Olhos:</strong> <?php echo $config['olhosCor'][$perfilConjuge['olhos_cor']] . ' (' . $config['olhosTipo'][$perfilConjuge['olhos_tipo']] . ')'; ?></p>
                                        <?php
                                            } elseif ($perfilConjuge['olhos_cor'] != 1 AND $perfilConjuge['olhos_tipo'] == 1){
                                        ?>
                                                <p><strong>Olhos:</strong> <?php echo $config['olhosCor'][$perfilConjuge['olhos_cor']]; ?></p>
                                        <?php
                                            } elseif ($perfilConjuge['olhos_cor'] == 1 AND $perfilConjuge['olhos_tipo'] != 1){
                                        ?>
                                                <p><strong>Olhos:</strong> <?php echo $config['olhosTipo'][$perfilConjuge['olhos_tipo']]; ?></p>
                                        <?php
                                            } elseif ($perfilConjuge['olhos_cor'] == 1 AND $perfilConjuge['olhos_tipo'] == 1){
                                        ?>
                                                <p><strong>Olhos:</strong> Sem resposta</p>
                                        <?php
                                            }
                                        ?>
                                        
                                        <p><strong>Altura:</strong> <?php echo (!empty($perfilConjuge['altura']) AND $perfilConjuge['altura'] != '0,00') ? $perfilConjuge['altura'] . 'm' : 'sem resposta'; ?></p>
                                        
                                        <?php
                                            if (!empty($perfilConjuge['peso']) AND $perfilConjuge['tipo_fisico'] != 1){
                                        ?>
                                                <p><strong>Peso:</strong> <?php echo $perfilConjuge['peso'] . 'kg (' . $config['tiposFisico'][$perfilConjuge['tipo_fisico']] . ')'; ?></p>
                                        <?php
                                            } elseif (!empty($perfilConjuge['peso']) AND $perfilConjuge['tipo_fisico'] == 1){
                                        ?>
                                                <p><strong>Peso:</strong> <?php echo $perfilConjuge['peso'] . 'kg'; ?></p>
                                        <?php
                                            } elseif (empty($perfilConjuge['peso']) AND $perfilConjuge['tipo_fisico'] != 1){
                                        ?>
                                                <p><strong>Peso:</strong> <?php echo $config['tiposFisico'][$perfilConjuge['tipo_fisico']]; ?></p>
                                        <?php
                                            } elseif (empty($perfilConjuge['peso']) AND $perfilConjuge['tipo_fisico'] == 1){
                                        ?>
                                                <p><strong>Peso:</strong> Sem resposta</p>
                                        <?php
                                            }
                                        ?>
                                        
                                        <p><strong>Fumante:</strong> <?php echo $config['fuma'][$perfilConjuge['fuma']]; ?></p>
                                        <p><strong>Bebe:</strong> <?php echo $config['bebe'][$perfilConjuge['bebe']]; ?></p>
                                    </div>
                            <?php
								}
							?>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <div class="perfil_interesses box_profile_info">
                        <h2>- Interesses pessoais</h2>
                        <div class="content_info">
                            <div class="box_info_left">
                                <p><strong>- <?php echo ($perfil['genero'] > 3) ? 'Procuramos' : 'Procuro'; ?> por:</strong></p>
                                
                                <?php
									if (!empty($perfil['generos'])){
										$generosInteresses = explode(';', $perfil['generos']);
										
										foreach($config['genders'] as $key => $value):
								?>
                                			<p class="ml20">- <?php echo $value; ?> <?php echo (array_search($key, $generosInteresses) !== false) ? '<img src="i/checked.png" alt="" />' : ''; ?></p>	
                                <?php
										endforeach;
									} else {
								?>
                                		<p class="ml20">- Sem resposta</p>
                                <?php	
									}
								?>
                            </div>
                            
                            <div class="box_info_right">
                                <p><strong>- Para:</strong></p>
                                <?php
									if (!empty($perfil['relacionamentos'])){
										$relacionamentosInteresses = explode(';', $perfil['relacionamentos']);
										
										foreach($config['interessesRelacionamentos'] as $key => $value):
								?>
                                			<p class="ml20">- <?php echo $value; ?> <?php echo (array_search($key, $relacionamentosInteresses) !== false) ? '<img src="i/checked.png" alt="" />' : ''; ?></p>	
                                <?php
										endforeach;
									} else {
								?>
                                		<p class="ml20">- Sem resposta</p>
                                <?php
									}
								?>
                            </div>
                            
                            <div class="clear"></div>
                            
                            <div class="outros_interesses">
                            	<p class="tp15 mb5"><strong>- Outros interesses</strong></p>
                                <p class="ml20 perfil_sobre"><?php echo (!empty($perfil['outros']) ? nl2br($perfil['outros']) : 'Sem resposta'); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    
                </div>                       
                                
            
                <?php include('perfil_right.php'); ?>
            </div>
            
            <div class="clear"></div>
        </div>
    </div>
</div>
        
<?php
	include('include_footer.php');
?>

</body>
</html>