<div class="container center">
    <div class="row">
        <div class="col 7 s9">
            <div class="input-field">
                <input type="text" name="nome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
                <label>Nome</label>
            </div>

            <div class="input-field">
                <input type="text" name="sobrenome" value="{{isset($registro->sobrenome) ? $registro->sobrenome : ''}}">
                <label>Sobrenome</label>
            </div>

            <div class="input-field">
                <input type="email" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
                <label>E-mail</label>
            </div>

            <div class="input-field">
                <input type="text" name="telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
                <label>Telefone</label>
            </div>

            <div class="file-field  input-field">

                <div class="btn orange">
                    <span>Imagem</span>
                    <input type="file" name="imagem">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            @if(isset($registro->imagem))
                <div class="input-field">
                    <img width="150" src="{{asset($registro->imagem)}}" />
                </div>
            @endif
        </div>
    </div>
</div>