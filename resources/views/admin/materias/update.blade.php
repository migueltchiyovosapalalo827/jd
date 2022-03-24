@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Material</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formaçao</li>
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
                        <a href="{{ url('/materiais?formacao_id='.$material->formacao_id) }}" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('materiais.update', $material->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
               @csrf

               <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nome </label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-edit"></i></span>
                        </div>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $material->nome }}" placeholder="nome" autocomplete="off">
                        @error('nome')
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
                <textarea  name="descricao" class="form-control @error('descricao') is-invalid @enderror" placeholder="Place some text here">{{ $material->descricao }}
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
                <label class="col-sm-2 col-form-label" for="exampleInputFile">documento</label>
                <div class="col-sm-8">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="documento" class="custom-file-input  @error('documento') is-invalid @enderror" id="exampleInputFile" >
                    <label class="custom-file-label" for="exampleInputFile">seleciona um documento</label>
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



