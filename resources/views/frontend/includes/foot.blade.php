<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            600: {
                items: 4
            }
        }
    })
</script>


<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/all.js')}}"></script>
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
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
<script>

$(function () {



$('#input-search').on( 'keypress change',function () {
    $.ajax({
            method: 'get',
            data: {
              titulo:   $('#input-search').val(),
            token : $('#token').val()
            },
            url: '{{route("pesquisar")}}',
            beforeSend: function(){
                 $("#artigos").html('<div class="spinner-border text-primary" role="status"></div>')
            },
            success: function (res) {
                $("#artigos").html(res);
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    //$('#message').fadeIn().html(err.responseJSON.message);

                    // you can loop through the errors object and show it to the user
                    console.warn(err.responseJSON.errors);
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span style="color: #ff0000;">' + error[0] + '</span>'));
                    });
                }
            }
        }
    )

});
});
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   <script>
    var comboGoogleTradutor = null; //Varialvel global
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'pt',
        includedLanguages: 'en,pt',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');

    comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
}

function changeEvent(el) {
    if (el.fireEvent) {
        el.fireEvent('onchange');
    } else {
        var evObj = document.createEvent("HTMLEvents");

        evObj.initEvent("change", false, true);
        el.dispatchEvent(evObj);
    }
}

function trocarIdioma(sigla) {
    if (comboGoogleTradutor) {
        comboGoogleTradutor.value = sigla;
        changeEvent(comboGoogleTradutor);//Dispara a troca
    }
}
    $(document).ready(function(){
               $('.lang').click(function(){
       ('.textlang').text($(this).text());
       });
    });
</script>
