$(document).ready(function () {
    $("#email").blur(function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: '/exists',
            type: 'GET',
            data: {
                email: $('#email').val(),
            },
            success: function (result) {

                addText(result);

            }
        });
    });

    function addText(result) {
        if ($('#email').next().is("span")) {
            $('#email').next().remove();
            $('#email').after("<span style='color:red'>" + result['email'] + "</span>");

        } else {
            $('#email').after("<span style='color:red'>" + result['email'] + "</span>");
        }
    }


});