<form role="form" action="/wohoo" method="POST">
    <label>Stuff</label>
    <div class="multi-field-wrapper">
        <div class="multi-fields">
            <div class="multi-field">
                <input type="text" name="stuff[]">
                <input type="text" name="eeee[]">
                <select name="select[]">
                    <option value="">Selecione uma opção</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                </select>
                <button type="button" class="remove-field">X</button>
            </div>
        </div>
        <button type="button" class="add-field">+</button>
    </div>
</form>







$('.multi-field-wrapper').each(function() {
var $wrapper = $('.multi-fields', this);
$(".add-field", $(this)).click(function(e) {
$('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').eq(0).focus();
});
$('.multi-field .remove-field', $wrapper).click(function() {
if ($('.multi-field', $wrapper).length > 1)
$(this).parent('.multi-field').remove();
});
});
