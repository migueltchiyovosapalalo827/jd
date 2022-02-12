@extends('frontend.layouts.default')
@section('conteudo')
        <!--Carrossel-->

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-outline-primary btnslide" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-outline-primary btnslide" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-outline-primary btnslide" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--Fim Carrossel-->
        <!--Apresentação-->
        <div class="container">
            <div class="col-md-12">
                <p>
                <h2 style="font-weight: 500;">
                    Apresentação
                </h2>
                </p>
                <div class="col-md-10 p-0">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div>
        </div>
        <!--Fim Apresentação-->
        <!--publicações-->
        <div class="album py-4 ">
            <div class="container" >
                <h2 class="titulo-a">RECENTES</h2>
                <br>
                <div class="row">
                    @foreach ($artigosRecentes as $item)

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                           <img src="{{$item->foto}}" alt="" class="card-img-top w-100" style="height:225px">
                            <div class="card-body">
                                <h3>{{$item->titulo}}</h3>
                                <p class="card-text">{{$item->resumo}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary botao"><a class=""
                                                href="{{ route('artigo', ['artigo'=>$item->id]) }}" role="button">ver mais</a></button>
                                    </div>
                                    <small class="text-muted">{{$item->data}}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>

                <h2 class="titulo-b">EM DESTAQUE</h2>
                <br>
                <div class="row">

                   @foreach ($artigosMaislidos as $item)
                   <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                       <img src="{{$item->foto}}" alt="" class="card-img-top w-100" style="height:225px">
                        <div class="card-body">
                            <h3>{{$item->titulo}}</h3>
                            <p class="card-text">{{$item->resumo}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary botao"><a class=""
                                            href="{{route('artigo', ['artigo'=>$item->id])}}" role="button">ver mais</a></button>
                                </div>
                                <small class="text-muted">{{$item->data}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                   @endforeach



                </div>
            </div>
        </div>
        <!--fim publicações-->

        <!--Noticias livros newsletter-->
        <div class="container">
            <h2 class="titulo-a">NEWSPAPER</h2>

            <div class="owl-carousel owl-theme">
                @foreach ($newspapers as $item)
                <div class="item">
                    <a href="{{ route('newspaper.ler', ['newspaper'=> $item->id]) }}">
                    <img src="{{$item->foto}}" alt="">
                    <h4>{{$item->titulo}}</h4>
                    </a>
                </div>
                @endforeach

            </div>

            <br>
        </div>
        <!--Fim Noticias-->

        <!--Video apresentação-->

        <div class="container" style="height: 500px; width: 100%;">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/ROf8f9D-OGY"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>


        </div>
        <!--Fim Video apresentação-->
        @endsection
