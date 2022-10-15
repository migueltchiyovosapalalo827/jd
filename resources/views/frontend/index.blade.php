@extends('frontend.layouts.default')
@section('conteudo')
        <!--Carrossel

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('frontend/img/joadonocapa.jpeg')}}" alt="" style="object-fit: cover;" class="bd-placeholder-img slide-img"  width="100%" height="100%">
                </div>
            
                
            </div>
        </div>
        Fim Carrossel-->
        <div class="imagcapa">
            <img src="{{asset('frontend/img/imagem_de_capa.png')}}" alt="">
        </div>
         <!--Apresentação actualizada 19 de julho de 2022-->
        <div class="container">
            <div class="col-md-12">
                <p>
                <h2 style="font-weight: 500;">
                    Breve Introdução
                </h2>
                </p>
                <div class="col-md-11 p-0 texto-apresentacao">
                    <p>João Dono, natural de Cabo Verde e Residente em Angola, é Doutorando em Direito na NOVA School of Law desde 2020 e, também, Mestrando em Direito Forense e Arbitragem na mesma Faculdade (em fase de conclusão da tese). Licenciado em Direito (2003) pela Faculdade de Direito da Universidade Nova de Lisboa, Pós-Graduado em Direito Privado pela Faculdade de Direito da Universidade Católica Portuguesa, Pós-graduado em Corporate Finance pela Faculdade de Direito da Universidade de Lisboa. Frequenta na Universidade de Lisboa Pós-Graduação em Direito da Arbitragem e, também, Pós-Graduação em Corporate Governance. Com interesse e experiência em matéria fiscal, frequenta Pós-Graadução em Gestão Fiscal no ISCTE.</p>
                    <p>Iniciou a sua carreira, em Lisboa, na sociedade de advogados Miranda & Associados, tendo posteriormente exercido a advocacia, em Cabo Verde, no escritório JD Advogados, representando investidores estrangeiros e muitas das empresas de maior dimensão em Cabo Verde. Foi Professor em várias Instituições, públicas e privadas, de ensino superior em Cabo Verde e Angola, tendo ocupado por vários anos cargos de Direcção em Angola. Tem várias obras publicadas na área do direito privado, nomeadamente Introdução ao Direito Angolano e Teoria Geral do Direito Civil e autor de vários artigos científicos. É advogado em Cabo Verde, Consultor, Mediador, Árbitro e Professor em Angola. É, ainda, Gestor da Academia Dona Leonor Carrinho.</p>
                    <p>Professor convidado no Instituto Politécnico Direito e Democracia (Cabo Verde) e Coordenador Adjunto do Centro de Conciliação e Arbitragem – CCA Global (Cabo Verde). É, também, Professor Convidado na Faculdade de Direito da Universidade Katyavala Bwila (Benguela – Angola). Tem sido orador em diversas conferências, em Angola e Cabo Verde, abordando diversos temas do mundo jurídico, compliance e governance.</p>
                    <p>Membro da Associação Angolana de Corporate Governance e Colaborador do Nova Compliance Lab (NOVA School of Law), sendo um dos formadores do Curso Compliance para Prevenção à Corrupção.
                        </p>
                
                <div class="row">
                    <div class="button botaocv"><a class="" href="{{ asset('CV_JOÃO_DONO_RESUMO_abril_2022.pdf') }}"><i class="fas fa-folder-minus"></i></a> CV Resumo</div>
                    
                    <div class="button botaocv"><a class="" href="{{ asset('curriculum_vita_joão_dono.pdf') }}"><i class="fas fa-folder-plus"></i></a> CV Completo</div>
                </div>
                <br><br>
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
            <h2 class="titulo-a">Legal Alert</h2>

            <div class="owl-carousel owl-theme">
                @foreach ($newspapers as $item)
                <div class="item">
                    <a href="{{ route('legalalert.ler', ['newspaper'=> $item->id]) }}">
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
