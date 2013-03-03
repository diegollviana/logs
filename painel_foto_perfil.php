<?php	
	include('config.php');
	
	if (!empty($_FILES) AND !empty($_POST['userID'])){
		$userID = anti_injection($_POST['userID']);
		
		$resultSet = pg_query($conn, "SELECT id, username, folder, avatar FROM users WHERE id = " . $userID);
		
		if ($resultSet){
			$result = pg_fetch_array($resultSet);
			
			$username = anti_injection($result['username']);
			$folder   = 'uploads/avatar/' . anti_injection($result['folder']);		
		
			include('class/class.upload/class.upload.php');
			
			$avatar  = new upload($_FILES['Filedata']);
			$avatar2 = new upload($_FILES['Filedata']);
			
			if ($avatar->uploaded AND $avatar2->uploaded) {
				$time     = time();
				
				$filenameAvatar  = $username . '_avatar_' . $time;
				$filenameAvatar2 = $username . '_avatar_' . $time . '_50x50';
	
				// UPLOAD DO AVATAR NORMAL
				$avatar->file_new_name_body   = $filenameAvatar;
				$avatar->file_new_name_ext    = 'jpg';
				$avatar->image_resize         = true;
				$avatar->image_x              = $config['thumbSize']['width'];
				$avatar->image_y              = $config['thumbSize']['height'];
				
				$avatar->process($folder);
				
				
				// UPLOAD DO AVATAR 50x50
				$avatar2->file_new_name_body   = $filenameAvatar2;
				$avatar2->file_new_name_ext    = 'jpg';
				$avatar2->image_resize         = true;
				$avatar2->image_x              = 50;
				$avatar2->image_y              = 50;
				
				$avatar2->process($folder);
				
				if ($avatar->processed AND $avatar2->processed){
					pg_query($conn, "UPDATE users SET avatar = '" . $avatar->file_dst_name . "' WHERE id = " . $userID);
					
					if (is_file($folder . '/' . $result['avatar'])){
						unlink($folder . '/' . $result['avatar']);
						unlink($folder . '/' . str_replace('.jpg', '_50x50.jpg', $result['avatar']));
					}
					
					$avatar->clean();
					$avatar2->clean();
					
					echo $folder . '/' . $avatar->file_dst_name;
					exit;
				} else {
					echo 'error';
					exit;
				}
			}
		} else {
			echo 'error';
			exit;
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alterar foto do perfil</title>

<link rel="stylesheet" type="text/css" href="css/uploadify.css">

<style type="text/css">
	html, body, div, span, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp,
	small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, figcaption, figure,
	footer, header, hgroup, menu, nav, section, summary,
	time, mark, audio, video {
	  margin: 0;
	  padding: 0;
	  border: 0;
	  font-size: 100%;
	  font: inherit;
	  vertical-align: baseline;
	}
	
	article, aside, details, figcaption, figure,
	footer, header, hgroup, menu, nav, section {
	  display: block;
	}
	
	blockquote, q { quotes: none; }
	blockquote:before, blockquote:after,
	q:before, q:after { content: ''; content: none; }
	ins { background-color: #ff9; color: #000; text-decoration: none; }
	mark { background-color: #ff9; color: #000; font-style: italic; font-weight: bold; }
	del { text-decoration: line-through; }
	abbr[title], dfn[title] { border-bottom: 1px dotted; cursor: help; }
	table { border-collapse: collapse; border-spacing: 0; }
	hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
	input, select { vertical-align: middle; }
	
	body { font:13px/1.231 sans-serif; *font-size:small; } 
	select, input, textarea, button { font:99% sans-serif; }
	pre, code, kbd, samp { font-family: monospace, sans-serif; }
	
	html { overflow-y: scroll; }
	a:hover, a:active { outline: none; }
	ol { list-style-type: decimal; }
	nav ul, nav li { margin: 0; list-style:none; list-style-image: none; }
	ul, li { margin: 0; list-style:none; list-style-image: none; }
	small { font-size: 85%; }
	strong, th { font-weight: bold; }
	td { vertical-align: top; }
	
	sub, sup { font-size: 75%; line-height: 0; position: relative; }
	sup { top: -0.5em; }
	sub { bottom: -0.25em; }
	
	pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; padding: 15px; }
	textarea { overflow: auto; }
	.ie6 legend, .ie7 legend { margin-left: -7px; } 
	input[type="radio"] { vertical-align: text-bottom; }
	input[type="checkbox"] { vertical-align: bottom; }
	.ie7 input[type="checkbox"] { vertical-align: baseline; }
	.ie6 input { vertical-align: text-bottom; }
	label, input[type="button"], input[type="submit"], input[type="image"], button { cursor: pointer; }
	button, input, select, textarea { margin: 0; }
	input:valid, textarea:valid   {  }
	input:invalid, textarea:invalid { border-radius: 1px; -moz-box-shadow: 0px 0px 5px red; -webkit-box-shadow: 0px 0px 5px red; box-shadow: 0px 0px 5px red; }
	.no-boxshadow input:invalid, .no-boxshadow textarea:invalid { background-color: #f0dddd; }
	
	::-moz-selection{ background: #FF5E99; color:#fff; text-shadow: none; }
	::selection { background:#FF5E99; color:#fff; text-shadow: none; }
	
	button {  width: auto; overflow: visible; border:0 none; padding:0 }
	.ie7 img { -ms-interpolation-mode: bicubic; }
	
	body, select, input, textarea {  color: #5e4e43; }
	h1, h2, h3, h4, h5, h6 { font-weight: bold; }
	a, a:active, a:visited { text-decoration:none }
	a:hover { text-decoration: underline}
	
	
	.uploadify-button {
        background-color: transparent;
        border: none;
        padding: 0;
    }
    .uploadify:hover .uploadify-button {
        background-color: transparent;
    } 
</style>

<script src="js/libs/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="js/libs/jquery.uploadify.js" type="text/javascript"></script>

</head>
<body>


<div style="width:550px; height:170px; margin:10px;">
	<div class="page-title">
    	<h1 style="font:25px Verdana, Geneva, sans-serif; font-weight:bold;">ALTERAR FOTO DO PERFIL</h1>
    </div>
    <div class="avatar-uploadfy" style="margin-top:10px">
    	<div class="left-avatar" style="float:left; width:110px;">
            <?php
				$resultSet = pg_query($conn, "SELECT id, username, folder, avatar FROM users WHERE id = " . $_SESSION['user_id']);
		
				if ($resultSet){
					$result = pg_fetch_array($resultSet);
					
					$pathAvatar = ((!empty($result['avatar'])) ? $config['pathFotos']['avatar'] . $result['folder'] . '/' . $result['avatar'] : 'i/no_avatar.jpg');
					
					$_SESSION['avatar'] = $result['avatar'];
				}
			?>
            
            <img src="<?php echo $pathAvatar; ?>" class="photo_panel photo" width="130" height="110">
        </div>
        <div class="right-uploadfy" style="margin-left:30px; float:left; width:380px;">
        	<form>
                <div id="queue"></div>
                <input id="file_upload" name="file_upload" type="file">
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadify({
			'multi'           : false,
			'buttonImage'     : 'i/browse-btn.png',
			'width'           : 222,
			'queueSizeLimit'  : 1,
			'fileTypeDesc'    : 'Permitidos',
        	'fileTypeExts'    : '*.gif; *.jpg; *.png',
			'formData'        : {
				'userID'  : '<?php echo $_SESSION['user_id'];?>',
			},
			'method'          : 'post',
			'swf'             : 'i/uploadify.swf',
			'uploader'        : 'painel_foto_perfil.php', 			
			'onUploadSuccess' : function(file, data, response) {
				if (data != 'error'){
					document.location.href="painel_foto_perfil.php";
					//$('.left-avatar').html('<img src="' + data + '" class="photo_panel photo" width="130" height="110">');
				}
			}
			
		});
	});
</script>


</body>
</html>