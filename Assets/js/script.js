/**
 * Created by Rabota on 23.09.2016.
 */

function ajaxNewsCreate() {

    var form = $("form");
    var formData = form.serialize();

    $.ajax({
        type: 'post',
        url: '/news/AjaxCreate',
        dataType: 'json',
        data: formData,

        success: function(result) {
            if ('err' == result.status) {
                alert('Ошибка при добавлении новости')
            }

            if ('ok' == result.status) {
                alert('Новость добавлено');
                setTimeout(function() {
                    window.location.href = '/news/index';
                }, 500);
            }
        },
        complete: function() {
        }
    });

}

function ajaxNewsUpdate() {
    
    var form = $("form");
    var formData = form.serialize();

    $.ajax({
        type: 'post',
        url: '/news/AjaxUpdate',
        dataType: 'json',
        data: formData,

        success: function(result) {
            if ('err' == result.status) {
                alert('Новость не обновлена')
            }

            if ('ok' == result.status) {
                alert('Новость обновлен');
                setTimeout(function() {
                    window.location.href = '/news/index';
                }, 500);
            }
        },
        complete: function() {
        }
    });

}


function ajaxNewsDelete() {

    var form = $("form");
    var formData = form.serialize();

    $.ajax({
        type: 'post',
        url: '/news/AjaxDelete',
        dataType: 'json',
        data: formData,

        success: function (result) {

            if ('err' == result.status) {
                alert('Новость не удалена')
            }

            if ('ok' == result.status) {
                alert('Новость удалена');
                setTimeout(function () {
                    window.location.href = '/news/index';
                }, 500);
            }
        },
        complete: function () {
        }

        // success: function (message) {
        //     if (message == true) {
        //
        //     } else {
        //         alert('Новость не удалена');
        //         return false;
        //
        //     }
        // }

    });
}