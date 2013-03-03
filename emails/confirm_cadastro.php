<?php
$confirmCadastro = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirme seu cadastro</title>
</head>
<body>

<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px; border:1px solid #5989C6; font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif; color:#333333;">
	<tbody>
    	<tr>
        	<td style="background:#5989C6; padding:4px 4px 4px 20px;"><span style="font:16px Verdana, Arial, Helvetica, sans-serif; font-weight:bold; color:#FFF;"><em>LogSexy</em></span></td>
        </tr>
        <tr>
        	<td style="padding:15px 20px 5px 20px;">
            	<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%">
                	<tr>
                    	<td><a href="{url_site}perfil.php?pf={username}" style="text-decoration:none; font-size:14px; color:#5989C6; font-weight:bold;">Ol&aacute; {username}!</a></td>
                    </tr>
                    <tr>
                    	<td>
                        	<p style="margin:0px; padding:5px 0px;">
                            	Seja bem vindo(a) ao <em>LogSexy!</em><br />
                                Seu cadastro foi realizado com sucesso, agora voc&ecirc; s&oacute; precisa confirmar que recebeu este email. No bot&atilde;o abaixo voc&ecirc; pode fazer isso!
                            </p>
                            
                            <p style="margin:0px; padding:5px 0px;">
                            	<a href="{url_site}confirmacao_cadastro.php?cc={chave_cadastro}&email={email}&usr={username}" style="display: inline-block; line-height: 13px; /* IE8 hack */ line-height: 16px\0/; border-width: 0px; font-size: 12px; font-family: arial; color: #FFFFFF; font-weight: bold; cursor: pointer; padding: 7px 10px; background-color: #67A54B; border:1px solid #52853D; text-decoration:none;">Confirmar que recebi este email</a>
                            </p>
                            
                            <p style="margin:0px; padding:5px 0px;">
                            	Se voc&ecirc; recebeu este email no seu lixo eletr&ocirc;nico ou na sua caixa de spam, n&atilde;o esque&ccedil;a de marc&aacute;-lo como seguro, removendo dele o marcador de spam ou adicionando o endere&ccedil;o contato@logsexy.com.br na sua lista de contatos.
                            </p>
                            
                            <hr style="height:1px; border-bottom:none; border-top: 1px solid #5989C6; margin:15px 0px 0px 0px;" />
                            
                            <p style="margin:0px; padding:5px 0px;">
                            	Atenciosamente,<br />
                                Central de ralacionamentos do <a href="{url_site}" style="color:#5989C6;">logsexy.com.br</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>';

//echo $confirmCadastro;