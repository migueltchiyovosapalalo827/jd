
  <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- bs-custom-file-input -->
<script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/adminlte.min.js') }}"></script>
  <!-- SweetAlert2 -->
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>

  <script>
    $.ajaxSetup({
      headers:{
        'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    </script>
    @yield('js')
    @yield('script')
   <script type="text/javascript">
    $(document).ready(function () {
     bsCustomFileInput.init();
        });
    </script>
    <script>

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });

        @if(session('sweet-success'))
          Toast.fire({
            icon: 'success',
            title: '{{session("sweet-success") }}'
          });

        @endif

        @if (session('sweet-warning'))
          Toast.fire({
            icon: 'warning',
            title: '{{session("sweet-warning") }}'
          });
        @endif
        @if (session('sweet-error'))
          Toast.fire({
            icon: 'error',
            title: '{{session("sweet-error") }}'
          });
        @endif
        </script>
