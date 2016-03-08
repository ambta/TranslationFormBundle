$(function() {
    $('ul.ambta_translationsLocales').on('click', 'a', function(evt) {
        evt.preventDefault();
        $(this).tab('show');
    });

    $('div.ambta_translationsLocalesSelector').on('change', 'input', function(evt) {
        var $tabs = $('ul.ambta_translationsLocales');

        $('div.ambta_translationsLocalesSelector').find('input').each(function() {
            $tabs.find('li:has(a[data-target=".ambta_translationsFields-' + this.value + '"])').toggle(this.checked);
        });

        $('ul.ambta_translationsLocales li:visible:first').find('a').tab('show');
    }).trigger('change');

    // Manage focus on right bootstrap tab when invalid event (AmbtaTranslation tab or not, and inner tabs include)
    $(':input', 'div.tab-content').on('invalid', function(e) {
        var $tabPanes = $(this).parents('div.tab-pane');

        $tabPanes.each(function() {
            var $tabPane = $(this);

            if (!$tabPane.hasClass('active')) {
                var $tabNavs = $tabPane.parent('.tab-content')
                                       .siblings('ul.nav.nav-tabs');

                // Tab target by id
                if (this.id) {
                    $tabNavs.find('a[href="#'+ this.id +'"], a[data-target="#'+ this.id +'"]')
                            .trigger('click');

                    return true;
                }

                // Tab target by class for ambtaTranslation
                var ambtaTranslClass = /ambta_translationsFields-[\S]+/.exec(this.className);
                if (ambtaTranslClass.length) {
                    $tabNavs.find('a[data-target=".'+ ambtaTranslClass[0] +'"]')
                            .trigger('click');

                    return true;
                }
            }
        });

        return true;
    });
});
