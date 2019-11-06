@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')

<h3>Envio de Email</h3>
<h5>Classe ContatoEmail</h5>
<b>Libraries\Email</b> <small>//Criado na raíz do projeto.</small> <br><br>

<b>Namespaces necessários:</b> <br>
<p>
    System.Net; <br>
    System.Net.Mail; <br>
</p>

<div class="codigo">
<pre wrap="true">
<code>
public static void Enviar (Contato contato)
{ 
    SmtpClient smtp = new SmtpClient ('string Host', int port);
    //primeiro parametro: smtp.gmail.com 
    //segundo parametro: 465 (SSL exigido); 587 (TLS exigido);
    
    Smtp.UseDefaultCredencials = false;
    // Desabilita o user default

    Smtp.Credencials = new NetworkCredential("EmailQueEnvia", "SenhaEmail");
    //Nova credencial recebe dois parametros. O email e a senha

    //NetworkCredential -> Herda System.Net
    //Google retorna uma mensagem de alerta de qua algo tentou acessar a conta. É necessário
    permitir o acesso para conseguir enviar e receber emails.

    Smtp.EnableSsl = true; 
    //Criptografa as informações

    MailMessage msg = new MailMessage();
    msg.From = new MailAddress ("EmailQueEnvia"); 
    //Email que vai enviar as mensagem

    msg.To.Add("EmailQueRecebe");
    // Pode mais de um email.

    msg.Subject = "Assunto";

    msg.Body = variavel do tipo string;
    // Uma váriavel com o todo o conteudo do email.

    msg.IsBodyHtml = true;
    //Seta para true a leitura dfe tags html para o body do email


    Smtp.Send(msg);
}
</code>
</pre>
</div>

<p>
    
</p>

<h5>HomeController</h5>
<b>Namespaces utilizados:</b> <br>
<p>
    NomeProjeto.Libraries.Email; <br>
    <small>//Classe Criada com o método que envia o Email</small> <br>
    System.Text; <br>
    <small>//Contém o StringBuilder</small> <br>
    System.ComponentModel.DataAnnotations; <br>
    <small>//Para validação dos dados do formulário</small> <br>

</p>

<b>Métodos Contato</b>

<div class="codigo">
<pre wrap="true">
<code>
public IActionResult Contato()
{ 
    return View();
}

public IActionResult ContatoAcao()
{
    //Adicionando tratamento de erro: 
    try
    {
        Contato contato = new Contato();
        contato.Nome = HttpContext.Request.Form["nome"];
        contato.Email = HttpContext.Request.Form["email"];
        contato.Texto = HttpContext.Request.Form["texto"];
        
        //Lista com as mensagens de erro de validação
        //ValidationResult vem do namespace System.ComponentModel.DataAnnotations
        var listaMensagens = new List<.ValidationResult>();
        var contexto = new ValidationContext(contato);
        /*
        *Argumento do metodo é o objeto a ser validado
        *Os 4 parametros do validator são: 1. Objeto, o contexto de validação do Objeto, 
        *a lista de erros e se todos sao requeridos(bool).
        *Esse metodo retorna um dado booleano, se retornar verdadeiro envia o email, caso contrario não.
        */
        bool isValid = Validator.TryValidateObject(contato, contexto, listaMensagens, true);
        if (isValid)
        {
            ContatoEmail.EnviarContatoPorEmail(contato);
            ViewData["MSG_S"] = "Mensagem enviada com sucesso!";
        }
        else
        {
            //Faz uma varredura na lista de erros e adiciona um item ao stringbuilder cada vez que encontrar;
            //Esse StringBuilder é adicionado ao ViewData para retornar na view a mensagem de erro.

            StringBuilder sb = new StringBuilder();
            foreach (var texto in listaMensagens)
            {
                sb.Append(texto.ErrorMessage + "<.br />");
            
            ViewData["MSG_E"] = sb.ToString();
            
            //Caso de erro preenche a ViewData com os campos enviados para retornar ao formulario facilitando assim a correção
            ViewData["CONTATO"] = contato;
        }
    }
    catch (Exception e)
    {
        ViewData["MSG_E"] = "Opps! Tivemos um erro, tente novamente mais tarde!";
    }
    return View("Contato");
}
</code>
</pre>
</div>

</p>
@endsection