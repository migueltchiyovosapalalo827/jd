@extends('frontend.layouts.default')
@section('conteudo')

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container py-5">
                        <div class="col-md-8 d-flex txt text-1 ">

                            <h1>Contactos</h1>
                        </div>
                        <div class="col-md-8 d-flex txt text-1">
                            <p class="lead" style="font-size: 20px;">L: País, Cidade, Rua <br> T: +224 900 000 000
                                <br> E: joaodono@gmail.com
                            </p>

                        </div></div>
                </div>
                <div class="col-md-6 ">
                    <div class="container py-lg-5">

                    <div class="col-md-8 d-flex txt text-1">

                        <h1>Vamos Conversar <br> um pouco?</h1>

                    </div>

				<div class="col-lg-9">
					<form class="row contact_form" action="{{route('email.Contacto')}}" method="post" id="contactForm" novalidate="novalidate">
						@csrf
                        <div class="form-group">
                            <input type="text" value="{{old('nome')}}"  class="form-control mb-2 @error('nome') is-invalid @enderror" id="nome" name="nome" placeholder="digite o seu nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'digite o seu nome'">
                            @error('nome')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror
                            <input type="email" value="{{old('email')}}"  class="form-control mb-2  @error('email') is-invalid @enderror" id="email" name="email" placeholder="digite o seu email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'digite o seu email'">
                            @error('email')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror
                            <input type="text" value="{{old('assunto')}}"  class="form-control mb-2 @error('assunto')  is-invalid @enderror" id="assunto" name="assunto" placeholder="digite o assunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'digite o assunto'">
                            @error('assunto')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror

                            <input type="text" value="{{old('telefone')}}"  class="form-control mb-2 @error('telefone')  is-invalid @enderror" id="telefone" name="telefone" placeholder="digite o numero de telefone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'digite o numero de telefone'">
                            @error('telefone')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror
                            <textarea class="form-control mb-2  @error('mensagem') is-invalid @enderror" name="mensagem" id="mensagem" rows="4" placeholder="digite o texto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'digite o texto'">
                                {{old('mensagem')}}
                            </textarea>
                            @error('mensagem')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror
                        </div>
						<div class="col-md-12 text-right pb-4">
							<button type="submit" value="submit" class="btn btn-group-sm btn-md btn-dark">Enviar</button>
						</div>
					</form>
				</div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
