@extends('frontend.layouts.default')
@section('conteudo')
<div class="p-4 mb-4 text-white img-artigo">
    <div class="container d-flex justify-content-center p-4">
        <div class="col-md-6">
            <h2 class="display-4 text-center" style="text-transform: uppercase;">ARTIGOS PUBLICADOS EM PLATAFORMAS</h2>
           <!-- <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
          </div>
    </div>
  </div>
  <!--publicações-->
  <div class="album py-4 ">
      <div class="container">
          <h2 class="titulo-c">LISTA DE ARTIGOS PUBLICADOS</h2>
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
            {!!$artigosceitifico->links()!!}
            </div>
      </div>
  </div>
  <!--fim publicações-->
<br><br>
@endsection
