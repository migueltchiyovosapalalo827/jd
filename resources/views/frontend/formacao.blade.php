@extends('frontend.layouts.default')
@section('conteudo')
        <!--Formação-->
        <div class="p-4 mb-4 text-white img-formacao">
            <div class="container d-flex justify-content-center p-4">
                <div class="col-md-6">
                    <h2 class="display-4 text-center">INSCREVA-SE NA FORMAÇÃO LABORAL</h2>
                   <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
                  </div>
            </div>
          </div>
        <div class="container">

            <h2 class="titulo-a">FORMAÇÃO</h2>
            <br>
  <div class="row mb-2">
      <div class="col-md-12">
          @foreach ($formacoes as $formacao)


    <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col-auto d-none d-lg-block">
            <img src="{{asset($formacao->foto)}}" class="imgcard" style="width: 350px;" height="350px"  alt="">
            </div>
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2" style="color: #692f8f;">Formação</strong>
            <h3 class="mb-0">{{$formacao->nome}}</h3>
            <div class="mb-1 text-muted">Formador: {{$formacao->formador}}</div>
           <!--  <div class="mb-1 text-muted">Data: {{$formacao->data}}</div>
            <p class="mb-auto">Custo: {{$formacao->custo}}.</p>-->
            <a href="{{ route('formacao.vermais', ['formacao'=>$formacao->id]) }}" class="stretched-link">ver mais</a>
          </div>

        </div>
      </div>
      @endforeach
      </div>
  </div>
        </div>
        <!--Fim formação-->
        @endsection
