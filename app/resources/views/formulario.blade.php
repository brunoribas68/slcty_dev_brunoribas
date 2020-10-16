<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
if (isset($erros)) {
  dd($erros);
}
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <link rel="stylesheet" href="resources/css/app.css">

<body>
    <div class="container">
        <!-- MultiStep Form -->
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2><strong>Cadastro</strong></h2>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="formulario" method="post" action="{{route("cadastro")}}">
                                  @csrf
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="pessoal"><strong>Pessoal</strong></li>
                                        <li id="profissional"><strong>Profissional</strong></li>
                                        <li id="conta"><strong>Conta</strong></li>
                                        <li id="sucesso"><strong>Cadastrado</strong></li>
                                    </ul> <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Dados Pessoais</h2>
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" >
                                                @if (isset($erro) && $erro["nome"])
                                                  <small id="nomeErr" class="alert alert-danger" >{{$erro["nome"]}}</small>
                                                @endif
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"  name="email" aria-describedby="email">
                                                @if (isset($erro) && $erro["email"])
                                                  <small id="emailErr" class="alert alert-danger" style="display:none"></small>
                                                @endif
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                                <small id="telefoneErr" class="alert alert-danger" style="display:none"></small>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Próximo" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Informações Profissionais</h2>
                                            <br>

                                            <div class="form-group" id="experienciaDiv">
                                              <label for="experiencia" >Experiência </label>
                                                <input type="text" class="form-control" id="experiencia[]" name="experiencia[]" aria-describedby="experiencia">
                                                <small id="telefoneErr" class="lert alert-danger" style="display:none"></small>
                                            </div>
                                            <a href="" id="maisExperiencia">
                                              + Mais Experiências
                                            </a>
                                            <br>
                                            <div class="form-group" id="formacaoDiv">
                                              <label for="formacao">Formação</label>
                                                <input type="text" class="form-control" id="formacao[]" name="formacao[]" aria-describedby="experiencia">
                                            </div>
                                            <a href="" id="maisFormacao">
                                              + Mais Formação
                                            </a>
                                        </div>
                                        <input type="button" name="previous" id="previousSecond"  class="previous action-button-previous" value="Anterior" />
                                         <input type="button" name="next" class="next action-button" value="Próximo" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Dados Pessoais</h2>
                                            <div class="form-group">
                                                <label for="usuario">Usuario</label>
                                                <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuario" >
                                            </div>
                                            <div class="form-group">
                                                <label for="senhas">Senha</label>
                                                <input type="password" class="form-control" id="senha" name="senha" aria-describedby="senha" >
                                            </div>
                                            <div class="form-group">
                                                <label for="telefone">Confirmar Senha</label>
                                                <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" aria-describedby="senha_confirmation" >
                                            </div>
                                        </div>
                                        <input type="button" name="previous"  id="previousFinal" class="previous action-button-previous" value="Anterior" />
                                        <input type="submit"  class="action-button" value="Enviar" id="enviar" value="Enviar"/>

                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Successo !</h2> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                            </div> <br><br>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
<script src="resources/js/passosFormulario.js" charset="utf-8"></script>
<script src="resources/js/multiplicarCampos.js" charset="utf-8"></script>
<script src="resources/js/mascara.js" charset="utf-8"></script>

</html>
