<?php

namespace Goldfinch\Enchantment\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\ValidationResult;
use SilverStripe\Core\Environment;

class SiteConfigExtension extends DataExtension
{
    private static $defaults = [
        'ThemeEnchantment' => 1,
    ];

    private static $db = [
        'ThemeEnchantment' => 'Boolean',
    ];

    private static $defaults = [
        'ThemeEnchantment' => 1,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        if (Environment::getEnv('SS_THEME_ENCHANTMENT'))
        {
            $fields->addFieldsToTab('Root.Main', [

                CheckboxField::create('ThemeEnchantment', 'Enchant admin theme')

            ]);
        }
    }

    public function validate(ValidationResult $validationResult)
    {
        // $validationResult->addError('Error message');
    }
}
