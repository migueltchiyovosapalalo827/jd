@extends('frontend.layouts.default')
@section('conteudo')
    <!--Formação-->
     <div class="p-4 mb-4 text-white img-artigo">
        <div class="container d-flex justify-content-center p-4">
            <div class="col-md-6">
                <h2 class="display-4 text-center">LISTA DE LIVROS PUBLICADOS</h2>
               <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
              </div>
        </div>
      </div>
      <!--publicações-->
      <div class="album py-4 ">
          <div class="container">
              <h2 class="titulo-a">Livros</h2>
              <br>
                   <div class="row">
                   @foreach ($livros as $item)
                  <div class="col-md-4">
                      <div class="card mb-4 shadow-sm ">
                        <img src="{{asset($item->capa)}}" alt="" class="card-img-top w-100" style="height:225px">
                          <div class="card-body">

                              <h3> {{$item->titulo}}</h3>
                              <p class="card-text">{{$item->resumo}}</p>
                              <p class="card-text">Autores: {{$item->Autores}}</p>
                              <p class="card-text">Editora: {{$item->editora}}</p>
                              <p class="card-text">Ano de publicação: {{$item->ano}}</p>
                              <p class="card-text">Volume: {{$item->volume}}</p>
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary botao"><a class=""
                                        href="{{$item->url}}" target="_blank" rel="noopener noreferrer" role="button"> ver mais </a>
                                    </button>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach

                  </div>

             <div class="pagination justify-content-center m-0">
             {!!$livros->links()!!}
             </div>
              </div>


          </div>
    @endsection
