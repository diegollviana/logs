    <footer>
        <div class="container_12">
            <div class="prefix_4 grid_4">
                <ul class="up">
                    <li><a href="index.html">Home</a> |</li>
                    <li><a href="#">Termos de uso</a> |</li>
                    <li><a href="#">Contato</a> |</li>
                    <li><a href="#">Denúncia</a></li>
                </ul>
                
                <p><img src="i/logo_footer.png" alt="logsexy"></p>
            </div>
        </div>
    </footer>
</div>

<script src="js/libs/jquery-1.6.2.min.js"></script>
<script src="js/libs/jquery.placeholder.js" type="text/javascript" charset="utf-8"></script>
<script src="js/libs/jquery-ui/min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/script.js"></script>


<?php	
	if (isset($js_array)){
		foreach($js_array as $key => $js):
?>
			<script type="text/javascript" src="<?php echo $js; ?>"></script>
<?php
		endforeach;
	}
	
	if (isset($css_array)){
		foreach($css_array as $key => $css):
?>
			<link rel="stylesheet" href="<?php echo $css; ?>">
<?php
		endforeach;
	}
?>

<script type="text/javascript">
	$('#btn_login').click(function(){
		var login = $('#input_login').val();
		var senha = $('#input_password').val();
		
		if (login == '' || senha == '' || login == 'login' || senha == 'senha'){
			$('p.announcement').html('Digite seu usuário e senha corretamente!');
			$('div.announcement-message').slideDown();
		} else {
			$('div.announcement-message').slideUp();
			
			$.ajax({
				url: '<?php echo $url_site; ?>login.php?login=' + login + '&senha=' + senha,
				type: 'get',
				global: false,
				success: function(response){
					var str0 = response.charAt(0);
					var str1 = response.charAt(1);
					var str2 = response.charAt(2);
					var str3 = response.charAt(3);
					var str4 = response.charAt(4);
					var str5 = response.charAt(5);
					var str6 = response.charAt(6);
					var str7 = response.charAt(7);
					var str8 = response.charAt(8);
					
					var error = str0 + str1 + str2 + str3 + str4 + str5 + str6 + str7 + str8;
					
					if (error == 'error_001'){
						$('p.announcement').html('Login ou senha inválidos! <a href="esqueci-a-senha.php" class="forgot_password">Esqueceu sua senha?</a>');
						$('div.announcement-message').slideDown();
					} else if (error == 'error_002'){
						$('p.announcement').html('Digite seu usuário e senha conrretamente!');
						$('div.announcement-message').slideDown();
					} else if (error == 'error_003'){
						$('p.announcement').html('Este login está bloqueado! <a href="#">Entre em contato</a> para mais informações!');
						$('div.announcement-message').slideDown();
					} else if (error == 'error_004'){						
							var arrResponse = response.split(';');
							var redirect = 'confirmacao_cadastro.php?cc_enviada=' + arrResponse[3] + '&user=' + arrResponse[1] + '&email=' + arrResponse[2] + '&referer=need_confirm_email';
							document.location.href=redirect;
					} else if (error == 'error_005'){
						document.location.href="painel.php";
					} else {
						$('div.announcement-message').slideUp();
						$('#box_login').html(response);
					}
				}
			})
		}
	})
	
	/*window.setTimeout(function() {
        $('.announcement-message-successful').slideUp(500);
    }, 5000);
	
	window.setTimeout(function() {
        $('.announcement-message').slideUp(500);
    }, 5000);*/
</script>


<?php
	if (strpos($_SERVER['PHP_SELF'], 'painel') !== false){
?>
		<link rel="stylesheet" href="css/fancybox.css">
		
		<script src="js/libs/jquery.fancybox.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
        	$('.change-avatar').fancybox({
				'showCloseButton': true,
				'width'          : 580,
				'height'         : 190,
				'padding'        : 0,
				'margin'         : 0,
				'onClosed'       : function(){
					parent.location.reload(true);
				}
			});
        </script>
<?php	
	}
?>