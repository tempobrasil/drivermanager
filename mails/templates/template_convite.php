<?
function mail_convite_getHtml($nome){

  $html = '<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body style="background-color:#F5F5F5;padding: 25px;font-family: Tahoma, Geneva, sans-serif;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="background-color: #F8F8F8; border: 1px solid #EEEEEE;; background-image: url(cid:logo); background-repeat:no-repeat; background-position: 15px center; line-height:72px;padding-left: 285px; font-size:20px;color: #666666;">
        CONVITE
      </td>
    </tr>
    <tr>
      <td style="border:1px solid #EEEEEE; border-top: 0; background-color: #FFF; padding: 35px; color:#666666;">
      <p>Olá ' . $nome . ', tudo bem com você?</p>
        <p>Estamos enviando esse e-mail para avisar você que nossa equipe já foi avisada a respeito da sua solicitação de convite já está trabalhando nela.
        Em breve já estaremo retornando você!</p>

        <p>Bom, é isso! Estou muito feliz em tê-lo com a gente.<br>
        Qualquer dúvida, entre em contato com nosso suporte.</p>

        <p>Grande abraço!
        <br><i>Tiago Gonçalves</i><br>(Diretor)<br></p>
      </td>
    </tr>
  </table>
  <br/><br/>
  <center>
<span style="font-style:italic; font-size: 11px; margin-top:5px;">
Esta é uma mensagem automática, por favor não responda este e-mail.
Copyright 2017 Driver UP.
</span>
  </center>
  </body>
  </html>';

  return $html;

}

function mail_convite_send($nome, $email){
  global $mailer;

  $mailer->addAddress($email);

  $mailer->addCC('tiago@zbraestudio.com.br');

  $mailer->Subject = 'Já recebemos seu cadastro!  :)';
  $mailer->Body    = mail_convite_getHtml($nome);

  if($mailer->send())
    return true;
  else
    return $mailer->ErrorInfo;
}

?>