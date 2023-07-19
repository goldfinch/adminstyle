<?php

namespace Goldfinch\Enchantment\Extensions;

use SilverStripe\Forms\FieldList;
use LeKoala\Encrypt\EncryptHelper;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\ValidationResult;
use SilverStripe\Control\Director;
use SilverStripe\Core\Environment;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'ThemeEnchantment' => 'Boolean',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        if (Environment::getEnv('SS_THEME_ENCHANTMENT') && is_dir(Director::baseFolder() . '/public/build-cms/enchantment'))
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
