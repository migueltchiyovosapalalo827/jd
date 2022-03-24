@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar artigos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">artigos</li>
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
                        <a href="{{ route('artigos.index') }}" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('artigoscienticos.update', $artigoscientico->id) }}" method="post" class="form-horizontal" >
                @method('PUT')
               @csrf
               <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">titulo do artigo </label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-edit"></i></span>
                        </div>
                        <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ $artigoscientico->titulo }}" placeholder="titulo" autocomplete="off">
                        @error('titulo')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                    </div>
                </div>
           </div>


            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Autores </label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-edit"></i></span>
                        </div>
                        <input type="text" name="Autores" class="form-control @error('Autores') is-invalid @enderror" value="{{ $artigoscientico->Autores }}" placeholder="Autores" autocomplete="off">
                        @error('Autores')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                    </div>
                </div>

        </div>

            <div class="form-group row">
                <label for="inputName2" class="col-sm-2 col-form-label">editora</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text"  class="form-control @error('editora') is-invalid @enderror"  placeholder="editora" name="editora" value="{{ $artigoscientico->editora }}" >
                        @error('editora')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="inputName2" class="col-sm-2 col-form-label">volume</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text"  class="form-control @error('volume') is-invalid @enderror"  placeholder="descrição" name="volume" value="{{ $artigoscientico->volume }}" >
                        @error('volume')
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
                        <input type="number"  class="form-control @error('ano') is-invalid @enderror"  placeholder="ano da publicação" name="ano" value="{{$artigoscientico->ano}}" >
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
                        <input type="url"  class="form-control @error('url') is-invalid @enderror"  placeholder="url " name="url" value="{{ $artigoscientico->url}}" >
                        @error('url')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
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


