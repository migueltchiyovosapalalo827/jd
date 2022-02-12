@extends('admin.layouts.default')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de permissões</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">permissões</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Lista de permissões</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
                    <table id="table-permissoes" class="table table-striped custom-table">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome</th>
                          <th >Acção</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>

@endsection
@include ('admin.includes.datatable')
@section('script')
@parent
<script>
    var tablepermissoes = $('#table-permissoes').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        order: [[1, 'asc']],

        ajax: {
            url: "{{ route('permissoes.index') }}",
            method: 'GET'
        },
        columnDefs: [{
            orderable: false,
            targets: [0,1]
        }],
        columns: [{
                'data': null
            },
            {
              'data': 'name'
            },
             {"data": function(data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-primary" href="{{url('permissoes/${data.id}')}}"> <i class="fas fa-id-card m-r-5"></i></a>
                                <a href="{{url('permissoes/${data.id}/edit')}}" class="btn btn-primary btn-edit"><i class="fas fa-user-edit"></i></a>
                                <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });

    $(document).on('click', '.btn-delete', function(e) {
        Swal.fire({
               title: 'Você tem certeza que pretendes excluir este usuario?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exclua!',
                cancelButtonText: 'Cancelar'
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: `{{ url('permissoes')}}/${$(this).attr('data-id')}`,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.responseJSON.message,
                        });
                        console.log(jqXHR);
                        tablepermissoes.ajax.reload();
                    }).fail((error) => {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.message,
                        });
                    })
                }
            })
    });

    tablepermissoes.on('draw.dt', function() {
        var PageInfo = $('#table-permissoes').DataTable().page.info();
        tablepermissoes.column(0, {
            page: 'current'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });


    tablepermissoes.on('order.dt search.dt', () => {
        tablepermissoes.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
</script>

@endsection
