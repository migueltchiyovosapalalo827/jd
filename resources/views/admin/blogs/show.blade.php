@extends('admin.layouts.default')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none">{{ $blog->titulo }}</h3>
            <div class="col-12">
                <img src="{{ asset($blog->foto) }}" class="product-image" alt="Product Image">

            </div>
            <div class="col-12 product-image-thumbs">

                <div class="product-image-thumb  active  ">
                    <img src="{{ asset($blog->foto) }}" alt="Product Image">
                </div>



            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">{{ $blog->resumo }}</h3>
            <p> {{ $blog->conteudo }}.</p>

           <hr>



            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0">

                data :  {{ $blog->data  }}
              </h2>

            </div>



          </div>
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
    </div>
  <!-- /.content -->
  @endsection
@section('script')
@parent
<script>

</script>

@endsection


