//Developed by Ulises Reyes
//Usaremos Jquery

$(document).ready(function () {
    $('#alert').hide();
    $('#invalid-name').hide();
    $('#invalid-age').hide();
    $('#invalid-birthdate').hide();

    //Obtenemos el evento del formulario
    $("#contact-form").submit(function (e) {
        //Creamun objeto con los datos
        const postData = {
            name: $('#name').val(),
            age: $('#age').val(),
            gender: $('input[name="gender"]:checked').val(),
            birthdate: $('#birthdate').val(),
        }
        //Hacemos la peticion POST con AJAX
        $.ajax({
            url: 'form.php',
            type: 'POST',
            data: postData,
            success: function (response) {
                let result = JSON.parse(response);
                message = '';
                if (result.errors) {
                    message += result.errors.name !== undefined ? `<p>${result.errors.name}</p>` : '';
                    message += result.errors.age !== undefined ? `<p>${result.errors.age}</p>` : '';
                    message += result.errors.birthdate !== undefined ? `<p>${result.errors.birthdate}</p>` : '';

                    $('#invalid-name').html(result.errors.name !== undefined ? `<p>${result.errors.name}</p>` : '').show();
                    $('#invalid-age').html(result.errors.age !== undefined ? `<p>${result.errors.age}</p>` : '').show();
                    $('#invalid-birthdate').html(result.errors.birthdate !== undefined ? `<p>${result.errors.birthdate}</p>` : '').show();
                } else {
                    message =
                        `   <div>${result.message}</div>`
                    $('#invalid-name').hide();
                    $('#invalid-age').hide();
                    $('#invalid-birthdate').hide();
                    $('#alert').show().html(message);

                }


            }
        });
        $('#contact-form').trigger('reset');
        e.preventDefault();
    });

});