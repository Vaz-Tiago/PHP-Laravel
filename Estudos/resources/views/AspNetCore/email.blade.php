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

<p>
    public static void Enviar (Contato contato) <br>
    { <br>
        <p class="ident1">

            SmtpClient smtp = new SmtpClient ('string Host', int port); <br>
            Smtp.UseDefaultCredencials = false; <small>// Desabilita o user default</small><br>
            Smtp.Credencials = new NetworkCredential("EmailQueEnvia", "SenhaEmail");<br>
                <small>
                    //Nova credencial recebe dois parametros. O email e a senha <br>
                    //NetworkCredential -> Herda System.Net <br>
                    //Google retorna uma mensagem de alerta de qua algo tentou acessar a conta. É necessário
                    permitir o acesso para conseguir enviar e receber emails.
                </small>
            Smtp.EnableSsl = true; 
            <small>
                //Criptografa as informações
            </small><br>
            <br>
            MailMessage msg = new MailMessage(); <br>
            msg.From = new MailAddress ("EmailQueEnvia"); 
            <small>
                //Email que vai enviar as mensagem
            </small> <br>
            msg.To.Add("EmailQueRecebe");
            <small>// Pode mais de um email.</small>
            msg.Subject = "Assunto";
            msg.Body = variavel do tipo string;
            <small>// Uma váriavel com o todo o conteudo do email.</small> <br>
            msg.IsBodyHtml = true;
            <small>//Seta para true a leitura dfe tags html para o body do email</small> <br>
            <br>
            Smtp.Send(msg); <br>
        </p>
    }
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

<p>
    public IActionResult Contato() <br>
    { 
        <p class="ident1">
            return View();
        </p>
    } <br>
</p>
<p>
    public IActionResult ContatoAcao() <br>
    {
    <p class="ident1">
        <small>
            //Adicionando tratamento de erro: 
        </small>
        <br>
        try <br>
        { </p>
        <p class="ident2">
            Contato contato = new Contato(); <br>
            <br>
            contato.Nome = HttpContext.Request.Form["nome"]; <br>
            contato.Email = HttpContext.Request.Form["email"]; <br>
            contato.Texto = HttpContext.Request.Form["texto"]; <br>
            <br>
            <small>
            //Lista com as mensagens de erro de validação <br>
            //ValidationResult vem do namespace System.ComponentModel.DataAnnotations
            </small> <br>
            var listaMensagens = new List<ValidationResult>(); <br>
            var contexto = new ValidationContext(contato);
            <small>
                //Argumento do metodo é o objeto a ser validado
            </small> <br>
            <br>
            <small>
                //Os 4 parametros do validator são: 1. Objeto, o contexto de validação do Objeto, 
                a lista de erros e se todos sao requeridos(bool). <br>
                //Esse metodo retorna um dado booleano, se retornar verdadeiro envia o email, caso contrario não.
            </small>
            <br>
            bool isValid = Validator.TryValidateObject(contato, contexto, listaMensagens, true); <br>
            <br>
            if (isValid) <br>
            {</p>
            <p class="ident3">
                ContatoEmail.EnviarContatoPorEmail(contato);<br>
                <br>
                ViewData["MSG_S"] = "Mensagem enviada com sucesso!";<br>
            }</p><p class="ident2">
            else <br>
            { </p> <p class="ident3">
                //Faz uma varredura na lista de erros e adiciona um item ao stringbuilder cada vez que encontrar; <br>
                //Esse StringBuilder é adicionado ao ViewData para retornar na view a mensagem de erro. <br>
                <br>
                StringBuilder sb = new StringBuilder(); <br>
                foreach (var texto in listaMensagens) <br>
                { </p> <p class="ident4">
                    sb.Append(texto.ErrorMessage + "<.br />"); <br>
                } </p> <p class="ident3">
            ViewData["MSG_E"] = sb.ToString(); <br>
            <br>
            <small>
                //Caso de erro preenche a ViewData com os campos enviados para retornar ao formulario facilitando assim a correção
            </small><br>
                ViewData["CONTATO"] = contato; <br>
            } </p> <p class="ident2">
        }</p> <p class="ident1">
        catch (Exception e) <br>
        {<p class="ident2">
            ViewData["MSG_E"] = "Opps! Tivemos um erro, tente novamente mais tarde!"; <br>
            <small>
            //TODO - Implementar LOG no erro de enviar contato
            </small>
            <br>
        } </p> <p class="ident1">
        return View("Contato");
    } </p>
</p>
@endsection