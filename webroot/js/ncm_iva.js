$(function () {
    $('#icms-estadual-id').change(function () {
        window.location.href = router.url + 'ncm-iva/' + (router.params.action.toLowerCase()) + '/' + $(this).val();
    });
});
