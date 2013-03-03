<?php
$cadastroConfirmado = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro confirmado</title>
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
                    	<td><a href="#" style="text-decoration:none; font-size:14px; color:#5989C6; font-weight:bold;">Olá {username}!</a></td>
                    </tr>
                    <tr>
                    	<td>
                        	<p style="margin:0px; padding:5px 0px;">
                            	parab&eacute;ns, seu cadastro foi confirmado e ativado com sucesso!<br />
								Agora voc&ecirc; já pode acessar o logsexy com seu usu&aacute;rio e senha abaixo:
                            </p>
                            
                            <p style="margin:0px; padding:5px 0px;">
                            	Usuário: {username}<br />
								Senha: {senha}
                            </p>
                            
                            <p style="margin:0px; padding:5px 0px;">
                            	Se voc&ecirc; recebeu este email no seu lixo eletr&ocirc;nico ou na sua caixa de spam, n&atilde;o esque&ccedil;a de marc&aacute;-lo como seguro, removendo dele o marcador de spam ou adicionando o endere&ccedil;o contato@logsexy.com.br na sua lista de contatos.
                            </p>
                            
                            <hr style="height:1px; border-bottom:none; border-top: 1px solid #5989C6; margin:15px 0px 0px 0px;" />
                            
                            <p style="margin:0px; padding:5px 0px;">
                            	Atenciosamente,<br />
                                Central de ralacionamentos do <a href="#" style="color:#5989C6;">logsexy.com.br</a>
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

//echo $cadastroConfirmado;