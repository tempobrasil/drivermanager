<?

function mail_aula_assistindo_getHtml($cursoTB, $moduloTB, $aulaTB){

  $html = '<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body style="background-color:#F5F5F5;padding: 25px;font-family: Tahoma, Geneva, sans-serif;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="background-color: #F8F8F8; border: 1px solid #EEEEEE;; background-image: url(cid:logo); background-repeat:no-repeat; background-position: 15px center; line-height:72px;padding-left: 85px; font-size:20px;color: #666666;">
        AULA SENDO ASSISTIDA
      </td>
    </tr>
    <tr>
      <td style="border:1px solid #EEEEEE; border-top: 0; background-color: #FFF; padding: 35px; color:#666666;">
        <p><strong>O aluno ' . perfil_nome() . ', começou a assistir uma aula.</strong></p>
        <hr>
        <p>AULA:</p>
        <span style="color: #e6656c;font-size: 20px; margin: 25px 0;"> ' . $aulaTB->Titulo . '</span>

        <p>Outras informações:</p>
        <ul>
          <li><strong>Aluno:</strong> ' . perfil_nome() . ' (' . perfil_email() . ')</li>
          <li><strong>Curso:</strong> ' . $cursoTB->Nome . '</li>
          <li><strong>Módulo:</strong> ' . $moduloTB->Nome . '</li>
          <li><strong>Aula:</strong> ' . $aulaTB->Titulo . '</li>
          <li><strong>Data e hora:</strong> ' . date('d/m/Y H:i') . '</li>

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

function mail_aula_assistindo_send($aula){
  global $mailer;

  $aulaTB = LoadRecord('CursoModuloAulas', $aula);
  $moduloTB = LoadRecord('CursoModulos', $aulaTB->Modulo);
  $cursoTB = LoadRecord('Cursos', $moduloTB->Curso);

  $mailer->addAddress('tiago@ielbc.com.br');

  $mailer->Subject = perfil_nome() . ' começou a assistir uma aula';
  $mailer->Body    = mail_aula_assistindo_getHtml($cursoTB, $moduloTB, $aulaTB);

  $mailer->send();

}

?>