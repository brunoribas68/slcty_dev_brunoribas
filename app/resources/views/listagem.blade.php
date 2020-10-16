@php
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Cadastros</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="resources/css/app.css">
</head>

<body>
    <div class="container">
        <div id="accordion">
            @foreach ($cadastros as $cadastro)
            <div class="card">
                <div class="card-header" id="heading{{$cadastro["idUsuario"]}}">
                  <div class="row">
                      <h5 class="col-6">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$cadastro["idUsuario"]}}" aria-expanded="true" aria-controls="collapse{{$cadastro["idUsuario"]}}">
                              {{$cadastro["nome"]}}
                          </button>
                      </h5>
                    <h5 class="col-1">
                      <a href="{{route('deletarCadastro',$cadastro["idUsuario"])}}">
                        <i class="fas fa-trash-alt" style="font-size:30px;color:red"></i>
                      </a>
                    </h5>
                    <h5 class="col-1">
                      <a href="{{route("formulario")}}">
                        <i class="fas fa-user-plus" style="font-size:30px;color:green"></i>
                      </a>
                    </h5>
                    <h5 class="col-1">
                      <a href="{{route("formularioEditarCadastro",$cadastro["idUsuario"])}}">
                        <i class="fas fa-edit" style="font-size:30px"></i>
                      </a>
                    </h5>
                  </div>
                </div>

                <div id="collapse{{$cadastro["idUsuario"]}}" class="collapse show" aria-labelledby="heading{{$cadastro["idUsuario"]}}" data-parent="#accordion">
                    <div class="card-body">
                      @if ($cadastro["email"])
                        <div class="list-group">
                          <button type="button" class="list-group-item list-group-item-action active">
                            Email
                          </button>
                          <a href="{{$cadastro["email"]}}">
                            <button type="button" class="list-group-item list-group-item-action">{{$cadastro["email"]}}</button>
                          </a>
                        </div>
                      @endif
                      @if ($cadastro["telefone"])
                        <div class="list-group">
                          <button type="button" class="list-group-item list-group-item-action active">
                            Telefone
                          </button>
                          <a href="tel:+55 {{$cadastro["telefone"]}}">
                            <button type="button" class="list-group-item list-group-item-action">{{$cadastro["telefone"]}}</button>
                          </a>
                        </div>
                      @endif

                      @if ($cadastro["formacoes"])
                        <div class="list-group">
                          <button type="button" class="list-group-item list-group-item-action active">
                            Formação
                          </button>
                          @foreach ($cadastro["formacoes"] as $formacao)
                            <button type="button" class="list-group-item list-group-item-action">
                            <div class="row">
                              <div class="col-10">
                                <a href="https://www.google.com/search?q={{$formacao["formacao"]}}">
                                  {{$formacao["formacao"]}}
                                </a>
                              </div>
                              <div class="col-2">
                                <a href="{{route('deletarFormacao',$formacao["idFormacao"])}}">
                                  <i class="fas fa-trash-alt" style="font-size:30px;color:red"></i>
                                </a>
                              </div>
                            </div>
                            </button>
                          @endforeach
                        </div>
                      @endif

                      @if ($cadastro["experiencias"])
                        <div class="list-group">
                          <button type="button" class="list-group-item list-group-item-action active">
                            Experiências
                          </button>
                          @foreach ($cadastro["experiencias"] as $experiencia)

                            <button type="button" class="list-group-item list-group-item-action">
                            <div class="row">
                              <div class="col-10">
                                <a href="https://www.google.com/search?q={{$experiencia["experiencia"]}}">
                                  {{$experiencia["experiencia"]}}
                                </a>
                              </div>
                              <div class="col-2">
                                <a href="{{route('deletarExperiencia',$experiencia["idExperiencia"])}}">
                                  <i class="fas fa-trash-alt" style="font-size:30px;color:red"></i>
                                </a>
                              </div>
                            </div>
                            </button>
                          @endforeach
                        </div>
                      @endif
                    </div>
                </div>
            </div>
            @endforeach

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
