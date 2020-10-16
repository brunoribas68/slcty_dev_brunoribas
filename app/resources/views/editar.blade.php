@php
    $erros = session('erros');
    if (!is_null($erros)) {
      $key = array_key_first($erros);
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulario de Cadasto</title>
    @if (isset($key))
      <input type="hidden" name="_step" value="{{$key}}">
    @endif
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../resources/css/app.css">

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
                                <form id="formulario" method="post" action="{{route("editarCadastro")}}">
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
                                                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" value="{{$dados["nome"]}}">
                                                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" aria-describedby="idUsuario" value="{{$dados["idUsuario"]}}">
                                                @if (isset($erros["nome"]))
                                                  <small id="nomeErr" class="alert alert-danger" >{{$erros["nome"][0]}}</small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email"  name="email" aria-describedby="email" value="{{$dados["email"]}}">
                                                @if (isset($erros["email"]))
                                                  <small id="emailErr" class="alert alert-danger" >{{$erros["email"][0]}}</small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$dados["telefone"]}}" aria-describedby="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                                @if (isset($erros["telefone"]))
                                                  <small id="telefoneErr" class="alert alert-danger" >{{$erros["telefone"][0]}}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="button" name="next" id="firstStep" class="next action-button" value="Próximo" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Informações Profissionais</h2>
                                            <br>
                                            <div class="form-group" >
                                              <label for="experiencia" >Experiência </label>
                                              @foreach ($dados["experiencias"] as $contE => $experiencia)
                                                <label for="experiencia" >Experiência </label>
                                                <input type="text" class="form-control" id="experiencia[{{$contE}}][experiencia]" name="experiencia[{{$contE}}][experiencia]" value="{{$experiencia["experiencia"]}}" aria-describedby="experiencia">
                                                <input type="hidden" class="form-control" id="experiencia[{{$contE}}][idExperiencia]" name="experiencia[{{$contE}}][idExperiencia]" value="{{$experiencia["idExperiencia"]}}" aria-describedby="experiencia">
                                                <input type="hidden" name="countE" value="{{$contE}}">

                                              @endforeach
                                              <div class="form-group " id="experienciaDiv" style="display:none;">
                                                <label for="experiencia" >Experiência </label>
                                                <input type="text" class="form-control" id="experiencia[]" name="experiencia[]" aria-describedby="experiencia">
                                              </div>
                                            </div>
                                            <a href="#" id="maisExperiencia">
                                              + Mais Experiências
                                            </a>
                                            <br>
                                            <div class="form-group">
                                              <label for="formacao">Formação</label>
                                              @foreach ($dados["formacoes"] as $contF => $formacao)
                                                <label for="formacao">Formação</label>
                                                <input type="text" class="form-control" id="formacao[{{$contF}}][formacao]" name="formacao[{{$contF}}][formacao]" value="{{$formacao["formacao"]}}" aria-describedby="experiencia">
                                                <input type="hidden" class="form-control" id="formacao[{{$contF}}][idFormacao]" name="formacao[{{$contF}}][idFormacao]" value="{{$formacao["idFormacao"]}}" aria-describedby="experiencia">
                                                <input type="hidden" name="countF" value="{{$contF}}">
                                              @endforeach
                                            </div>
                                            <div class="form-group " style="display:none;" id="formacaoDiv">
                                              <label for="formacao">Formação</label>
                                              <input type="text" class="form-control"  name="formacao[]" aria-describedby="experiencia">
                                            </div>
                                            <a href="#" id="maisFormacao">
                                              + Mais Formação
                                            </a>
                                        </div>
                                        <input type="button" name="previous" id="previousSecond"  class="previous action-button-previous" value="Anterior" />
                                         <input type="button" id="secondStep" name="next" class="next action-button" value="Próximo" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Dados Pessoais</h2>
                                            <div class="form-group">
                                                <label for="usuario">Usuario</label>
                                                <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuario"  value="{{$dados["usuario"]}}">
                                                @if (isset($erros["usuario"]))
                                                  <small id="usuarioErr" class="alert alert-danger" >{{$erros["usuario"][0]}}</small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="senhas">Senha</label>
                                                <input type="password" class="form-control" id="senha" name="senha" aria-describedby="senha" value="*********" >
                                                @if (isset($erros["senha"]))
                                                  <small id="senhaErr" class="alert alert-danger" >{{$erros["senha"][0]}}</small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="telefone">Confirmar Senha</label>
                                                <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" aria-describedby="senha_confirmation"  value="*********">
                                                @if (isset($erros["senha_confirmation"]))
                                                  <small id="senhaErr" class="alert alert-danger" >{{$erros["senha_confirmation"][0]}}</small>
                                                @endif
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
<script src="../resources/js/passosFormulario.js" charset="utf-8"></script>
<script src="../resources/js/multiplicarCampos.js" charset="utf-8"></script>
<script src="../resources/js/mascara.js" charset="utf-8"></script>

</html>
