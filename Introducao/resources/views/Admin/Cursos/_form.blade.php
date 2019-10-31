<div class="input-field">
    <input type="text" name="titulo" value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
    <label for="titulo">Título</label>
</div>

<div class="input-field">
    <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
    <label for="titulo">Descrição</label>
</div>

<div class="input-field">
    <input type="text" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
    <label for="titulo">Valor</label>
</div>

<div class="file-field input-field">
    <div class="btn blue">
        <span>Imagem</span>
        <input type="file" name="imagem">
    </div>
    <div class="file-path-wrapper">
        <input type="text" class="file-path validate">
    </div>
</div>

@if (isset($registro->imagem))
    <div class="input-field">
        <img width="150" src="{{ asset($registro->imagem) }}">
    </div>
@endif


<div>
    <label>
        <p>
            <input type="checkbox" name="publicado" id="test5" checked="{{isset($registro->publicado) && $registro->publicado == 'sim' ? 'checked' : '' }}"  value="true" />
            <span>Publicar?</span>
        </p>
    </label>
</div>
<br>


