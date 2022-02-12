@extends('frontend.layouts.default')
@section('conteudo')
    <div class="container" style="margin-top: -10px;">

        <div class="row">
            <div class="col-md-6 py-4">
                <h2 class="titulo-a">SOBRE</h2>
                <br>
                <p class="mbr-text testimonial-text mbr-fonts-style display-7"><h5 class="card-title" style="color: black; font-size: 35px;">João Dono</h5>
					<br>
                    <div class="textosobre">
					<p class="card-text" style="text-align: justify; font-size: 16px;">Licenciado em Direito desde 2003 pela Faculdade de Direito da Universidade Nova de Lisboa (NOVA School of Law), com 17 anos de experiência profissional, em Cabo Verde, Portugal e Angola em advocacia, consultoria e docência universitária. Pós-graduado em Direito Privado pela Faculdade de Direito da Universidade Católica de Lisboa.
						Doutorando em Direito pela NOVA School of Law e Chief Compliance Officer, com curso de especialização em Compliance para a Prevenção da Corrupção pela NOVA School of Law.
						Entre os diversos artigos científicos e as obras publicadas, destacam-se Introdução ao Direito Angolano (2013) e Teoria Geral do Direito Civil (2014), ambos com edição da Escolar Editora. Estes dois livros estão disponíveis nas melhores Universidades do Mundo, como: Harvard Law School Library; Yale University; Stanford University Libraries; University of California Berkeley Law Library.
						</p>

					<p class="card-text" style="text-align: justify; font-size: 16px;">Palestrante e Formador em diversas áreas jurídicas, em temas relacionados com Compliance e Corporate Governace e, bem assim, Gestão, Liderança, Motivação e Reprogramação Mental.</p>

                <p class="mbr-author-desc mbr-fonts-style display-7">
                   OUTRAS OPÇÕES AQUI
                </p>
            </div>
            </div>

            <div class="col-md-6 mbr-figure pl-lg-5 d-none d-lg-block" >
              <img src="{{asset('frontend/img/fundo1.jpg')}}" style="object-fit: cover" height="720" width="100%"  alt="" title="" media-simple="true">
            </div>
        </div>
    </div>
    @endsection
