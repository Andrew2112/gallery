window.addEventListener('load', function () {
    $("select").change(function () {

        let sort = $(this).val();

        $.ajax({
            url: '/ajax/sort-gallery',         /* Куда пойдет запрос */
            method: 'get',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {sort: sort},     /* Параметры передаваемые в запросе. */
            success: function (res) {   /* функция которая будет выполнена после успешного запроса.  */
                res = JSON.parse(res)
                $('.js-sort').html(res.html);
                $('.js-image-more').attr('data-sort', res.sort)
                $('.js-image-more').attr('data-page', res.page)
                $('.js-image-more').attr('href', res.next)
                $('.js-image-more').css('display', 'block');
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
    $(document).on('click', '.js-image-more', function (event) {
        event.preventDefault();
        let thisButton = $(this);
        let page = $(this).attr('data-page');
        let sort = $(this).attr('data-sort');
        $.ajax({
            url: '/ajax/sort-gallery',
            method: 'get',
            dataType: 'html',
            data: {page: page, sort: sort},
            success: function (res) {
                res = JSON.parse(res)
                if (res.html && res.append_block) {
                    $(res.append_block).append(res.html);
                    if (res.next && res.next != "false") {
                        thisButton.attr('href', res.next);
                        thisButton.attr('data-page', res.page);
                        thisButton.attr('data-sort', res.sort);
                    } else {
                        thisButton.hide();
                    }
                } else {
                    thisButton.hide();
                }
            }
        })
    })
})