/**
 * Created by Rabota on 03.10.2016.
 */

function ajaxUserReg() {

    var form = $("form");
    var formData = form.serialize();

    $.ajax({
        type: 'post',
        url: '/user/AjaxReg',
        dataType: 'json',
        data: formData,

        success: function(result) {
            if ('err' == result.status) {
                alert('Ошибка при регистрации')
            }

            if ('err' == result.message) {
                alert('Пароли не совпадают. Пожалуйста, проверьте.');
            }

            if ('ok' == result.status) {
                alert('Регистрация прошла успешно');
                setTimeout(function() {
                    window.location.href = '/news/index';
                }, 500);
            }
        },
        complete: function() {
        }
    });

}