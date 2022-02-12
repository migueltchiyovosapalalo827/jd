@extends('frontend.layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/comtentarios.css')}}">
@endsection
@section('conteudo')
  <!--Formação-->
   <div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{asset($newspaper->foto)}}" height="400" width="100%" alt="" style="object-fit: cover;">
        </div>
        <div class="col-md-8">

            <div class="container">

                <p>Publicação: {{$newspaper->created_at}}</p>
                <p style="font-weight: bold; font-size: 16pt; text-transform: uppercase;">{{$newspaper->titulo}}</p>
                <p style="text-align: justify;">{{$newspaper->resumo}}</p>
                <p>NOTA: Para adquirir o conteúdo completo click em baixar e subscreva a newslatter</p>
            </div>
        </div>
    </div>

    <div class="col-md-12 d-flex justify-content-center">

        <div class="d-grid gap-2 col-3 mx-auto">
            <a href="{{ route('newspaper.download',  ['newspaper'=> $newspaper->id]) }}" class="btn botao" type="button">Baixar</a>

        </div>

    </div>


</div>
<!--Footer-->
@endsection
