@extends('frontend.layouts.default')
@section('conteudo')

        <!--Formação-->
        <div class="p-4 mb-4 text-white img-formacao">
            <div class="container d-flex justify-content-center p-4">
                <div class="col-md-6">
                    <h2 class="display-4 text-center">ASSINE A NEWSPAPER</h2>
                   <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
                  </div>
            </div>
          </div>
        <div class="container">

            <h2 class="titulo-a">Newspaper</h2>
            <br>

            <div class="col-md-12">
                <div class="row" style="width: 100%;">
                    @foreach ($newspapers as $item )


                    <div class="col-md-4 p-2">
                        <div class="container card-newspaper">
                            <a href="{{ route('newspaper.ler', ['newspaper'=> $item->id]) }}">
                            <img src="{{asset($item->foto)}}" alt="Avatar" class="image images">
                            <div class="overlay overlays"><p>{{$item->titulo}}</p></div>
                            </a>
                          </div>
                    </div>
                    @endforeach



                  </div>
            </div>

                <nav aria-label="Contacts Page Navigation">
                    {{$newspapers->links()}}

                </nav>

        </div>
        <!--Fim formação-->
@endsection
