@extends('frontend.layouts.default')
@section('conteudo')
        <!--Formação-->
        <div class="d-flex titulo-texto">
            <div class="container p-5 text-center">
                <h2>{{$artigo->titulo}}</h2>
            </div>

        </div>
        <br><br>
        <div class="container justify-content-between">
            <div class="container d-flex justify-content-center pb-5">

                <img src="{{asset($artigo->foto)}}" width="80%" height="400" alt=""
                    style="object-fit: cover; margin: 0 auto;">
            </div>

            <p class="texto-completo pb-5">
                {{$artigo->resumo}}
                <br><br>
               {{$artigo->conteudo}}
                <br><br>
                Autor: {{$artigo->autor}}
                <br><br>
                Data de Publicação: {{$artigo->data}}
            </p>

        </div>
        @endsection

