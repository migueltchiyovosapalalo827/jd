@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>publicar uma nova Formação</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formação</li>
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
                        <a href="{{ route('formacoes.index') }}" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form action="<?= route('formacoes.store') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                           {{ csrf_field()}}
                   <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome da Formação </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="<?= old('nome') ?>" placeholder="nome" autocomplete="off">
                                @error('nome')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>
                   </div>


                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">formador </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <input type="text" name="formador" class="form-control @error('formador') is-invalid @enderror" value="<?= old('formador') ?>" placeholder="formador" autocomplete="off">
                                @error('formador')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>

                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">custo  da formação</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                            </div>

                            <input type="number" step="0.01" name="custo" class="form-control @error('custo') is-invalid @enderror" value="<?= old('custo') ?>" placeholder="custo" autocomplete="off">
                            @error('custo')
                            <div class="invalid-feedback">
                                <h6>{{$message}}</h6>
                            </div>
                            @enderror
                        </div>
                    </div>

            </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Data da formação</label>
                    <div class="col-sm-8">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input @error('data') ? is-invalid @enderror" placeholder="Data da formação" data-target="#reservationdate"
                        value="{{ old('data')}}" name="data" id="data">

                        @error('data')
                        <div class="invalid-feedback">
                            <h6>{{$message}}</h6>
                        </div>
                        @enderror
                    </div>
                  </div>
                </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">descrição</label>
                        <div class="col-sm-8">
                        <div class="mb-3">
                        <textarea  name="descricao" class="textarea @error('descricao') is-invalid @enderror" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                                 {{ old('descricao') }}
                                </textarea>
                                @error('descricao')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                      </div>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputFile">Fotografia</label>
                        <div class="col-sm-8">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input  @error('foto') is-invalid @enderror" id="exampleInputFile" value="{{ old('foto') }}">
                            <label class="custom-file-label" for="exampleInputFile">seleciona uma foto para o formacoes</label>
                            @if ($errors->has('foto'))
                            @foreach ($errors->get('foto') as $error)
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
@include ('admin.includes.editors')


