@extends('admin.layouts.default')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Formações</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formando</li>
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
                    <table id="table-formacoes" class="table table-striped table-hover va-middle">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>nome</th>
                                <th>formador</th>
                                <th>data</th>
                                <th>custo</th>
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
    var tableUser = $('#table-formacoes').DataTable({

        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: "{{ route('candidatos.formacao') }}",
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
            'data': 'nome' ,
            },
            {
            'data': 'formador' ,
            },
            {
            'data': 'data' ,
            },
            {
            'data': 'custo' ,
            },

            {
                "data": function(data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary btn-delete" data-id="${data.id}" data-user="{{Auth::user()->candidato  ? Auth::user()->candidato->id : null }}">Candidatar-se</button>
                            </div>
                            </td>`
                }
            }
        ]
    });

    tableUser.on('draw.dt', function() {
        var PageInfo = $('#table-formacoes').DataTable().page.info();
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
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar'

            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: `{{url('realizarcandidatura')}}/${$(this).attr('data-id')}/${$(this).attr('data-user')}`,
                        method: 'get',
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
                        console.log(error);
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
