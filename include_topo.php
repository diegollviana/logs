<!doctype html>
<!--[if lt IE 7 ]> <html lang="pt-br" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="pt-br" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="pt-br" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="pt-br" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="pt-br" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>logsexy</title>
	<meta name="description" content="logsexy">
	<meta name="author" content="logsexy">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="i/favicon.png">
	<link rel="stylesheet" href="css/960_12_col.css">
    <link rel="stylesheet" href="css/style.css">
    
    <!--[if IEE]>
    	<style type="text/css">
            .bgtops{border-left:1px solid #5989C6;}
        </style>
    <![endif]-->
    
    <script src="js/libs/modernizr.2.0.6.js"></script>
</head>
<body class="bg_azul">
		<?php
			if (isset($_SESSION['msgSucesso'])){
				$msgSucesso = $_SESSION['msgsucesso'];
				unset($_SESSION['msgSucesso']);
				$displayAnnouncementMessageSucesso = 'block';
			} else {
				$displayAnnouncementMessageSucesso = 'none';
			}
		?>
		<div class="announcement-message-successful" style="display:<?php echo $displayAnnouncementMessageSucesso; ?>;">
			<div class="container_12">
				<p class="announcement"><?php echo (isset($msgSucesso)) ? $msgSucesso : ''; ?></p>
				<a title="Fechar aviso" class="close-link" onClick="$('div.announcement-message-successful').slideUp()" href="javascript:void(0);">x</a>
			</div>
		</div>
        
        
        <?php
			if (isset($_SESSION['msgError'])){
				$msgError = $_SESSION['msgError'];
				unset($_SESSION['msgError']);
				$displayAnnouncementMessage = 'block';
			} else {
				$displayAnnouncementMessage = 'none';
			}
		?>
		<div class="announcement-message" style="display:<?php echo $displayAnnouncementMessage; ?>;">
			<div class="container_12">
				<p class="announcement"><?php echo (isset($msgError)) ? $msgError : ''; ?></p>
				<a title="Fechar aviso" class="close-link" onClick="$('div.announcement-message').slideUp()" href="javascript:void(0);">x</a>
			</div>
		</div>
        

        <div class="container">    
            <header role="banner">        
                <div class="container_12">
                    <div class="grid_4 alpha omega" id="logo">
                        <a href="index.php"><img src="i/logo.png" width="139" height="42" alt="Logo logsexy"/></a>
                        <p>Facilitando a realização das suas fantasias</p>
                    </div>
                    
                    <?php
                        if (isset($_SESSION['is_logged'])){
                    ?>
                            <div class="grid_8">
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
                                            <li><a href="#">Meu logsexy</a></li>
                                            <li><a href="perfil.php?pf=<?php echo $_SESSION['username']; ?>">Meu Perfil</a></li>
                                            <li><a href="#">Recados(1000)</a></li>
                                            <li><a href="painel.php">Painel de controle</a></li>
                                            <li><a href="logout.php">Sair</a></li>
                                        </ul>
                                        
                                        <div class="clear"></div>
                                    </div>
                                </div>                    
                            </div>
                    <?php
                        } else {
                    ?>
                            <div class="grid_8" id="box_login">
                                <form id="form_login" action="login.php" method="post">
                                    <fieldset>
                                        <label for="input_login">Login</label>
                                        <input type="text" name="login" id="input_login" placeholder="login" value="">
                                    </fieldset>
                                    
                                    <fieldset>
                                        <label for="input_password">Senha</label>
                                        <?php
                                            if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false){
                                        ?>
                                                <input type="password" name="password" id="input_password" value="senha" class="ml50" onFocus="if (this.value == 'senha'){this.value = ''; }" onBlur="if (this.value == ''){this.value = 'senha'; }">
                                        <?php
                                            } else {
                                        ?>
                                                <input type="password" name="password" id="input_password" placeholder="senha" value="" class="ml50">
                                        <?php
                                            }
                                        ?>
                                    </fieldset>
                                    
                                    <fieldset>
                                        <input type="button" class="btn_green_100x30 ml50" id="btn_login" value="ENTRAR">
                                    </fieldset>
                                </form>
                                <div class="sign_up"><a href="cadastro.php">Cadastre-se</a></div>
                                <div class="forget_password ml50" style="width:200px; float:left;"><a href="esqueci-a-senha.php" class="forgot_password">Esqueceu a senha?</a></div>
                            </div>
                    <?php
                        }
                    ?>
                    
                    
                    <div class="clear"></div>
                    <div class="grid_12 alpha omega">
                        <form id="form_search">
                            <fieldset class="search_for ml10">
                                <label for="genero">Procurar por:</label>
                                <select name="genero" id="genero">
                                    <?php
                                        foreach($config['genders'] as $key => $gender):
                                    ?>
                                            <option value="<?php echo $key; ?>" <?php echo (($key == 2) ? 'selected' : ''); ?>><?php echo $gender; ?></option>
                                    <?php		
                                        endforeach;
                                    ?>
                                </select>
                            </fieldset>
                            
                            <fieldset class="search_age ml35">
                                <label for="age">Entre:</label>
                                <select name="idade" id="age">
                                    <option value="">Qualquer idade</option>
                                    <option value="">18 a 24</option>
                                    <option value="">25 a 30</option>
                                    <option value="">30 a 40</option>
                                    <option value="">40 a 50</option>
                                    <option value="">acima de 50</option>
                                </select>
                            </fieldset>
                            
                            <fieldset class="search_state ml35">
                                <label for="state">Em:</label>
                                <select name="estado" id="state">
                                    <option value="">Qualquer lugar</option>
                                    <?php
                                        foreach($config['estadosBrasil'] as $key => $estado):
                                    ?>
                                        <option value="<?php echo $key; ?>"><?php echo $estado; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </fieldset>
                            
                            <fieldset class="ml35">
                                <input type="image" src="i/btn/search.png" value="">
                            </fieldset>
                            
                            <fieldset class="ml35">
                                <a href="#"><img src="i/btn/busca_avancada.png" alt="Busca avançada"></a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </header>
        
        <div class="clear"></div>