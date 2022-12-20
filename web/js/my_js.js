window.addEventListener('load', function () {
    $("select").change(function () {

        let sort = $(this).val();

        $.ajax({
            url: '/ajax/sort-gallery',         /* Куда пойдет запрос */
            method: 'get',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {sort: sort},     /* Параметры передаваемые в запросе. */
            success: function (res) {   /* функция которая будет выполнена после успешного запроса.  */
                $('.js-sort').html(res);
                const url = new URL(window.location);  // == window.location.href
                url.searchParams.set('sort', sort);
                history.pushState(null, null, url);    // == url.href
                if (sort == 1) {
                    const url = new URL(document.location);
                    const searchParams = url.searchParams;
                    searchParams.delete("sort"); // удалить параметр "sort"
                    window.history.pushState({}, '', url.toString());
                }
            }
        });
    });
})