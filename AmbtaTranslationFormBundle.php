<?php

namespace Ambta\TranslationFormBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Ambta\TranslationFormBundle\DependencyInjection\Compiler\TemplatingPass,
    Ambta\TranslationFormBundle\DependencyInjection\Compiler\LocaleProviderPass;

/**
 * @author David ALLIX
 */
class AmbtaTranslationFormBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TemplatingPass());
        $container->addCompilerPass(new LocaleProviderPass());
    }
}
