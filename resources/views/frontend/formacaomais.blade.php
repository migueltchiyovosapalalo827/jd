@extends('frontend.layouts.default')
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/comtentarios.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/modals.css')}}">
@endsection
@section('conteudo')
        <!--Formação-->
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{$formacao->foto}}" height="400" width="100%" alt="" style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="container py-4 text-center">
                        <h2 style="font-weight: bold;">INSCREVA-SE NA FORMAÇÃO LABORAL</h2>
                    </div>

                    <div class="container">
                        <p style="font-weight: bold; font-size: 16pt;">{{$formacao->nome}}</p>
                        <p>DATA:  {{$formacao->data}} | 17h00 - 19h00 | PLATAFORMA ZOOM
                            <br>
                            FORMADOR: {{$formacao->formador}}
                            <br>
                            CUSTO : AOA {{$formacao->custo}}</p>

                            <p style="font-weight: 600; font-size: 16pt;">COORDENADAS BANCÁRIAS</p>
                            <p>BANCO MILLENNIUM ATLÂNTICO <br>
                            BENEFICIÁRIO: JM ADVOGADO <br>
                            N.º DA CONTA: 123456789 10 005 <br>
                            IBAN AO06 0055 0000 0000 0000 0000 4</p>

                            <p style="font-weight: 600; font-size: 16pt;">PREENCHA O FORMULÁRIO ABAIXO</p>
                            <p>NOTA: Para a confirmação da sua inscrição, queira, por favor, enviar o comprovativo do pagamento  para o nosso WhatsApp: 939 581 062 ou  para geral@jmadvogado.com</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 d-flex justify-content-center">

                <div class="d-grid gap-2 col-3 mx-auto" style="padding-top: 20px;">
                    <button class="btn botao" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Inscrever-se</button>
                  </div>

            </div>

           <!--Modal login-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <!-- <h5 class="modal-title">Modal title</h5> -->
            <h2 class="fw-bold mb-0">Faça o login</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body p-5 pt-0">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="formacao_id" value="{{$formacao->id}}">
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control rounded-4" id="floatingInput"  value="{{old('email')}}" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
              </div>
              <button class="w-100 mb-2 btn btn-lg botao" type="submit">Login</button>

              <p class="mb-1">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"> Esqueceu sua senha?</a>
                @endif
              <br>
              <a href="{{ route('candidatura', ['formacao'=>$formacao->id]) }}" class="">Quero me cadastrar</a></p>

            </form>
          </div>

    </div>
  </div>
</div>

           <!--Fim Modal login-->
        </div>
        @endsection
