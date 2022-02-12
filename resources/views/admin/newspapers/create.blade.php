@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>publicar um novo newspaper</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">newspapers</li>
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
                        <a href="{{ route('newspapers.index') }}" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form action="<?= route('newspapers.store') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                           {{ csrf_field()}}
                   <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">titulo do newspaper </label>
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
                        <label for="inputName2" class="col-sm-2 col-form-label">resumo</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <textarea  class="form-control @error('resumo') is-invalid @enderror"  placeholder="descrição" name="resumo" >
                                   {{ old('resumo') }}
                                </textarea>
                                @error('resumo')
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
                            <label class="custom-file-label" for="exampleInputFile">seleciona uma foto para o newspaper</label>
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
                        <label class="col-sm-2 col-form-label" for="exampleInputFile">Pdf</label>
                        <div class="col-sm-8">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="pdf" class="custom-file-input  @error('pdf') is-invalid @enderror" id="exampleInputFile" value="{{ old('pdf') }}">
                            <label class="custom-file-label" for="exampleInputFile">seleciona um pdf para o newspaper</label>
                            @if ($errors->has('pdf'))
                            @foreach ($errors->get('pdf') as $error)
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
@section('script')
@parent
    <script>
$(document).ready(function () {
  bsCustomFileInput.init();
});
    </script>
@endsection


