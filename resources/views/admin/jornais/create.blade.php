@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jornal e Revista</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="float-left">
                    <div class="btn-group">
                        <a href="{{ route('jornais.index') }}" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form action="<?= route('jornais.store') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                           {{ csrf_field()}}

                   <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">titulo do artigo </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="<?= old('titulo') ?>" placeholder="titulo" autocomplete="off">
                                @error('titulo')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>
                   </div>


                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tipo de midia </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <select name="tipo" class="form-control @error('tipo') is-invalid @enderror"  >
                                <option value=""> Seleciona o tipo de midia</option>

                                  <option value="jornal" {{  old('tipo') === "jornal" ? "selected" : ""; }} > Jornal</option>
                                  <option value="revista" {{  old('tipo') === "revista" ? "selected" : ""; }} > Revista</option>
                                </select>
                                @error('tipo')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label"> digite o nome da empresa de midia</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text"  class="form-control @error('nome') is-invalid @enderror"  placeholder="nome" name="nome" value="{{ old('nome') }}" >
                            @error('nome')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>


                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label"> digite o numero da pagina</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text"  class="form-control @error('paginas') is-invalid @enderror"  placeholder="paginas" name="paginas" value="{{ old('paginas') }}" >
                                @error('paginas')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">ano de publicação</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number"  class="form-control @error('ano') is-invalid @enderror"  placeholder="ano da publicação" name="ano" value="{{ old('ano') }}" >
                                @error('ano')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Url da publicação</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="url"  class="form-control @error('url') is-invalid @enderror"  placeholder="url da publicação" name="url" value="{{ old('url') }}" >
                                @error('url')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputFile">Documento</label>
                        <div class="col-sm-8">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="documento" class="custom-file-input  @error('documento') is-invalid @enderror" id="exampleInputFile" value="{{ old('documento') }}">
                            <label class="custom-file-label" for="exampleInputFile">selecione o documento </label>
                            @if ($errors->has('documento'))
                            @foreach ($errors->get('documento') as $error)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                            @endforeach
                          @endif
                        </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Carregar</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="float-right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-block btn-primary">
                                     salvar

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </section>
</div>
@endsection

@include ('admin.includes.select2')
@include ('admin.includes.editors')




