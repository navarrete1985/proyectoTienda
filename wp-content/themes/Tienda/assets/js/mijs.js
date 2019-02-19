(function ($) {
    $('#filters a').each((key, item) => {
        let value = $(item).attr('data-filter');
        if (value !== null && value !== '') {
            let count = 0;
            if (value === '*') {
                count = $('.category-count').length;
            }else {
                count = $(value).length;
            }
             $('#filters a[data-filter="' + value + '"] small').text('.' + count);
        }
    })
})(jQuery);