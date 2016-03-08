<?php

namespace Ambta\TranslationFormBundle\Util;

final class LegacyFormHelper
{
    private static $map = array(
        'Ambta\TranslationFormBundle\Form\Type\TranslationsType' => 'ambta_translations',
        'Ambta\TranslationFormBundle\Form\Type\TranslationsFieldsType' => 'ambta_translationsFields',
        'Ambta\TranslationFormBundle\Form\Type\TranslationsFormsType' => 'ambta_translationsForms',
        'Ambta\TranslationFormBundle\Form\Type\TranslatedEntityType' => 'ambta_translatedEntity',
        'Ambta\TranslationFormBundle\Form\Type\TranslationsLocalesSelectorType' => 'ambta_translationsLocalesSelector',
    );

    public static function getType($class)
    {
        if (!self::isLegacy()) {
            return $class;
        }

        if (!isset(self::$map[$class])) {
            throw new \InvalidArgumentException(sprintf('Form type with class "%s" can not be found. Please check for typos or add it to the map in LegacyFormHelper', $class));
        }

        return self::$map[$class];
    }

    public static function isLegacy()
    {
        return !method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix');
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
