<?php	
	include('config.php');	
	
	include('include_topo.php');
?>

    <div id="content" class="container_12">
        <div class="grid_12 alpha omega">
            <div class="prefix_1 grid_10 confirmacao_cadastro">
                <div class="box_notification">
                    <h1>Página não encontrada!</h1>
                </div>
                
                <h2>A página que você tentou acessar não existe ou não foi encontrada.</h2>
                
                <p>Você pode ter clicado em um link expirado ou digitado o endereço errado. Alguns endereços de internet diferenciam letras maiúsculas de minúsculas.</p>
                
                <p><a href="<?php echo $url_site; ?>" class="button green" title="pagina inicial">Voltar à pagina inicial</a></p>
            </div>
        </div>
    </div>
    
<?php	
	include('include_footer.php');
?>