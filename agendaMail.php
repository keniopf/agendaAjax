<?

  ##---------------------------------------------------
  ##  Envio de Emails pelo SMTP Autênticado usando PEAR
  ##---------------------------------------------------
  # Mais detalhes sobre o PEAR:
  #   http://pear.php.net/
  #
  # Mais detalhes sobre o PEAR Mail:
  #   http://pear.php.net/manual/en/package.mail.mail-mime.php
  ##---------------------------------------------------

  # Faz o include do PEAR Mail e do Mime.
  include ("Mail.php");
  include ("Mail/mime.php");

  $nome = $_POST['nome'];
  $telefone =$_POST['telefone'];
  $email = $_POST['email'];
  $servico = $_POST['servico'];
  $data = $_POST['data'];
  $hora = $_POST['hora'];

  //Formatar data
  function data($data){
    return date("d/m/Y", strtotime($data));
    }
  
  
  

  # E-mail de destino. Caso seja mais de um destino, crie um array de e-mails.
  # *OBRIGATÓRIO*
  $recipients = 'agendamentos@webcartoriosobradinho.com.br';

  # Cabeçalho do e-mail.
  $headers =
    array (
      'From'    => 'agendamentos@webcartoriosobradinho.com.br', # O 'From' é *OBRIGATÓRIO*.
      'To'      => 'agendamentos@webcartoriosobradinho.com.br',
      'Subject' => utf8_decode('Agendamentos de  - '.$nome. ' - '.$email.' - '.$telefone ) ,
      'Date'    => date('r')
    );

  # Utilize esta opção caso deseje definir o e-mail de resposta
  # $headers['Reply-To'] = 'EMailDeResposta@DominioDeResposta.com';

  # Utilize esta opção caso deseje definir o e-mail de retorno em caso de erro de envio
  # $headers['Errors-To'] = 'EMailDeRerornoDeERRO@DominioDeretornoDeErro.com';

  # Utilize esta opção caso deseje definir a prioridade do e-mail
  # $headers['X-Priority'] = '3'; # 1 UrgentMessage, 3 Normal

  # Define o tipo de final de linha.
  $crlf = "\r\n";

  # Corpo da Mensagem e texto e em HTML
  $text = 'Escreva aqui o texto do seu e-mail';
  
  $html = utf8_decode( "<HTML>
      <BODY>
          
          <h2><b>Agendamento<b></h2>
          
          <h3>Nome: '$nome'</h3>
   
          <h3>Telefone: '$telefone'</h3>

          <h3>Telefone: '$email'</h3>
    
          <h3>Serviço: '$servico'</h3>

          <h3>Data: '$data'   </h3>

          <h3>Hora: '$hora' </h3>
    
      </BODY>
    </HTML>");


  # Instancia a classe Mail_mime
  $mime = new Mail_mime($crlf);

  # Coloca o HTML no email
  $mime->setHTMLBody($html);


##  # Anexa um arquivo ao email.
##  $mime->addAttachment('/home/suapastahome/www/seuarquivo.txt');

  # Procesa todas as informações.
  $body = $mime->get();
  $headers = $mime->headers($headers);

  # Parâmetros para o SMTP. *OBRIGATÓRIO*
  $params =
    array (
      'auth' => true, # Define que o SMTP requer autenticação.
      'host' => 'smtp.webcartoriosobradinho.com.br', # Servidor SMTP
      'username' => 'agendamentos=webcartoriosobradinho.com.br', # Usuário do SMTP
      'password' => 'C@rtorio2' # Senha do seu MailBox.
    );

  # Define o método de envio
  $mail_object =& Mail::factory('smtp', $params);

  # Envia o email. Se não ocorrer erro, retorna TRUE caso contrário, retorna um
  # objeto PEAR_Error. Para ler a mensagem de erro, use o método 'getMessage()'.
  $result = $mail_object->send($recipients, $headers, $body);
  if (PEAR::IsError($result))
  {
    echo "ERRO ao tentar enviar o email. (" . $result->getMessage(). ")";
  }
  else
  {
   
  }
?>
  ?>