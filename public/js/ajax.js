
$(document).on('ajaxComplete ready', function () {
    $('.modalMd').off('click').on('click', function () {
        $('#modalMdContent').load($(this).attr('href'));
        $('#modalMdTitle').html($(this).attr('title'));
    });
});