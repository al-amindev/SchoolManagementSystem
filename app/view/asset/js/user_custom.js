function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});


  function myFunction() {
      var e = document.getElementById('elementId');
var value = e.options[e.selectedIndex].value;
    $("#mySelect").change(function() { 

    if ( $(this).val() == "student")
    { 
      $("#teacher_form").hide();
      $("#student_form").show();
    }
    else
    {   $("#student_form").hide();
        $("#teacher_form").show();
    }

});
}

function reload(form)
{
var val=form.user_class.options[form.user_class.options.selectedIndex].value;
self.location='addresult.php?user_class=' + val ;
}

// $(document).ready(function () {
//     $('.nav li a').click(function(e) {

//         $('.nav li').removeClass('active');

//         var $parent = $(this).parent();
//         if (!$parent.hasClass('active')) {
//             $parent.addClass('active');
//         }
//         e.preventDefault();
//     });
// });
