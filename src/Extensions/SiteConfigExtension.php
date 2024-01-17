<?php

namespace Goldfinch\Enchantment\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Core\Environment;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\ValidationResult;

class SiteConfigExtension extends DataExtension
{
    private static $defaults = [
        'ThemeEnchantment' => 1,
    ];

    private static $db = [
        'ThemeEnchantment' => 'Boolean',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        if (Environment::getEnv('SS_THEME_ENCHANTMENT')) {
            $fields->addFieldsToTab('Root.Main', [
                CheckboxField::create(
                    'ThemeEnchantment',
                    'Enchant admin theme',
                ),
            ]);
        }
    }

    public function validate(ValidationResult $validationResult)
    {
        // $validationResult->addError('Error message');
    }
}
