<?php

namespace Goldfinch\Enchantment\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Security\Permission;

class AdminCtrlExtension extends Extension
{
    public function onAfterInit()
    {
        if (Permission::check('CMS_ACCESS_CMSMain')) {

          Requirements::css('build-cms/enchantment/assets/admin-ctrl-style.css');
          Requirements::javascript('build-cms/enchantment/assets/admin-ctrl.js');
        }
    }
}
