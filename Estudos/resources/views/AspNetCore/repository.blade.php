@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')

<h4>Sistema de Repository</h4>

<h6><b>Repositories/Contracts</b></h6>
<p>
    Add / New Item / ASP.NET Core / Code / Interface 
</p>
<hr>

<p>
    Nomenclatura para criar interface:  <br>
    "I" - Prefixo. <br>
    Nome <br>
    "Repository" - Sufixo <br><br>
    Resultado:
    <b>IColaboradorRepository.cs</b>
</p>

<div class="codigo">
<pre wrap="true">
<code>
using LojaVirtual.Models;
using System.Collections.Generic;

namespace LojaVirtual.Repositories.Contracts
{
    interface IColaboradorRepository
    {
        //Necessário o login:
        Colaborador Login(string Email, string Senha);

        //CRUD

        void Cadastrar(Colaborador colaborador);

        //Obter registro unico de colaborador:
        Colaborador ObterColaborador(int id);

        //Obter Lista de Colaboradores
        IEnumerable< Colaborador > ObterTodosColaboradores();

        void Atualizar(Colaborador id);

        void Excluir(int id);
    }
}
</code>
</pre>
</div>


<h5><b>/Repositories</b></h5>
<b>ColaboradorRepository</b>

<p>
    Implementa a interface IColaboradorRepository <br>
    Construtor para injetar dependencia do modelo Colaborador <br>
</p>

<div class="codigo">
<pre wrap="true">
<code>
using LojaVirtual.Database;
using LojaVirtual.Models;
using LojaVirtual.Repositories.Contracts;
using System.Collections.Generic;
using System.Linq;

namespace LojaVirtual.Repositories
{
    public class ColaboradorRepository : IColaboradorRepository
    {
        private readonly LojaVirtualContext _banco;

        public ColaboradorRepository(LojaVirtualContext banco)
        {
            _banco = banco;
        }

        public void Cadastrar(Colaborador colaborador)
        {
            _banco.Add(colaborador);
            _banco.SaveChanges();
        }

        public void Atualizar(Colaborador colaborador)
        {
            _banco.Update(colaborador);
            _banco.SaveChanges();
        }


        public void Excluir(int id)
        {
            Colaborador colaborador = ObterColaborador(id);
            _banco.Remove(colaborador);
            _banco.SaveChanges();
        }

        public Colaborador Login(string Email, string Senha)
        {
            //Necessario namespace System.Linq para fazer o WHERE no Banco de Dados
            Colaborador colaborador = _banco.Colaboradores.Where(m => m.Email == Email && m.Senha == Senha).FirstOrDefault();
            return colaborador;
        }

        public Colaborador ObterColaborador(int id)
        {
            return _banco.Colaboradores.Find(id);
        }

        public IEnumerable< Colaborador > ObterTodosColaboradores()
        {
            return _banco.Colaboradores.ToList();
        }
    }
}
</code>
</pre>
</div>

<h4>Não esquecer de adicionar o repositório no escopo da aplicação.</h4>
<p>
    Isso é feito por meio da classe <b>Startup.cs</b> no método <b>ConfigureServices()</b> <br> <br>
    services.AddScoped< IColaboradorRepository, ColaboradorRepository >(); <br>
    <small>Nome da Interface , Nome do Repositório</small>
</p>




@endsection