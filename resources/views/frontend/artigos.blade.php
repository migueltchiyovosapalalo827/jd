@extends('frontend.layouts.default')
@section('conteudo')
    <!--Formação-->
     <div class="p-4 mb-4 text-white img-artigo">
        <div class="container d-flex justify-content-center p-4">
            <div class="col-md-6">
                <h2 class="display-4 text-center">LISTA DE ARTIGOS PUBLICADOS</h2>
               <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
              </div>
        </div>
      </div>
      <!--publicações-->
      <div class="album py-4 ">
          <div class="container">
              <h2 class="titulo-a">ARTIGOS</h2>
              <br>
                   <div class="row">
                   @foreach ($artigos as $item)
                  <div class="col-md-4">
                      <div class="card mb-4 shadow-sm ">
                        <img src="{{asset($item->foto)}}" alt="" class="card-img-top w-100" style="height:225px">
                          <div class="card-body">

                              <h3> {{$item->titulo}}</h3>
                              <p class="card-text">{{$item->resumo}}</p>
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary botao"><a class=""
                                        href="{{ route('artigo', ['artigo'=>$item->id]) }}" role="button"> ver mais </a>
                                    </button>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach

                  </div>

             <div class="pagination justify-content-center m-0">
             {!!$artigos->links()!!}
             </div>
              </div>


          </div>

      <!--fim publicações-->
      <div class="album py-4 ">
        <div class="container">
            <h2 >ARTIGOS PUBLICADOS EM PLATAFORMAS</h2>
            <br>
            <div class="col-md-12 listaartigos">
                <ol>
                    @forelse ($artigosceitifico as $item)
                     <li> <a href="{{$item->url}}"  target="_blank" rel="noopener noreferrer">{{$item->titulo}}</a> in {{$item->editora}} , {{$item->Autores}} , {{$item->volume}} , {{$item->ano}} </li>
                    @empty
                        nenhum artigo publicado em outra plataforma
                    @endforelse
              </ol>
            </div>
            <div class="pagination justify-content-center m-0">
                <a class="btn btn-sm btn-primary" href="{{route('artigoscientifico')}}" role="button"> ver mais </a>
                </div>
            </div>

        </div>
    </div>
    @endsection
