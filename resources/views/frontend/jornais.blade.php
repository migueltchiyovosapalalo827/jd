@extends('frontend.layouts.default')
@section('conteudo')
    <!--Formação-->
     <div class="p-4 mb-4 text-white img-artigo">
        <div class="container d-flex justify-content-center p-4">
            <div class="col-md-6">
                <h2 class="display-4 text-center">LISTA DE ARTIGOS  PUBLICADOS EM JORNAIS E REVISTA</h2>
               <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
              </div>
        </div>
      </div>
      <!--publicações-->
      <div class="album py-4 ">
          <div class="container">
            <h2 class="titulo-c">JORNAIS E REVISTAS</h2>
              <br>
                   <div class="row">

                   <div class="col-md-12 listaartigos">
                    <ol>
                        @forelse ($jornais as $item)
                        <li> <a href="{{$item->url}}"  target="_blank" rel="noopener noreferrer">{{$item->titulo}}</a> in {{$item->nome}} ,PP {{$item->paginas}} , {{$item->ano}} </li>
                        @empty
                        nenhum artigo publicado em jornais ou revistas
                        @endforelse
                  </ol>
                </div>


                  </div>

             <div class="pagination justify-content-center m-0">
             {!!$jornais->links()!!}
             </div>
              </div>


          </div>
    @endsection
