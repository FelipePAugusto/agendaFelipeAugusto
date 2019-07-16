<div class="container center">
    <div class="row">
        <div class="col 7 s9">
            <div class="input-field">
                <input type="text" name="titulo" value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
                <label>Título</label>
            </div>

            <div class="input-field">
                <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
                <label>Descrição</label>
            </div>
        </div>
    </div>
</div>