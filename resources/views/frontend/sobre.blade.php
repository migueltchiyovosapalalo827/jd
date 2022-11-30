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
					<p class="card-text" style="text-align: justify; font-size: 16px;">
                        João Dono, natural de Cabo Verde e residente em Angola, é Doutorando em Direito na NOVA School of Law desde 2020. Licenciado em Direito (2003) pela Faculdade de Direito da Universidade Nova de Lisboa com distinção, Pós-graduado em Direito Privado pela Faculdade de Direito da Universidade Católica Portuguesa, Pós-graduado em Pós-graduação Avançada em Direito das Sociedades e, também, em Direito da Arbitragem pela Faculdade de Direito da Universidade de Lisboa. É ainda, Pós-graduado em Gestão Fiscal no ISCTE e, Mestrando em Gestão de Empresas no ISCTE, sólidos conhecimentos de fiscalidade, gestão fiscal e gestão de empresas.
						</p>

					<p class="card-text" style="text-align: justify; font-size: 16px;">
					    Iniciou a sua carreira, em Lisboa, na sociedade de advogados Miranda & Associados, tendo posteriormente exercício a advocacia, em Cabo Verde, no escritório JD Advogados, representando investidores estrangeiros e muitas das empresas de maior dimensão em Cabo Verde. Foi Professor em várias Instituições, públicas e privadas, de ensino superior em Cabo Verde e Angola, tendo ocupado por vários anos cargos de Direção em Angola. Tem várias obras publicadas na área do direito privado, nomeadamente Introdução ao Direito Angolano e Teoria Geral do Direito Civil e autor de vários artigos científicos. É advogado em Cabo Verde, Consultor, Mediador, Árbitro e Professor em Angola e Cabo Verde.
					  </p>

					   	<p class="card-text" style="text-align: justify; font-size: 16px;">
					   	 Professor convidado no Instituto Politécnico Direito e Democracia (Cabo Verde), e Coordenador Adjunto do Centro de Conciliação e Arbitragem – CCA Global (Cabo Verde). É, também, Professor Convidado na Faculdade de Direito da Universidade Katyavala Bwila (Benguela – Angola). Tem sido orador em diversas conferências, em Angola e Cabo Verde, abordando diversos temas do mundo jurídico, compliance e governance.
					    </p>

					    <p class="card-text" style="text-align: justify; font-size: 16px;">
                            Membro da Associação Angolana de Corporate Governance e Colaborador do Nova Compliance Lab (NOVA School of Law), sendo um dos formadores do Curso Compliance para Prevenção à Corrupção. Membro da Associação Lusófona de Arbitragem e Mediação. Membro de PMI ANGOLA CHAPTER
					    </p>

            </div>
            </div>

            <div class="col-md-6 mbr-figure pl-lg-5 d-none d-lg-block" >
              <img src="{{asset('frontend/img/fundo1.jpg')}}" style="object-fit: cover" height="720" width="100%"  alt="" title="" media-simple="true">
            </div>
        </div>
    </div>
    @endsection
