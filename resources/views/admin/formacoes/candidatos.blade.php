@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Candidatos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Formação</a></li>
              <li class="breadcrumb-item active">Candidatos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
              @foreach ($candidatos as $candidato)

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                 candidato
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$candidato->nome}}</b></h2>
                      <p class="text-muted text-sm"><b>Profissão: </b> {{$candidato->profissao}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Endereco: {{$candidato->pais}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{$candidato->telefone}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                      <button class="btn btn-sm btn-success btn-aceitar"  {{$candidato->pivot->estado === 1 ? " disabled " : ""}}   data-id="{{$formacao->id}}" data-user="{{$candidato->id }}" >
                        aceitar
                      </button>
                      <button class="btn btn-sm btn-danger btn-regeitar" {{$candidato->pivot->estado === 0 ? " disabled " : ""}}  data-id="{{$formacao->id}}" data-user="{{$candidato->id }}"  >
                        regeitar
                      </button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
              {{$candidatos->links()}}

            <!---<ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>-->
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('script')
  @parent
      <script>
  $(document).on('click', '.btn-aceitar', function(e) {
        Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar'

            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: `{{url('aceitarcandidatura')}}/${$(this).attr('data-id')}/${$(this).attr('data-user')}`,
                        method: 'get',
                    }).done((data, textStatus, jqXHR) => {

                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.responseJSON.message,
                        });
                        location.reload();
                    }).fail((error) => {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.message,

                        });
                        console.log(error);
                    })
                }
            })
    });

    $(document).on('click', '.btn-regeitar', function(e) {
        Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar'

            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: `{{url('regeitarcandidatura')}}/${$(this).attr('data-id')}/${$(this).attr('data-user')}`,
                        method: 'get',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.responseJSON.message,
                        });
                        location.reload();
                    }).fail((error) => {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.message,

                        });
                        console.log(error);
                    })
                }
            })
    });
      </script>
  @endsection
