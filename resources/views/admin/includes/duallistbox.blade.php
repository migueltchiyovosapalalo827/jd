@section('css')
@parent
 <!-- Bootstrap4 Duallistbox -->
 <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">


@endsection


@section('js')
@parent
 <!-- Bootstrap4 Duallistbox -->
 <script src="{{asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script>

  $(function () {
         //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    })
</script>

@endsection
