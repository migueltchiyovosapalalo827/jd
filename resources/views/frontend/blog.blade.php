@extends('frontend.layouts.default')
@section('conteudo')
        <br><br>
        <div class="container">

            <h2 class="titulo-a">BLOG</h2>
            <br>
            <div class="row mb-2">
                <div class="col-md-8">
                    @foreach ($blogs as $item)
                    <div class="col-md-12">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col-auto d-none d-lg-block">
                                <img src="{{asset($item->foto)}}" class="imgcard" style="width: 250px;" height="250px" alt="">
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3 class="mb-2 d-inline-block" style="color: #692f8f;">{{$item->titulo}}</h3>
                                <div class="mb-1 text-muted">{{$item->created_at}}</div>
                                <p class="mb-auto">{{$item->resumo}}</p>
                                <a href="{{ route('blog.ler', ['blog'=>$item->id]) }}" class="stretched-link">Ler Mais</a>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-md-4 overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
                    <div class="blog-imagem-principal">
                        <div class="card w-100 p-4" style="border-radius: 1px;">
                            <img class=" p-4" height="95" width="100" style="margin: 0 auto;" src="{{asset('frontend/img/logolilas.png')}}"
                                alt="Imagem de capa do card">

                            <form>
                                <input class="form-control my-3" type="text" placeholder="Search" aria-label="Search">
                            </form>
                            <div class="border-top py-4">
                                <h4 class="fst-italic titulo-card-blog">Categoria</h4>
                                <ol class="list-unstyled mb-0">
                                    <li><a href="#">Tecnologia</a></li>
                                    <li><a href="#">Política</a></li>
                                    <li><a href="#">Agricultura</a></li>
                                    <li><a href="#">Economia</a></li>
                                    <li><a href="#">Cultura</a></li>
                                    <li><a href="#">internacional</a></li>
                                </ol>
                            </div>
                            <div class="border-top py-4">
                                <h4 class="fst-italic titulo-card-blog">Archivos</h4>
                                <ol class="list-unstyled mb-0">
                                    <li><a href="#">March 2021</a></li>
                                    <li><a href="#">February 2021</a></li>
                                    <li><a href="#">January 2021</a></li>
                                    <li><a href="#">December 2020</a></li>
                                    <li><a href="#">November 2020</a></li>
                                    <li><a href="#">October 2020</a></li>
                                    <li><a href="#">September 2020</a></li>
                                    <li><a href="#">August 2020</a></li>
                                    <li><a href="#">July 2020</a></li>
                                    <li><a href="#">June 2020</a></li>
                                    <li><a href="#">May 2020</a></li>
                                    <li><a href="#">April 2020</a></li>
                                </ol>
                            </div>
                            <div class="border-top py-4">
                                <h4 class="fst-italic titulo-card-blog">Artigos</h4>
                                <ol class="list-unstyled mb-0">
                                    <li><a href="#">March 2021</a></li>
                                    <li><a href="#">February 2021</a></li>
                                    <li><a href="#">January 2021</a></li>
                                    <li><a href="#">December 2020</a></li>
                                    <li><a href="#">November 2020</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
