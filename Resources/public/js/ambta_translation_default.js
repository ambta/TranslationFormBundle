$(function() {
    $('ul.ambta_translationsLocales').on('click', 'a', function(evt) {
        evt.preventDefault();

        var target = $(this).attr('data-target');
        $('li:has(a[data-target="' + target + '"]), div' + target, 'div.ambta_translations').addClass('active')
            .siblings().removeClass('active');
    });

    $('div.ambta_translationsLocalesSelector').on('change', 'input', function(evt) {
        var $tabs = $('ul.ambta_translationsLocales');

        $('div.ambta_translationsLocalesSelector').find('input').each(function() {
            $tabs.find('li:has(a[data-target=".ambta_translationsFields-' + this.value + '"])').toggle(this.checked);
        });

        $('ul.ambta_translationsLocales li:visible:first').find('a').trigger('click');
    }).trigger('change');
});
