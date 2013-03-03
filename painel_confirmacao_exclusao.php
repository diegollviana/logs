<?php	
	include('config.php');
	
	
	if (isset($_POST['motivo'])){
		$motivoExclusao = (!empty($_POST['motivo']) ? anti_injection($_POST['motivo']) : '');
		
		$time = time();
		
		$sql = "
		UPDATE users SET 
			username = '" . $_SESSION['username'] . ':' . $time . "',
			email = '" . $_SESSION['email'] . ':' . $time . "', 
			deleted = 1 
		WHERE 
			id = " . $_SESSION['user_id'];
		
		$resultSet = pg_query($conn, $sql);
		
		if ($resultSet){
			$sql = "
			INSERT INTO users_deleted (
				user_id,
				username,
				email,
				motivo,
				deleted_ip,
				created
			) VALUES (
				'" . $_SESSION['user_id'] . "',
				'" . $_SESSION['username'] . "',
				'" . $_SESSION['email'] . "',
				'" . $motivoExclusao . "',
				'" . $_SESSION['last_login_ip'] . "',
				'" . date('Y-m-d H:i:s') . "'
			)";
			
			$resultSetInsert = pg_query($conn, $sql);
			
			if ($resultSetInsert){
?>
				<script type="text/javascript">
                	alert("<?php echo $_SESSION['username']; ?>!\nSua conta foi excluída com sucesso!");
					document.location.href="logout.php";
                </script>
<?php
			} else {
?>
				<script type="text/javascript">
                	alert("<?php echo $_SESSION['username']; ?>!\nNão foi possível excluir sua conta. Por favor, tente novamente, ou entre em contato com o nosso suporte.");
					document.location.href="painel_minha_conta.php";
                </script>
<?php
			}
		}
	}
	
	
	include('include_topo.php');
	
	if (isset($_SESSION['excluir_minha_conta'])){
?>

        <div id="content" class="container_12">
            <div class="grid_12 alpha omega">
                <div class="prefix_1 grid_10 confirmacao_cadastro">
                    <div class="box_notification">
                        <h1><?php echo ucfirst($_SESSION['username']); ?>, não estamos acreditando!</h1>
                    </div>
                    
                    <h2>Você está mesmo disposto a excluir definitivamente sua conta?</h2>
                    
                    <p>Lembre-se, você pode apenas bloqueá-la, assim seu LogSexy e seu perfil não serão mais acessíveis e você poderá manter sua conta bloqueada por tempo indeterminado.</p>
                    
                    <p>Agora, se você está mesmo decidido a excluir sua conta, siga em frente! :(</p>
                    
                    <p>
                        <form action="" method="post">
                            <input type="hidden" name="motivo" id="motivo" value="<?php echo $_SESSION['excluir_minha_conta']; ?>" />
                            <input type="submit" class="button green" value="Estou decidido, quero excluir minha conta" />
                        </form>
                    </p>
                </div>
            </div>
        </div>

<?php
	} else {
?>
		<script type="text/javascript">
        	document.location.href="painel_minha_conta.php";
        </script>
<?php	
		exit;
	}
	
	
	include('include_footer.php');
?>

<script type="text/javascript">
	$('form').submit(function(event){
		if (confirm("Tá legal <?php echo $_SESSION['username']; ?>, Esta é a última vez que perguntamos.\nTem certeza que quer excluir sua conta?")){
			return true;
		} else {
			return false;
		}
		
		event.preventDefault();
	})
</script>