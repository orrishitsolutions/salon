$(function(){
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    /*===================================*/
    $(window).on('load', function() {
        setTimeout(function() {
            $(".preloader").delay(700).fadeOut(700).css('display', 'none');
        }, 100);
    });

    $("#profile").change(function() {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function(e) {
          $('#profileImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); // convert to base64 string
      });


      
    $('#check_submitPassword').click(function() {
        $.confirm({
            title: 'Confirmation',
            content: 'Do you really want to changes!',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'confirm',
                    btnClass: 'btn-dark',
                    action: function(){
                        $('#check_submitPassword').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> wait a moment');
                        $('.form-password').submit();
                    }
                },
                close: function () {
                }
            }
        });
    });
    $('#check_submit').click(function() {
        $.confirm({
            title: 'Confirmation',
            content: 'Do you really want to changes!',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'confirm',
                    btnClass: 'btn-dark',
                    action: function(){
                        $('#check_submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> wait a moment');
                        $('.form-profile').submit();
                    }
                },
                close: function () {
                }
            }
        });
    });
        
    $('#submit_btn').click(function() {
        $('#submit_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> wait a moment');
        this.form.submit();
    });
});