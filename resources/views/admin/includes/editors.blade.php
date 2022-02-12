@section('css')
@parent

 <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">


@endsection


@section('js')
@parent

 <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>

$(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

@endsection
