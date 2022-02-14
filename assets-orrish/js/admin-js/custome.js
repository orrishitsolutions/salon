$(document).ready(function () {
  
       $(".tox-notifications-container").addClass("d-none");
           $('textarea').each(function(){
                  $(this).val($(this).val().trim());
              }
          );

  $("#profile").change(function () {
    var reader = new FileReader();
    console.log(reader);
    reader.onload = function (e) {
      $('#profileImg').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]); // convert to base64 string
  });


  //file1
  $("#file1").change(function () {
    var reader = new FileReader();
    console.log(reader);
    reader.onload = function (e) {
      $('#fileImg1').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]); // convert to base64 string
  });


   //file2
  $("#file2").change(function () {
    var reader = new FileReader();
    console.log(reader);
    reader.onload = function (e) {
      $('#fileImg2').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]); // convert to base64 string
  });





  $(window).on('load', function () {
    setTimeout(function () {
      $(".preloader").delay(700).fadeOut(700).css('display', 'none');
    }, 100);
  });


  $('#check_submitPassword').click(function () {
    $.confirm({
      title: 'Confirmation',
      content: 'Do you really want to changes!',
      type: 'dark',
      typeAnimated: true,
      buttons: {
        tryAgain: {
          text: 'confirm',
          btnClass: 'btn-dark',
          action: function () {
            $('#check_submitPassword').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> wait a moment');
            $('.form-password').submit();
          }
        },
        close: function () {}
      }
    });
  });
  $('#check_submit').click(function () {
    $.confirm({
      title: 'Confirmation',
      content: 'Do you really want to changes!',
      type: 'dark',
      typeAnimated: true,
      buttons: {
        tryAgain: {
          text: 'confirm',
          btnClass: 'btn-dark',
          action: function () {
            $('#check_submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> wait a moment');
            $('.form-profile').submit();
          }
        },
        close: function () {}
      }
    });
  });

  $('.save').click(function () {
    $.confirm({
      title: 'Confirmation',
      content: $(".save").val(),
      type: 'dark',
      typeAnimated: true,
      buttons: {
        tryAgain: {
          text: 'confirm',
          btnClass: 'btn-dark',
          action: function () {
            $('#category_submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Wait');
            
            var name = $("#name").val();
            if (name == '') {
              $("#name").addClass("is-invalid");
              return false;
            }
            else
            {
              $('#form-category').submit();
            }            
          
          }
        },
        close: function () {}
      }
    });
  });




  //   $('.save_stock').click(function () {
  //   $.confirm({
  //     title: 'Confirmation',
  //     content: $(".save_stock").val(),
  //     type: 'dark',
  //     typeAnimated: true,
  //     buttons: {
  //       tryAgain: {
  //         text: 'confirm',
  //         btnClass: 'btn-dark',
  //         action: function () {
  //           $('#category_submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Wait');
  //           var name = $("#name").val();
  //           var Brandname = $("#Brandname").val();
  //           var Stylename = $("#Stylename").val();
  //           var price = $("#price").val();
  //           if (name == '') {
  //             $("#name").addClass("is-invalid");
  //             return false;
  //           }
  //           if (Brandname == '') {
  //             $("#Brandname").addClass("is-invalid");
  //             return false;
  //           }
  //           if (Stylename == '') {
  //             $("#Stylename").addClass("is-invalid");
  //             return false;
  //           }
  //           if (price == '') {
  //             $("#price").addClass("is-invalid");
  //             return false;
  //           }
  //           else
  //           {
  //             $('#form-category').submit();
  //           }            
          
  //         }
  //       },
  //       close: function () {}
  //     }
  //   });
  // });
  

  $('#submit_btn').click(function () {
    $('#submit_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> wait a moment');
    this.form.submit();
  });
});

// Password Match
$('#uconfirm_password').on('change', function () {
  var password = $("#upassword").val();
  var confirmPassword = $("#uconfirm_password").val();
  if (password != confirmPassword) {

    $("#passtext").removeClass("invisible");
    $("#uconfirm_password").removeClass("is-valid");
    $("#uconfirm_password").addClass("is-invalid");
  } else {
    $("#passtext").addClass("invisible");
    $("#uconfirm_password").removeClass("is-invalid");
    $("#uconfirm_password").addClass("is-valid");
  }
});


