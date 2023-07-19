<?php

namespace Goldfinch\Enchantment\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Control\Director;
use SilverStripe\Core\Environment;
use SilverStripe\SiteConfig\SiteConfig;

class EnchantmentAssetsExtension extends Extension
{
    public function init()
    {
        if (Environment::getEnv('SS_THEME_ENCHANTMENT') && is_dir(Director::baseFolder() . '/public/enchantment-build'))
        {
            $cfg = SiteConfig::current_site_config();

            if ($cfg->ThemeEnchantment)
            {
                // silverstripe-cms
                Requirements::block('silverstripe/cms: client/dist/styles/bundle.css');
                // silverstripe-admin
                Requirements::block('silverstripe/admin: client/dist/styles/bundle.css');
                // Requirements::css('silverstripe/admin: dist/css/LeftAndMain_printable.css');
                // silverstripe-asset-admin
                Requirements::block('silverstripe/asset-admin:client/dist/styles/bundle.css');

                $production = true;

                if ($production)
                {
                    // silverstripe-cms
                    Requirements::css('/enchantment-build/assets/bundle-silverstripe-cms.css');
                    // silverstripe-admin
                    // Requirements::css('silverstripe/admin: dist/css/LeftAndMain_printable.css');
                    Requirements::css('/enchantment-build/assets/bundle-silverstripe-admin.css');
                    // silverstripe-asset-admin
                    Requirements::css('/enchantment-build/assets/bundle-silverstripe-asset-admin.css');
                    // Extend
                    Requirements::css('/enchantment-build/assets/main.css');
                }
                else
                {
                    Requirements::insertHeadTags('
                    <script type="module" src="http://127.0.0.1:5173/@vite/client"></script>
                    <link rel="stylesheet" href="http://127.0.0.1:5173/extra/sass/main.scss">
                    <link rel="stylesheet" href="http://127.0.0.1:5173/silverstripe-admin/client/src/styles/bundle-silverstripe-admin.scss">
                    <link rel="stylesheet" href="http://127.0.0.1:5173/silverstripe-asset-admin/client/src/styles/bundle-silverstripe-asset-admin.scss">
                    <link rel="stylesheet" href="http://127.0.0.1:5173/silverstripe-cms/client/src/styles/bundle-silverstripe-cms.scss">
                    ');
                }
            }
        }
    }
}
