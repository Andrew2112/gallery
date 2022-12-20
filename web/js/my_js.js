window.addEventListener('load',function () {
    $("select").change(function(){
        let sort=$(this).val();
        $.ajax({
            url: '/gallery/index',         /* Куда пойдет запрос */
            method: 'get',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {sort: sort},     /* Параметры передаваемые в запросе. */
            success: function(res){   /* функция которая будет выполнена после успешного запроса.  */
                $('.js-sort').html(res);
            }
        });

    });
})