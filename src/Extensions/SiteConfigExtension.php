<?php

namespace Goldfinch\Enchantment\Extensions;

use SilverStripe\Forms\FieldList;
use LeKoala\Encrypt\EncryptHelper;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\ValidationResult;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'ThemeEnchantment' => 'Boolean',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Main', [

            CheckboxField::create('ThemeEnchantment', 'Enchant admin theme')

        ]);
    }

    public function validate(ValidationResult $validationResult)
    {
        // $validationResult->addError('Error message');
    }
}
