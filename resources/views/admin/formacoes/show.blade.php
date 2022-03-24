@extends('admin.layouts.default')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalhe da formação</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detalhe da formação</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$formacao->nome}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">

              <div class="row">
                <div class="col-12">
                    <div class="post">

                      <!-- /.user-block -->
                      <div class="row">
                      <div class="col-sm-6">
                        <img class="img-fluid" src="{{$formacao->foto}}" alt="Photo">
                      </div>
                      <div class="col-sm-6">
                          <h3> {{$formacao->nome}} </h3>
                          <span> Formador : {{$formacao->formador}}</span>
                      <p>
                        {!! $formacao->descricao !!}
                      </p>
                      <span> data da formação : {{$formacao->data}}</span>
                      </div>
                    </div>
                      <div class="text-center mt-5 mb-3">
                        <a href="{{ route('candidato', ['formacao'=>$formacao->id]) }}" class="btn btn-sm btn-primary">Ver Candidatos</a>
                        <a href="{{url('materiais/create/'.$formacao->id)}}" class="btn btn-sm btn-success">Adicionar material</a>
                    </div>
                    </div>

                </div>
              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('script')
  @parent
      <script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
      </script>
  @endsection
