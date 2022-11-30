@extends('frontend.layouts.default')
@section('conteudo')
    <div class="slide">
        <img src="{{ asset('frontend/img/fundo_JD2.png') }}" alt="">
    </div>
    <div class="slider">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('frontend/img/FOTOJD2.png') }}" alt="">
            </div>
            <div class="col-md-6">
                <div class="texto-bio fnt">
                    <div class="titulo-bio fnt">
                        Biografia
                    </div>
                    <br><br>
                    <div class="corpo-texto-bio fnt">
                        <p>
                            Iniciou a sua carreira, em Lisboa, na sociedade de advogados Miranda & Associados,
                            tendo posteriormente exercido a advocacia, em Cabo Verde,
                            no escritório JD Advogados, representando investidores estrangeiros e muitas das empresas de
                            maior dimensão em Cabo Verde.
                        </p>
                        <p>
                            Foi Professor em várias Instituições, públicas e privadas, de ensino superior em Cabo Verde
                            e Angola, tendo ocupado por vários anos cargos de Direção em Angola.
                        </p>
                        <p>

                            Tem várias obras publicadas na área do direito privado, nomeadamente Introdução ao
                            Direito Angolano e Teoria Geral do Direito Civil e autor de vários artigos científicos.
                            É advogado em Cabo Verde,
                            Consultor, Mediador, Árbitro e Professor em Angola e Cabo Verde.
                        </p>
                    </div>
                    <div class="row">
                        <div class="button botaocv"><a class="" href="{{ asset('joao_dono_resumo_cv_2022.pdf') }}" target="blanck"><i class="fas fa-folder-minus"></i></a> CV Resumo</div>

                        <div class="button botaocv"><a class="" href="{{ asset('cv_joao_dono_ovembro_2022.pdf') }}" target="blanck"><i class="fas fa-folder-plus"></i></a> CV Completo</div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--Video apresentação-->

    <div class="container" style="height: 500px; width: 100%;">
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/ROf8f9D-OGY" title="YouTube video player"
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>


    </div>
    <!--Fim Video apresentação-->
@endsection
