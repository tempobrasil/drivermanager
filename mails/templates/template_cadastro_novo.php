<?

function mail_cadastro_novo_getHtml($nome, $email, $trackID){

  $html = '<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body style="background-color:#F5F5F5;padding: 25px;font-family: Tahoma, Geneva, sans-serif;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="background-color: #F8F8F8; border: 1px solid #EEEEEE;; background-image: url(cid:logo); background-repeat:no-repeat; background-position: 15px center; line-height:72px;padding-left: 285px; font-size:20px;color: #666666;">
        NOVO CADASTRO
      </td>
    </tr>
    <tr>
      <td style="border:1px solid #EEEEEE; border-top: 0; background-color: #FFF; padding: 35px; color:#666666;">
      <p>Olá ' . $name . ', tudo bem com você?</p>
        <p>Estamos enviando esse e-mail para avisar você que nossa equipe já foi avisada a respeito do seu cadastro e já está trabalhando nele.
        Em breve já estaremo retornando você com seu acesso de experimental.</p>

        <p>Deixa eu explicar uma coisa pra você: Nosso suporte é um dos nossos pontos fortes e grandes diferenciais.
        Então, pra deixar tudo organizado, criamos no nosso sistema de Suporte o que chamamos de "ticket", que é onde você poderá acompanhar a liberação do seu cadastro.</p>

        <p>Para acompanhar o ticket, <a href="http://suporte.zbraestudio.com.br/admin/admin_ticket.php?track=' . $trackID . '">clique aqui.</a></p>

        <hr>

        <p>Para para documentação, abaixo segue algumas informações suas:</p>
        <ul>
          <li><strong>Nome:</strong> ' . $nome . '</li>
          <li><strong>E-mail:</strong> ' . $email . '</li>
          <li><strong>Ticket ID:</strong> ' . $trackID . '</li>
        </ul>

        <p>Bom, é isso! Estou muito feliz em tê-lo com a gente. Qualquer dúvida, entre em contato com nosso suporte.</p>
        <p>Grande abraço, <br><i>Tihh Gonçalves</i>(Diretor)<br></p>
      </td>
    </tr>
  </table>
  <br/><br/>
  <center>
<span style="font-style:italic; font-size: 11px; margin-top:5px;">
Esta é uma mensagem automática, por favor não responda este e-mail.
Copyright 2017 DriverUP.
</span>
  </center>
  </body>
  </html>';

  return $html;

}

function mail_cadastro_novo_send($nome, $email, $trackID){
  global $mailer;

  $mailer->addAddress($email);
  $mailer->addCC('tiago@zbraestudio.com.br');

  $mailer->Subject = 'Já recebemos seu cadastro!  :)';
  $mailer->Body    = mail_cadastro_novo_getHtml($nome, $email, $trackID);

  if($mailer->send())
    return true;
  else
    return $mailer->ErrorInfo;
}

?>