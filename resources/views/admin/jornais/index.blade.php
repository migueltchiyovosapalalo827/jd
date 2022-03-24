@extends('admin.layouts.default')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de artigos publicado em jornais e revista </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">jornais e revista</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- SELECT2 EXAMPLE -->
<section class="content">
    <div class="row">
      <div class="col-12">
<div class="card card-default">

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                    <table id="table-artigo" class="table table-striped table-hover va-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>titulo</th>
                                <th>paginas</th>
                                <th>tipo</th>
                                <th>midia</th>
                                <th>ano</th>
                                <th>acção</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 </div>
    </div>
</section>
<!-- /.card -->
    </div>
@endsection
@include ('admin.includes.datatable')
@section('script')
@parent
<script>
    var tableUser = $('#table-artigo').DataTable({

        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: "{{ route('jornais.index') }}",
            method: 'GET'
        },
        columnDefs: [{
            orderable: false,
            targets: [0,3]
        }],
        columns: [{
                'data': null
            },
            {
            'data': 'titulo' ,
            },
            {
            'data': 'paginas' ,
            },
            {
                'data': 'tipo'
            },
            {
                'data':  'nome'
            },
            {
                'data':  'ano'
            },
            {
                "data": function(data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                            <a href="{{url('jornais/${data.id}/edit')}}" class="btn btn-primary btn-edit"><i class="fas fa-user-edit"></i></a>
                                <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });

    tableUser.on('draw.dt', function() {
        var PageInfo = $('#table-artigo').DataTable().page.info();
        tableUser.column(0, {
            page: 'current'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    $(document).on('click', '.btn-delete', function(e) {
        Swal.fire({
                title: 'Você tem certeza?',
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
                        url: `{{url('jornais')}}/${$(this).attr('data-id')}`,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: jqXHR.responseJSON.message,
                        });
                        tableUser.ajax.reload();
                    }).fail((error) => {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.message,
                        });
                    })
                }
            })
    });

    tableUser.on('order.dt search.dt', () => {
        tableUser.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
</script>

@endsection
