<?php

namespace Goldfinch\SSRestyle\Extensions;

use SilverStripe\Forms\FieldList;
use LeKoala\Encrypt\EncryptHelper;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\ValidationResult;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'SSRestyle' => 'Boolean',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Main', [

            CheckboxField::create('SSRestyle', 'Restyled admin theme')

        ]);
    }

    public function validate(ValidationResult $validationResult)
    {
        // $validationResult->addError('Error message');
    }
}
