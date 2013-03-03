<div class="grid_3 omega" style="width:230px;">
    <div class="user_box">
        <img src="<?php echo str_replace('.jpg', '_50x50.jpg', pathAvatar($_SESSION['user_id'])); ?>" class="photo_panel photo" width="50" height="50" />
        
        <div class="user_box_actions">
            <ul>
                <li><strong>bruna_safadinha</strong></li>
                <li><a href="painel.php">Painel de controle</a></li>
                <li><a href="painel_foto_perfil.php" class="change-avatar iframe">alterar foto do perfil</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    
    <div id="menu_left">
        <nav>
            <ul>
                <li class="menu_title">
                    <a href="index.php" class="pagina_inicial">Página inicial</a>
                </li>
                <li class="menu_title">
                    <a href="painel.php" class="default painel">Painel</a>
                    
                    <ul class="submenu">
                        <li <?php echo ((strpos($_SERVER['SCRIPT_NAME'], 'painel.php') !== false) ? 'class="current"' : ''); ?>><a href="painel.php">- Notificações</a></li>
                        <li <?php echo ((strpos($_SERVER['SCRIPT_NAME'], 'painel_editar_perfil.php') !== false) ? 'class="current"' : ''); ?>><a href="painel_editar_perfil.php">- Editar Perfil</a></li>
                        <li <?php echo ((strpos($_SERVER['SCRIPT_NAME'], 'painel_minha_conta.php') !== false) ? 'class="current"' : ''); ?>><a href="painel_minha_conta.php">- Minha conta</a></li>
                        <li <?php echo ((strpos($_SERVER['SCRIPT_NAME'], 'painel_meus_recados.php') !== false) ? 'class="current"' : ''); ?>><a href="painel_meus_recados.php">- Meus recados (1000)</a></li>
                    </ul>
                </li>
                <li class="menu_title">
                    <a href="javascript:void(0);" class="default amigos_favoritos">Amigos e favoritos</a>
                    
                    <ul class="submenu">
                        <li <?php echo ((strpos($_SERVER['SCRIPT_NAME'], 'painel_pedidos_amizades.php') !== false) ? 'class="current"' : ''); ?>><a href="painel_pedidos_amizades.php">- Pedidos de amizade (1000)</a></li>
                        <li <?php echo ((strpos($_SERVER['SCRIPT_NAME'], 'painel_meus_amigos.php') !== false) ? 'class="current"' : ''); ?>><a href="painel_meus_amigos.php">- Meus amigos (1000)</a></li>
                        <li><a href="#">- Meus favoritos (1000)</a></li>
                        <li><a href="#">- De quem sou favorito (1000)</a></li>
                        <li><a href="#">- Usuários bloquados (1000)</a></li>
                    </ul>
                </li>
                <li class="menu_title">
                    <a href="#" class="default meu_logsexy">Meu booksex</a>
                    
                    <ul class="submenu">
                        <li><a href="#">- Minhas fotos (1000)</a></li>
                        <li><a href="#">- Adicionar nova foto</a></li>
                        <li><a href="#">- Estatísticas</a></li>
                    </ul>
                </li> 
                <li class="menu_title last">
                    <a href="#" class="default ferramentas">Ferramentas</a>
                    
                    <ul class="submenu">
                        <li><a href="#">- Convidar um amigo</a></li>
                        <li><a href="#">- Contato / Suporte</a></li>
                        <li><a href="#">- Fazer uma denúncia</a></li>
                    </ul>
                </li>                                                                        
            </ul>
        </nav>
    </div>
</div>