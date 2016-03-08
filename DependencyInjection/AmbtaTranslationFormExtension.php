<?php

namespace Ambta\TranslationFormBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\Config\Definition\Processor,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\HttpKernel\DependencyInjection\Extension,
    Symfony\Component\DependencyInjection\Loader;


/**
 * @author David ALLIX
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
class AmbtaTranslationFormExtension extends Extension
{
    /**
     *
     * @param array                                                   $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $config = $processor->processConfiguration(new Configuration(), $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('ambta_translation_form.locale_provider', $config['locale_provider']);
        $container->setParameter('ambta_translation_form.locales', $config['locales']);
        $container->setParameter('ambta_translation_form.required_locales', $config['required_locales']);
        $container->setParameter('ambta_translation_form.default_locale', $config['default_locale'] ?:
            $container->getParameter('kernel.default_locale', 'en'));

        $container->setParameter('ambta_translation_form.templating', $config['templating']);

        $container->setAlias('ambta_translation_form.manager_registry', $config['manager_registry']);
    }
}