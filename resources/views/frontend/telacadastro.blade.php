@extends('frontend.layouts.default')
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/comtentarios.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/modals.css')}}">
@endsection
@section('conteudo')

        <div class="container">


            <div class="col-md-6 p-4" style="margin: 0 auto;">
                <div class="modal-header pb-5 border-bottom-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <h2 class="fw-bold mb-0 text-center">Preencha o formulário a baixo para se cadastrar</h2>
                    </div>
                <form class="" action="{{route('candidatura.criar')}}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="text" name="nome" value="{{old('nome')}}" class="form-control  rounded-4 @error('nome') is-invalid @enderror" id="floatingInput" placeholder="nome completo">
                      @error('nome')
                      <div class="invalid-feedback">
                          <h6>{{$message}}</h6>
                      </div>
                      @enderror
                      <label for="floatingInput">Nome Completo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="ni" value="{{old('ni')}}" class="form-control rounded-4 @error('ni') is-invalid @enderror" id="floatingInput" placeholder="Nº do documento de identificação">
                        @error('ni')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                        <label for="floatingInput">Nº do documento de identificação</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" name="pais" value="{{old('pais')}}" class="form-control rounded-4 @error('pais') is-invalid @enderror" id="floatingInput" placeholder="numero do pais">
                        @error('pais')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                        <label for="floatingInput">pais</label>
                      </div>
                    <div class="form-floating mb-3">
                      <input type="tel" name="telefone" value="{{old('telefone')}}" class="form-control rounded-4 @error('telefone') is-invalid @enderror " id="floatingInput" placeholder="Telefone">
                      @error('telefone')
                      <div class="invalid-feedback">
                          <h6>{{$message}}</h6>
                      </div>
                      @enderror
                      <label for="floatingInput">Tefefone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="profissao" value="{{old('profissao')}}"  class="form-control rounded-4 @error('profissao') is-invalid @enderror" id="floatingInput" placeholder="Profissão">
                        @error('profissao')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                        <label for="floatingInput">Profissão</label>
                      </div>

                      <select class="form-control form-select form-select-lg mb-3"  name="nivelacademico" aria-label=".form-select-lg example">
                          <option  value="">Nivel Acadêmico</option>
                          <option value="Ensino de base">Ensino de base</option>
                          <option value="Ensino Medio">Ensino Medio</option>
                          <option value="Ensino superior">Ensino Superior</option>
                        </select>
                    <div class="form-floating mb-3">
                      <input type="email" name="email" value="{{old('email')}}" class="form-control rounded-4 @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                      @error('email')
                      <div class="invalid-feedback">
                          <h6>{{$message}}</h6>
                      </div>
                      @enderror
                      <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Senha</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg botao" type="submit">Cadastrar</button>
                    <button class="w-100 mb-2 btn btn-lg btn-secondary" type="submit">Cancelar</button>


                  </form>
            </div>
        </div>
        @endsection
