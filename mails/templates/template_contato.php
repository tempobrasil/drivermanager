<?

function mail_contato_getHtml($nome, $email, $assunto, $mensagem){

  $html = '<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body style="background-color:#F5F5F5;padding: 25px;font-family: Tahoma, Geneva, sans-serif;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="background-color: #F8F8F8; border: 1px solid #EEEEEE;; background-image: url(cid:logo); background-repeat:no-repeat; background-position: 15px center; line-height:72px;padding-left: 85px; font-size:20px;color: #666666;">
        CONTATO
      </td>
    </tr>
    <tr>
      <td style="border:1px solid #EEEEEE; border-top: 0; background-color: #FFF; padding: 35px; color:#666666;">
        <p><strong>Olá ' . $nome . ', tudo bem?</strong></p>

        <p>Recebemos sua mensagem e assim que for possível estaremos entrando em contato com você para respondê-la.</p>

        <p>Aproveite e faça perguntas no nosso QUIZ!<br>Pode fazer quantas quiser, corre lá: http://www.livresweb.com/quiz</p>

        <hr>

        <p>SUA MENSAGEM:</p>
        <span style="color: #e6656c;font-size: 20px; margin: 25px 0;"> ' . nl2br($mensagem) . '</span>

        <p>Veja também, as demais informações que você enviou pra gente:</p>
        <ul>
          <li><strong>Nome:</strong> ' . $nome . '</li>
          <li><strong>E-mail:</strong> ' . $email . '</li>
          <li><strong>Assunto:</strong> ' . $assunto . '</li>
          <li><strong>Mensagem:</strong> ' . $mensagem . '</li>
        </ul>
      </td>
    </tr>
  </table>
  <br/><br/>
  <center>
<span style="font-style:italic; font-size: 11px; margin-top:5px;">
Esta é uma mensagem automática, por favor não responda este e-mail.
Copyright 2016 LIVRE Movimento Cristão.
</span>
  </center>
  </body>
  </html>';

  return $html;

}

function mail_contato_send($nome, $email, $assunto, $mensagem){
  global $mailer;

  $mailer->addAddress($email);
  $mailer->addCC('tiago@ielbc.com.br');

  $mailer->Subject = 'Recebemos sua mensagem!';
  $mailer->Body    = mail_contato_getHtml($nome, $email, $assunto, $mensagem);

  if($mailer->send()) {
    goPageMessage('Sua mensagem foi enviada com sucesso. Em breve, estaremos entrando em contato com você.');
    exit;
  } else {
    die('ERRO: ' . $mailer->ErrorInfo);
  }

}

?>