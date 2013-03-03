<?php
	include('config.php');
	
	if (sizeof($_POST)){		
		// DADOS PESSOAIS
		if (isset($_POST['genero'])){
			$perfilID         = anti_injection($_POST['perfil_id']);
			$genero           = anti_injection($_POST['genero']);
			$nome             = anti_injection($_POST['nome']);
			$estadoCivil      = anti_injection($_POST['estado_civil']);
			$dataNasc         = anti_injection($_POST['ano_nasc']) . '-' . anti_injection($_POST['mes_nasc']) . '-' . anti_injection($_POST['dia_nasc']);
			$etnia            = anti_injection($_POST['etnia']);
			$cabelo           = anti_injection($_POST['cabelo']);
			$cabeloTipo       = anti_injection($_POST['cabelo_tipo']);
			$olhos            = anti_injection($_POST['olhos']);
			$olhosTipo        = anti_injection($_POST['olhos_tipo']);
			$altura           = anti_injection($_POST['altura']);
			$peso             = anti_injection($_POST['peso']);
			$tipoFisico       = anti_injection($_POST['tipo_fisico']);
			$bebe             = anti_injection($_POST['bebe']);
			$fuma             = anti_injection($_POST['fuma']);
			$orientacaoSexual = anti_injection($_POST['orientacao_sexual']);
			$sobre            = anti_injection($_POST['sobre']);
			
			if (!empty($_POST['ano_nasc']) AND !empty($_POST['mes_nasc']) AND !empty($_POST['dia_nasc'])){
				$dataNasc = anti_injection($_POST['ano_nasc']) . '-' . anti_injection($_POST['mes_nasc']) . '-' . anti_injection($_POST['dia_nasc']);
			} else {
				$dataNasc = '1900-01-01';
			}
			
			if ($peso == '' OR $peso < 0){
				$peso = 0;
			}
			
			// Perfil não existe, usa INSERT senão UPDATE
			if ($perfilID == 0){
				$sql = "
				INSERT INTO perfil(
					user_id, 
					genero, 
					estado_civil, 
					nome, 
					data_nascimento, 
					etnia, 
					cabelos_cor, 
					cabelos_tipo, 
					olhos_cor, 
					olhos_tipo, 
					altura, 
					peso, 
					tipo_fisico, 
					fuma, 
					bebe, 
					sobre, 
					orientacao_sexual
				) VALUES (
					'" . $_SESSION['user_id'] . "', 
					'" . $genero . "', 
					'" . $estadoCivil . "', 
					'" . $nome . "', 
					'" . $dataNasc . "', 
					'" . $etnia . "', 
					'" . $cabelo . "', 
					'" . $cabeloTipo . "', 
					'" . $olhos . "', 
					'" . $olhosTipo . "', 
					'" . $altura . "', 
					'" . $peso . "', 
					'" . $tipoFisico . "', 
					'" . $fuma . "', 
					'" . $bebe . "', 
					'" . $sobre . "', 
					'" . $orientacaoSexual . "'
				)";
			} else {
				$sql = "
				UPDATE perfil SET 
					genero = '" . $genero . "', 
					estado_civil = '" . $estadoCivil . "', 
					nome = '" . $nome . "', 
					data_nascimento = '" . $dataNasc . "', 
					etnia = '" . $etnia . "', 
					cabelos_cor = '" . $cabelo . "', 
					cabelos_tipo = '" . $cabeloTipo . "', 
					olhos_cor = '" . $olhos . "', 
					olhos_tipo = '" . $olhosTipo . "', 
					altura = '" . $altura . "', 
					peso = '" . $peso . "', 
					tipo_fisico = '" . $tipoFisico . "', 
					fuma = '" . $fuma . "', 
					bebe = '" . $bebe . "', 
					sobre = '" . $sobre . "', 
					orientacao_sexual = '" . $orientacaoSexual . "'
				WHERE
					id = " . $perfilID;
			}
			
			$resultSet = pg_query($conn, $sql);
			
			if ($resultSet){
				$perfilID        = ($perfilID == 0) ? getPerfilID($_SESSION['user_id']) : $perfilID;
				$perfilConjugeID = getPerfilConjugeID($perfilID);
				
				// Se o perfil for de um casal, precisa inserir ou alterar os dados do conjuge na tabela perfil_conjuge
				if ($genero > 3){										
					$nome2             = anti_injection($_POST['nome2']);
					$etnia2            = anti_injection($_POST['etnia2']);
					$cabelo2           = anti_injection($_POST['cabelo2']);
					$cabeloTipo2       = anti_injection($_POST['cabelo_tipo2']);
					$olhos2            = anti_injection($_POST['olhos2']);
					$olhosTipo2        = anti_injection($_POST['olhostipo2']);
					$altura2           = anti_injection($_POST['altura2']);
					$peso2             = anti_injection($_POST['peso2']);
					$tipoFisico2       = anti_injection($_POST['tipo_fisico2']);
					$bebe2             = anti_injection($_POST['bebe2']);
					$fuma2             = anti_injection($_POST['fuma2']);
					$orientacaoSexual2 = anti_injection($_POST['orientacao_sexual2']);
					
					if (!empty($_POST['ano_nasc2']) AND !empty($_POST['mes_nasc2']) AND !empty($_POST['dia_nasc2'])){
						$dataNasc2 = anti_injection($_POST['ano_nasc2']) . '-' . anti_injection($_POST['mes_nasc2']) . '-' . anti_injection($_POST['dia_nasc2']);
					} else {
						$dataNasc2 = '1900-01-01';
					}
					
					if ($peso2 == '' OR $peso2 < 0){
						$peso2 = 0;
					}
					
					// Se não existir o perfil do conjuge, usa INSERT senão UPDATE
					if ($perfilConjugeID == 0){
						$sql2 = "
						INSERT INTO perfil_conjuge(
							perfil_id, 
							nome, 
							data_nascimento, 
							etnia, 
							cabelos_cor, 
							cabelos_tipo, 
							olhos_cor, 
							olhos_tipo, 
							altura, 
							peso, 
							tipo_fisico, 
							fuma, 
							bebe, 
							orientacao_sexual
						) VALUES (
							'" . $perfilID . "', 
							'" . $nome2 . "', 
							'" . $dataNasc2 . "', 
							'" . $etnia2 . "', 
							'" . $cabelo2 . "', 
							'" . $cabeloTipo2 . "', 
							'" . $olhos2 . "', 
							'" . $olhosTipo2 . "', 
							'" . $altura2 . "', 
							'" . $peso2 . "', 
							'" . $tipoFisico2 . "', 
							'" . $fuma2 . "', 
							'" . $bebe2 . "', 
							'" . $orientacaoSexual2 . "'
						)";
					} else {
						$sql2 = "
						UPDATE perfil_conjuge SET 
							nome = '" . $nome2 . "', 
							data_nascimento = '" . $dataNasc2 . "', 
							etnia = '" . $etnia2 . "', 
							cabelos_cor = '" . $cabelo2 . "', 
							cabelos_tipo = '" . $cabeloTipo2 . "', 
							olhos_cor = '" . $olhos2 . "', 
							olhos_tipo = '" . $olhosTipo2 . "', 
							altura = '" . $altura2 . "', 
							peso = '" . $peso2 . "', 
							tipo_fisico = '" . $tipoFisico2 . "', 
							fuma = '" . $fuma2 . "', 
							bebe = '" . $bebe2 . "', 
							orientacao_sexual = '" . $orientacaoSexual2 . "'
						WHERE
							id = " . $perfilConjugeID;
					}
				} else {
					// Se existir um perfil do conjuge porem o perfil for sem conjuge, exclui o registro do conjuge da tabela perfil_conjuge
					if ($perfilConjugeID != 0){
						$sql2 = "
						UPDATE perfil_conjuge SET 
							nome = '', 
							data_nascimento = '1900-01-01', 
							etnia = '1', 
							cabelos_cor = '1', 
							cabelos_tipo = '1', 
							olhos_cor = '1', 
							olhos_tipo = '1', 
							altura = '', 
							peso = '0', 
							tipo_fisico = '1', 
							fuma = '1', 
							bebe = '1', 
							orientacao_sexual = '1'
						WHERE
							id = " . $perfilConjugeID;
					}
				}
				
				if (isset($sql2)){
					$resultSet2 = pg_query($conn, $sql2);
					
					if ($resultSet2){
						echo 'ok';
						exit;
					} else {
						echo 'fail';
						exit;
					}
				} else {
					echo 'ok';
					exit;
				}
			} else {
				echo 'fail';
				exit;
			}
		} // FIM DADOS PESSOAIS
		
		
		// DADOS DA LOCALIZAÇÃO
		if (isset($_POST['pais'])){
			$perfilID = anti_injection($_POST['perfil_id']);
			$paisID   = (!empty($_POST['pais'])) ? anti_injection($_POST['pais']) : 0;
			$estadoID = (!empty($_POST['estado'])) ? anti_injection($_POST['estado']) : 0;
			$cidadeID = (!empty($_POST['cidade'])) ? anti_injection($_POST['cidade']) : 0;
			$bairro   = anti_injection($_POST['bairro']);
			
			$sql = "
			UPDATE perfil_localizacao SET
				pais_id = '" . $pais . "',
				estado_id = '" . $estadoID . "',
				cidade_id = '" . $cidadeID . "',
				bairro = '" . $bairro . "'
			WHERE 
				perfil_id = " . $perfilID;
				
			$resultSet = pg_query($conn, $sql);
			
			if ($resultSet){
				echo 'ok';
				exit;
			} else {
				echo 'fail';
				exit;
			}
		} // FIM DADOS DA LOCALIZAÇÃO
		
		
		// DADOS DOS CONTATOS
		if (isset($_POST['email_msn'])){
			$perfilID            = anti_injection($_POST['perfil_id']);
			
			$emailMSN            = anti_injection($_POST['email_msn']);
			$emailMSNPrivacidade = (!empty($emailMSN)) ? anti_injection($_POST['privacidade_email_msn']) : 1;
			
			$skype               = anti_injection($_POST['skype']);
			$skypePrivacidade    = (!empty($skype)) ? anti_injection($_POST['privacidade_skype']) : 1;
			
			$twitter             = anti_injection($_POST['twitter']);
			$twitterPrivacidade  = (!empty($twitter)) ? anti_injection($_POST['privacidade_twitter']) : 1;
			
			$facebook            = anti_injection($_POST['facebook']);
			$facebookPrivacidade = (!empty($facebook)) ? anti_injection($_POST['privacidade_facebook']) : 1;
			
			$orkut               = anti_injection($_POST['orkut']);
			$orkutPrivacidade    = (!empty($orkut)) ? anti_injection($_POST['privacidade_orkut']) : 1;
			
			$sql = "
			UPDATE perfil_contatos SET
				email_msn = '" . $emailMSN . "',
				privacidade_email_msn = '" . $emailMSNPrivacidade . "',
				skype = '" . $skype . "',
				privacidade_skype = '" . $skypePrivacidade . "',
				twitter = '" . $twitter . "',
				privacidade_twitter = '" . $twitterPrivacidade . "',
				facebook = '" . $facebook . "',
				privacidade_facebook = '" . $facebookPrivacidade . "',
				orkut = '" . $orkut . "',
				privacidade_orkut = '" . $orkutPrivacidade . "'
			WHERE
				perfil_id = " . $perfilID;
				
			$resultSet = pg_query($conn, $sql);
			
			if ($resultSet){
				echo 'ok';
				exit;
			} else {
				echo 'fail';
				exit;
			}
		} // FIM DADOS DOS CONTATOS
		
		
		// DADOS DE INTERESSES
		if (isset($_POST['generosInteresses'])){
			$perfilID                 = anti_injection($_POST['perfil_id']);
			$generosInteresses        = implode(';', $_POST['generosInteresses']);
			$relacionamentoInteresses = implode(';', $_POST['interesseRelacionamentos']);
			$outrosInteresses         = anti_injection($_POST['outrosInteresses']);
			
			$sql = "
			UPDATE perfil_interesses SET
				generos = '" . $generosInteresses . "',
				relacionamentos = '" . $relacionamentoInteresses . "',
				outros = '" . $outrosInteresses . "'
			WHERE
				perfil_id = " . $perfilID;
				
			$resultSet = pg_query($conn, $sql);
			
			if ($resultSet){
				echo 'ok';
				exit;
			} else {
				echo 'fail';
				exit;
			}			
		} // FIM DADOS DE INTERESSE
		
		
	} // FIM sizeof($_POST)
	
	
	if (isset($_GET['ajax']) AND isset($_GET['pais_id'])){
		$paisId = anti_injection($_GET['pais_id']);
		
		$estados = pg_query($conn, "SELECT id, estado FROM estados WHERE pais_id = " . $paisId . " ORDER BY estado");
		
		$options = '<option value="0">Selecione o estado</option>';
		
		if (pg_num_rows($estados) >= 1){
			while($estado = pg_fetch_array($estados)):
				$options .= '<option value="' . $estado['id'] .'">' . $estado['estado'] . '</option>';
			endwhile;
		} else {
			$options = 'false';
		}
		
		echo $options;
		exit;
	}
	
	
	if (isset($_GET['ajax']) AND isset($_GET['estado_id'])){
		$estadoId = anti_injection($_GET['estado_id']);
		
		$cidades = pg_query($conn, "SELECT id, cidade FROM cidades WHERE estado_id = " . $estadoId . " ORDER BY cidade");
		
		$options = '<option value="0">Selecione a cidade</option>';
		
		if (pg_num_rows($cidades) >= 1){
			while($cidade = pg_fetch_array($cidades)):
				$options .= '<option value="' . $cidade['id'] .'">' . $cidade['cidade'] . '</option>';
			endwhile;
		} else {
			$options = 'false';
		}
		
		echo $options;
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
                        <h3>Editar perfil</h3>
                    </div>
                    
                    <div class="tabs_wrap_painel" style="position: relative;">
                        <div class="editar_perfil_tabs">
                            <ul class="tabs_painel">
                                <li class="current"><a href="#geral">Pessoal</a></li>
                                <li><a href="#localizacao">Localização</a></li>
                                <li><a href="#contato">Contato</a></li>
                                <li class="last"><a href="#interesses">Interesses</a></li>
                            </ul>
                            
                            <div class="clear"></div>
                        </div>
                        
                        <div id="geral" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Informações pessoais</span>
                            </div>
                            
                            <div class="painel_simple_form">
                                <div class="painel_simple_box_form">
                                    <div class="painel_box_form">
                                    	<?php
											$arrPerfil = getPerfil($_SESSION['user_id']);
											$perfil    = $arrPerfil['perfil'];
											
											if ($perfil['genero'] > 3){
												$perfilConjuge = $arrPerfil['perfilConjuge'];
											}
											
											if (!isset($perfilConjuge)){
										?>                                        
												<style type="text/css">
                                                    .conjuge{display:none;}
                                                </style>
                                        <?php
											}
											
											$perfilLocalizacao = $arrPerfil['perfilLocalizacao'];											
											$perfilContatos    = $arrPerfil['perfilContatos'];
											$perfilInteresses  = $arrPerfil['perfilInteresses'];
										?>
                                        
                                        <form id="form_dados_pessoais">
                                        	<input type="hidden" name="perfil_id" id="perfil_id" value="<?php echo $perfil['id']; ?>" />
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="label"><label for="genero">Sou / Somos:</label></td>
                                                    <td>
                                                        <select name="genero" id="editar_perfil_genero" class="w250">
                                                            <?php
																foreach($config['genders'] as $key => $value):
																
																if ($key > 3){
																	if ($key == 4){ $textGenero = 'Casal (1 homem e 1 mulher)'; }
																	if ($key == 5){ $textGenero = 'Casal (2 homens)'; }
																	if ($key == 6){ $textGenero = 'Casal (2 mulheres)'; }
																} else {
																	$textGenero = $value;
																}
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['genero'] == $key){ echo 'selected="selected"'; } ?>><?php echo $textGenero; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="nome">Nome:</label></td>
                                                    <td><input type="text" name="nome" id="nome" value="<?php if (isset($perfil)){ echo $perfil['nome']; } ?>"></td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="nome2">Nome dela(e):</label></td>
                                                    <td><input type="text" name="nome2" id="nome2" value=" <?php if (isset($perfilConjuge)){ echo $perfilConjuge['nome']; } ?>" class="field-conjuge"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="estado_civil">Estado civil:</label></td>
                                                    <td>
                                                        <select name="estado_civil" id="estado_civil" class="w180">
                                                            <?php
																foreach($config['estadoCivil'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>"<?php if (isset($perfil) AND $perfil['estado_civil'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="dt_nasc">Data de nascimento:</label></td>
                                                    <td>
                                                        <?php
															list($anoNasc, $mesNasc, $diaNasc) = explode('-', $perfil['data_nascimento']);
														?>
                                                        
                                                        <select name="dia_nasc" id="cad_dia_nasc" class="dia_nasc">
                                                            <option value="">Dia:</option>
                                                            <?php
																for($i = 1; $i <= 31; $i++){
																	$dia = ($i < 10) ? '0' . $i : $i;
															?>
                                                            	<option value="<?php echo $dia; ?>" <?php if (isset($perfil) AND $anoNasc != '1900' AND $diaNasc == $dia){ echo 'selected="selected"'; } ?>><?php echo $dia; ?></option>
                                                            <?php
																}
															?>
                                                        </select>
                                                        
                                                        <select name="mes_nasc" id="cad_mes_nasc" class="mes_nasc">
                                                            <option value="">Mês:</option>
                                                            <?php
																foreach($config['mesesDoAno'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>"<?php if (isset($perfil) AND $anoNasc != '1900' AND $mesNasc == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        
                                                        <select name="ano_nasc" id="cad_ano_nasc" class="ano_nasc">
                                                            <option value="">Ano:</option>
                                                            <?php
																for($i = (date('Y') - 18); $i >= (date('Y') - 80); $i--):
															?>
                                                            		<option value="<?php echo $i; ?>"<?php if (isset($perfil) AND $anoNasc != '1900' AND $anoNasc == $i){ echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
                                                            <?php
																endfor;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="cad_dia_nasc2">Data de nascimento dela(e):</label></td>
                                                    <td>
                                                        <?php
															list($anoNasc2, $mesNasc2, $diaNasc2) = explode('-', $perfilConjuge['data_nascimento']);
														?>
                                                        
                                                        <select name="dia_nasc2" id="cad_dia_nasc2" class="dia_nasc field-conjuge">
                                                            <option value="">Dia:</option>
                                                            <?php
																for($i = 1; $i <= 31; $i++){
																	$dia = ($i < 10) ? '0' . $i : $i;
															?>
                                                            	<option value="<?php echo $dia; ?>" <?php if (isset($perfilConjuge) AND $anoNasc2 != '1900' AND $diaNasc2 == $dia){ echo 'selected="selected"'; } ?>><?php echo $dia; ?></option>
                                                            <?php
																}
															?>
                                                        </select>
                                                        
                                                        <select name="mes_nasc2" id="cad_mes_nasc2" class="mes_nasc field-conjuge">
                                                            <option value="">Mês:</option>
                                                            <?php
																foreach($config['mesesDoAno'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $anoNasc2 != '1900' AND $mesNasc2 == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        
                                                        <select name="ano_nasc2" id="cad_ano_nasc2" class="ano_nasc field-conjuge">
                                                            <option value="">Ano:</option>
                                                            <?php
																for($i = (date('Y') - 18); $i >= (date('Y') - 80); $i--):
															?>
                                                            		<option value="<?php echo $i; ?>" <?php if (isset($perfil) AND $anoNasc2 != '1900' AND $anoNasc2 == $i){ echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
                                                            <?php
																endfor;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="etnia">Etnia:</label></td>
                                                    <td>
                                                        <select name="etnia" id="etnia" class="w180">
                                                            <?php
																foreach($config['etnia'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['etnia'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="etnia2">Etnia dela(e):</label></td>
                                                    <td>
                                                        <select name="etnia2" id="etnia2" class="w180 field-conjuge">
                                                            <?php
																foreach($config['etnia'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['etnia'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="cabelos">Cabelos:</label></td>
                                                    <td>
                                                        <select name="cabelo" id="cabelos" class="mes_nasc">
                                                            <?php
																foreach($config['cabelosCor'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>"<?php if (isset($perfil) AND $perfil['cabelos_cor'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <select name="cabelo_tipo" id="cabelos_tipo" class="mes_nasc">
                                                            <?php
																foreach($config['cabelosTipo'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>"<?php if (isset($perfil) AND $perfil['cabelos_tipo'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="cabelos2">Cabelos dela(e):</label></td>
                                                    <td>
                                                        <select name="cabelo2" id="cabelos2" class="mes_nasc field-conjuge">
                                                            <?php
																foreach($config['cabelosCor'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['cabelos_cor'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <select name="cabelo_tipo2" id="cabelos_tipo2" class="mes_nasc field-conjuge">
                                                            <?php
																foreach($config['cabelosTipo'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['cabelos_tipo'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="olhos">Olhos:</label></td>
                                                    <td>
                                                        <select name="olhos" id="olhos" class="mes_nasc">
                                                            <?php
																foreach($config['olhosCor'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['olhos_cor'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <select name="olhos_tipo" id="olhos_tipo" class="mes_nasc">
                                                            <?php
																foreach($config['olhosTipo'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['olhos_tipo'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="olhos2">Olhos dela(e):</label></td>
                                                    <td>
                                                        <select name="olhos2" id="olhos2" class="mes_nasc field-conjuge">
                                                            <?php
																foreach($config['olhosCor'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['olhos_cor'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <select name="olhostipo2" id="olhostipo2" class="mes_nasc field-conjuge">
                                                            <?php
																foreach($config['olhosTipo'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['olhos_tipo'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="altura">Altura:</label></td>
                                                    <td><input type="text" name="altura" id="altura" value="<?php if (isset($perfil)){ echo $perfil['altura']; } ?>" class="w50 altura"> <span style="font-size:11px;"><strong>metros</strong></span></td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="altura2">Altura dela(e):</label></td>
                                                    <td><input type="text" name="altura2" id="altura2" value=" <?php if (isset($perfilConjuge)){ echo $perfilConjuge['altura']; } ?>" class="w50 altura field-conjuge"> <span style="font-size:11px;"><strong>metros</strong></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="peso">Peso:</label></td>
                                                    <td>
                                                        <input type="text" name="peso" id="peso" value="<?php if (isset($perfil)){ echo $perfil['peso']; } ?>" class="w50 peso">
                                                        <select name="tipo_fisico" id="tipo_fisico" class="w180">
                                                            <?php
																foreach($config['tiposFisico'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['tipo_fisico'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="peso2">Peso dela(e):</label></td>
                                                    <td>
                                                        <input type="text" name="peso2" id="peso2" value=" <?php if (isset($perfilConjuge)){ echo $perfilConjuge['peso']; } ?>" class="w50 peso field-conjuge">
                                                        <select name="tipo_fisico2" id="tipo_fisico2" class="w180 field-conjuge">
                                                            <?php
																foreach($config['tiposFisico'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['tipo_fisico'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="bebe">Você bebe?</label></td>
                                                    <td>
                                                        <select name="bebe" id="bebe" class="w180">
                                                            <?php
																foreach($config['bebe'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['bebe'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="bebe2">Ela(e) bebe?</label></td>
                                                    <td>
                                                        <select name="bebe2" id="bebe2" class="w180 field-conjuge">
                                                            <?php
																foreach($config['bebe'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['bebe'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td class="label"><label for="fuma">Você fuma?</label></td>
                                                    <td>
                                                        <select name="fuma" id="fuma" class="w180">
                                                            <?php
																foreach($config['fuma'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['fuma'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="fuma2">Ela(e) fuma?</label></td>
                                                    <td>
                                                        <select name="fuma2" id="fuma2" class="w180 field-conjuge">
                                                            <?php
																foreach($config['bebe'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['fuma'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>                                                
                                                
                                                
                                                <tr>
                                                    <td class="label"><label for="orientacaoSexual">Orientação sexual?</label></td>
                                                    <td>
                                                        <select name="orientacao_sexual" id="orientacaoSexual" class="w180">
                                                            <?php
																foreach($config['orientacaoSexual'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfil) AND $perfil['orientacao_sexual'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr class="conjuge">
                                                    <td class="label"><label for="orientacaoSexual2">Orientação sexual dela(e)?</label></td>
                                                    <td>
                                                        <select name="orientacao_sexual2" id="orientacaoSexual2" class="w180 field-conjuge">
                                                            <?php
																foreach($config['orientacaoSexual'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilConjuge) AND $perfilConjuge['orientacao_sexual'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td class="label" style="vertical-align:top;"><label for="sobre">Descrição pessoal:</label></td>
                                                    <td><textarea name="sobre" id="sobre"><?php if (isset($perfil)){ echo $perfil['sobre']; } ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="submit" id="salvar_dados_pessoais" class="button green" value="Salvar informações">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="localizacao" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Sua localização</span>
                            </div>
                            
                            <div class="painel_simple_form">
                                <div class="painel_simple_box_form">
                                    <div class="painel_box_form">
                                        <form id="form_localizacao">
                                        	<input type="hidden" name="perfil_id" id="perfil_id" value="<?php echo $perfil['id']; ?>" />
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="label"><label for="pais">País:</label></td>
                                                    <td>
                                                        <select name="pais" id="pais" class="w180">
                                                            <option value="">Sem resposta</option>
                                                            <?php
																$paises = pg_query($conn, "SELECT * FROM paises ORDER BY pais");
																
																while($pais = pg_fetch_array($paises)):
															?>
                                                            		<option value="<?php echo $pais['id']; ?>" <?php if (isset($perfilLocalizacao) AND $perfilLocalizacao['pais_id'] == $pais['id']){ echo 'selected="selected"'; } ?>><?php echo $pais['pais']; ?></option>
                                                            <?php
																	$i++;
																endwhile;
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="estado">Estado:</label></td>
                                                    <td>
                                                        <select name="estado" id="estado" class="w180">                                                            
                                                            <?php
																if (!empty($perfilLocalizacao['pais_id'])){
																	$estados = pg_query($conn, "SELECT * FROM estados WHERE pais_id = " . $perfilLocalizacao['pais_id'] . " ORDER BY estado");
																	
																	if (pg_fetch_row($estados) >= 1){
																		echo '<option value="">Selecione o estado</option>';
																	} else {
																		echo '<option value="">Estados indisponíveis</option>';
																	}
																	
																	while($estado = pg_fetch_array($estados)):
															?>
                                                            			<option value="<?php echo $estado['id']; ?>" <?php if (isset($perfilLocalizacao) AND $perfilLocalizacao['estado_id'] == $estado['id']){ echo 'selected="selected"'; } ?>><?php echo $estado['estado']; ?></option>
                                                            <?php
																	endwhile;
																} else {
															?>
                                                            		<option value="">Selecione o país</option>
                                                            <?php	
																}
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="cidade">Cidade:</label></td>
                                                    <td>
                                                        <select name="cidade" id="cidade" class="w180">
                                                            <?php
																if (!empty($perfilLocalizacao['estado_id'])){
																	$cidades = pg_query($conn, "SELECT * FROM cidades WHERE estado_id = " . $perfilLocalizacao['estado_id'] . " ORDER BY cidade");
																	
																	if (pg_fetch_row($cidades) >= 1){
																		echo '<option value="">Selecione a cidade</option>';
																	} else {
																		echo '<option value="">Cidades indisponíveis</option>';
																	}
																	
																	while($cidade = pg_fetch_array($cidades)):
															?>
                                                            			<option value="<?php echo $cidade['id']; ?>" <?php if (isset($perfilLocalizacao) AND $perfilLocalizacao['cidade_id'] == $cidade['id']){ echo 'selected="selected"'; } ?>><?php echo $cidade['cidade']; ?></option>
                                                            <?php
																	endwhile;
																} else {
															?>
                                                            		<option value="">Selecione o estado</option>
                                                            <?php	
																}
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="bairro">Bairro:</label></td>
                                                    <td><input type="text" name="bairro" id="bairro" value="<?php if (isset($perfilLocalizacao)){ echo $perfilLocalizacao['bairro']; } ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="submit" class="button green" value="Salvar informações">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="contato" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Informações de contato</span>
                            </div>
                            
                            <div class="painel_simple_form">
                                <div class="painel_simple_box_form">
                                    <div class="painel_box_form">
                                        <form id="form_contatos">
                                        	<input type="hidden" name="perfil_id" id="perfil_id" value="<?php echo $perfil['id']; ?>" />
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="label"><label for="email_msn">Email / MSN:</label></td>
                                                    <td><input type="text" name="email_msn" id="email_msn" value=" <?php if (isset($perfilContatos)){ echo $perfilContatos['email_msn']; } ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">&nbsp;</td>
                                                    <td>
                                                        <select name="privacidade_email_msn" id="privacidade_email_msn" class="w180">
                                                            <?php
																foreach($config['privacidadeContatos'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilContatos) AND $perfilContatos['privacidade_email_msn'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <a href="javascript:void(0);" title="Privacidade"><img src="i/icons/sprite_privacy.png" alt="Privacidade"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="skype">Skype:</label></td>
                                                    <td><input type="text" name="skype" id="skype" value=" <?php if (isset($perfilContatos)){ echo $perfilContatos['skype']; } ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">&nbsp;</td>
                                                    <td>
                                                        <select name="privacidade_skype" id="privacidade_skype" class="w180">
                                                            <?php
																foreach($config['privacidadeContatos'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilContatos) AND $perfilContatos['privacidade_skype'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <a href="javascript:void(0);" title="Privacidade"><img src="i/icons/sprite_privacy.png" alt="Privacidade"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="facebook">Facebook:</label></td>
                                                    <td><input type="text" name="facebook" id="facebook" value=" <?php if (isset($perfilContatos)){ echo $perfilContatos['facebook']; } ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">&nbsp;</td>
                                                    <td>
                                                        <select name="privacidade_facebook" id="privacidade_facebook" class="w180">
                                                            <?php
																foreach($config['privacidadeContatos'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilContatos) AND $perfilContatos['privacidade_facebook'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <a href="javascript:void(0);" title="Privacidade"><img src="i/icons/sprite_privacy.png" alt="Privacidade"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="twitter">Twitter:</label></td>
                                                    <td><input type="text" name="twitter" id="twitter" value=" <?php if (isset($perfilContatos)){ echo $perfilContatos['twitter']; } ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">&nbsp;</td>
                                                    <td>
                                                        <select name="privacidade_twitter" id="privacidade_twitter" class="w180">
                                                            <?php
																foreach($config['privacidadeContatos'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilContatos) AND $perfilContatos['privacidade_twitter'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <a href="javascript:void(0);" title="Privacidade"><img src="i/icons/sprite_privacy.png" alt="Privacidade"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label"><label for="orkut">Orkut:</label></td>
                                                    <td><input type="text" name="orkut" id="orkut" value=" <?php if (isset($perfilContatos)){ echo $perfilContatos['orkut']; } ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">&nbsp;</td>
                                                    <td>
                                                        <select name="privacidade_orkut" id="privacidade_orkut" class="w180">
                                                            <?php
																foreach($config['privacidadeContatos'] as $key => $value):
															?>
                                                            		<option value="<?php echo $key; ?>" <?php if (isset($perfilContatos) AND $perfilContatos['privacidade_orkut'] == $key){ echo 'selected="selected"'; } ?>><?php echo $value; ?></option>
                                                            <?php
																endforeach;
															?>
                                                        </select>
                                                        <a href="javascript:void(0);" title="Privacidade"><img src="i/icons/sprite_privacy.png" alt="Privacidade"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="submit" class="button green" value="Salvar informações">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="interesses" class="editar_perfil_forms">
                            <div class="title_form">
                                <span>- Interesses pessoais</span>
                            </div>
                            
                            <div class="painel_simple_form">
                                <div class="painel_simple_box_form">
                                    <div class="painel_box_form">
                                    	<?php
											$generosInteresses        = explode(';', $perfilInteresses['generos']);
											$relacionamentoInteresses = explode(';', $perfilInteresses['relacionamentos']);
										?>
                                    
                                        <form id="form_interesses">
                                            <input type="hidden" name="perfil_id" id="perfil_id" value="<?php echo $perfil['id']; ?>" />
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="label tab_interesses"><label for="homem">Procuro por:</label></td>
                                                    <td>
                                                        <?php
                                                        	foreach($config['genders'] as $key => $value):
																if ($key > 3){
																	if ($key == 4){ $textGenero = 'Casal (1 homem e 1 mulher)'; }
																	if ($key == 5){ $textGenero = 'Casal (2 homens)'; }
																	if ($key == 6){ $textGenero = 'Casal (2 mulheres)'; }
																} else {
																	$textGenero = $value;
																}
														?>
                                                        		<p><label class="tab_interesses" for="<?php echo 'gender_' . $key; ?>"><input type="checkbox" name="generosInteresses[]" id="<?php echo 'gender_' . $key; ?>" value="<?php echo $key; ?>" <?php if (array_search($key, $generosInteresses) !== false){ echo 'checked="checked"'; } ?>> <?php echo $textGenero; ?></label></label></p>
                                                        <?php
															endforeach;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td class="label tab_interesses"><label for="sexo_virtual">Para:</label></td>
                                                    <td>
                                                        <?php
															foreach($config['interessesRelacionamentos'] as $key => $value):
														?>
                                                        		<p><label class="tab_interesses" for="<?php echo 'interesseRelacionamentos_' . $key; ?>"><input type="checkbox" name="interesseRelacionamentos[]" id="<?php echo 'interesseRelacionamentos_' . $key; ?>" value="<?php echo $key; ?>" <?php if (array_search($key, $relacionamentoInteresses) !== false){ echo 'checked="checked"'; } ?>> <?php echo $value; ?></label></p>
                                                        <?php
															endforeach;
														?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label tab_interesses"><label for="outrosInteresses">Outros interesses:</label></td>
                                                    <td><textarea name="outrosInteresses" id="outrosInteresses"><?php echo $perfilInteresses['outros']; ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="submit" class="button green" value="Salvar informações">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
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
	$js_array = array(
		'js/libs/jquery.price_format.1.7.min.js',
	);
	
	include('include_footer.php');
?>

<script type="text/javascript">
	$('.altura').priceFormat({
		prefix: '',
		centsSeparator: ',',
		thousandsSeparator: '',
		limit: 3,
    	centsLimit: 2
	});
	
	$('.peso').priceFormat({
		prefix: '',
		centsSeparator: '',
		thousandsSeparator: '',
		limit: 3,
    	centsLimit: 0
	});
	
	
	$('#editar_perfil_genero').change(function(){
		var genero = $(this).val();
		
		if (genero > 3){
			$('.conjuge').show();
		} else {
			$('.conjuge').hide();
		}
	})
	
	$('#pais').change(function(){
		var paisId = $(this).val();
		
		if (paisId != ''){
			$.ajax({
				url: 'painel_editar_perfil.php?ajax=1&pais_id=' + paisId,
				type: 'get',
				global: false,
				success: function(response){
					if (response != 'false'){
						$('#estado').html(response);
						$('#cidade').html('<option value="">Sem resposta</option>');
					} else {
						$('#estado').html('<option value="0">Estados indisponíveis</option>');
						$('#cidade').html('<option value="0">Cidades indisponíveis</option>');
					}
				}
			})
		} else {
			$('#estado').html('<option value="0">Sem resposta</option>');
			$('#cidade').html('<option value="0">Sem resposta</option>');
		}
	})
	
	$('#estado').change(function(){
		var estadoId = $(this).val();
		
		if (estadoId != ''){
			$.ajax({
				url: 'painel_editar_perfil.php?ajax=1&estado_id=' + estadoId,
				type: 'get',
				global: false,
				success: function(response){
					if (response != 'false'){
						$('#cidade').html(response);
					} else {
						$('#cidade').html('<option value="0">Cidades indisponíveis</option>');
					}
				}
			})
		} else {
			$('#cidade').html('<option value="0">Sem resposta</option>');
		}
	})
	
	
	$("#form_dados_pessoais").submit(function(event){
		var $form = $(this),
		$inputs = $form.find("input, select, button, textarea"),
		serializedData = $form.serialize();
		$inputs.attr("disabled", "disabled");
		
		var genero = $('#editar_perfil_genero').val();
		
		$.ajax({
			url: "painel_editar_perfil.php",
			type: "post",
			data: serializedData,
			success: function(response, textStatus, jqXHR){
				if (response == 'ok'){
					$('p.announcement').html('Dados pessoais salvos com sucesso!');
					$('div.announcement-message-successful').slideDown();
					
					if (genero <= 3){
						$('input.field-conjuge').val('');
						$('.field-conjuge').find('option').removeAttr("selected");
					}
				} else {
					$('p.announcement').html('Não foi possível salvar corretamente seu dados pessoais. Por favor, tente novamente!');
					$('div.announcement-message').slideDown();
				}
			},
			complete: function(){
				$inputs.removeAttr("disabled");
			}
		});
		
		window.setTimeout(function() {
			$('.announcement-message-successful').slideUp(500);
		}, 5000);
		
		window.setTimeout(function() {
			$('.announcement-message').slideUp(500);
		}, 5000);

		event.preventDefault();
	});
	
	
	$("#form_localizacao").submit(function(event){
		var $form = $(this),
		$inputs = $form.find("input, select, button, textarea"),
		serializedData = $form.serialize();
		$inputs.attr("disabled", "disabled");
		
		$('div.announcement-message').slideUp()
		$('div.announcement-message-successful').slideUp()
		
		if ($('#pais').val() == ''){
			$('p.announcement').html('Selecione pelo menos o seu país!');
			$('div.announcement-message').slideDown();
			
			$inputs.removeAttr("disabled");			
			return false;
		}
		
		$.ajax({
			url: "painel_editar_perfil.php",
			type: "post",
			data: serializedData,
			success: function(response, textStatus, jqXHR){
				if (response == 'ok'){
					$('p.announcement').html('Dados da localização salvos com sucesso!');
					$('div.announcement-message-successful').slideDown();
				} else {
					$('p.announcement').html('Não foi possível salvar corretamente seu dados da sua localização. Por favor, tente novamente!');
					$('div.announcement-message').slideDown();
				}
			},
			complete: function(){
				$inputs.removeAttr("disabled");
			}
		});

		event.preventDefault();
	});
	
	
	$("#form_contatos").submit(function(event){
		var $form = $(this),
		$inputs = $form.find("input, select, button, textarea"),
		serializedData = $form.serialize();
		$inputs.attr("disabled", "disabled");
		
		$('div.announcement-message').slideUp();
		$('div.announcement-message-successful').slideUp();
		
		$.ajax({
			url: "painel_editar_perfil.php",
			type: "post",
			data: serializedData,
			success: function(response, textStatus, jqXHR){
				if (response == 'ok'){
					$('p.announcement').html('Contatos salvos com sucesso!');
					$('div.announcement-message-successful').slideDown();
				} else {
					$('p.announcement').html('Não foi possível salvar corretamente seu dados de contato. Por favor, tente novamente!');
					$('div.announcement-message').slideDown();
				}
			},
			complete: function(){
				$inputs.removeAttr("disabled");
			}
		});

		event.preventDefault();
	});
	
	
	$("#form_interesses").submit(function(event){
		var $form = $(this),
		$inputs = $form.find("input, select, button, textarea"),
		serializedData = $form.serialize();
		$inputs.attr("disabled", "disabled");
		
		$('div.announcement-message').slideUp();
		$('div.announcement-message-successful').slideUp();
		
		$.ajax({
			url: "painel_editar_perfil.php",
			type: "post",
			data: serializedData,
			success: function(response, textStatus, jqXHR){
				if (response == 'ok'){
					$('p.announcement').html('Interesses salvos com sucesso!');
					$('div.announcement-message-successful').slideDown();
				} else {
					$('p.announcement').html('Não foi possível salvar corretamente seus interesses. Por favor, tente novamente!');
					$('div.announcement-message').slideDown();
				}
			},
			complete: function(){
				$inputs.removeAttr("disabled");
			}
		});

		event.preventDefault();
	});
	
	window.setTimeout(function() {
		$('.announcement-message-successful').slideUp(500);
	}, 5000);
	
	window.setTimeout(function() {
		$('.announcement-message').slideUp(500);
	}, 5000);
</script>

</body>
</html>