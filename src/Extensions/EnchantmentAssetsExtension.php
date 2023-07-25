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
        if (Environment::getEnv('SS_THEME_ENCHANTMENT') && is_dir(Director::baseFolder() . '/public/build-cms/enchantment'))
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
                // silverstripe-versioned-admin
                Requirements::block('silverstripe/versioned-admin:client/dist/styles/bundle.css');
                // silverstripe-campaign-admin
                Requirements::block('silverstripe/campaign-admin: client/dist/styles/bundle.css');
                // silverstripe-session-manager
                Requirements::block('silverstripe/session-manager: client/dist/styles/bundle.css');
                // silverstripe-mfa (TODO: if installed)
                Requirements::block("silverstripe/mfa: client/dist/styles/bundle.css");
                Requirements::block("silverstripe/mfa: client/dist/styles/bundle-cms.css");
                Requirements::block('silverstripe/totp-authenticator: client/dist/styles/bundle.css');

                $production = true;

                if ($production)
                {
                    // // silverstripe-admin
                    // // Requirements::css('silverstripe/admin: dist/css/LeftAndMain_printable.css');
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-admin.css');
                    // // silverstripe-cms
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-cms.css');
                    // // silverstripe-session-manager
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-session-manager.css');
                    // // silverstripe-versioned-admin
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-versioned-admin.css');
                    // // silverstripe-asset-admin
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-asset-admin.css');
                    // // silverstripe-campaign-admin
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-campaign-admin.css');
                    // // silverstripe-mfa (TODO: if installed)
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-mfa.css');
                    // Requirements::css('/build-cms/enchantment/assets/bundle-silverstripe-totp-authenticator.css');
                    // // Extend
                    // Requirements::css('/build-cms/enchantment/assets/enchantment.css');

                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-admin.css');
                    // silverstripe-cms
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-cms.css');
                    // silverstripe-session-manager
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-session-manager.css');
                    // silverstripe-versioned-admin
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-versioned-admin.css');
                    // silverstripe-asset-admin
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-asset-admin.css');
                    // silverstripe-campaign-admin
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-campaign-admin.css');
                    // silverstripe-mfa (TODO: if installed)
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-mfa.css');
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-totp-authenticator.css');
                    // Extend
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/enchantment.css');
                }
                else
                {
                    // $host = 'http://[::1]:5173';
                    $host = 'http://127.0.0.1:5173';

                    Requirements::insertHeadTags('
                    <script type="module" src="' . $host . '/@vite/client"></script>
                    <link rel="stylesheet" href="' . $host . '/silverstripe-admin/client/src/styles/bundle-silverstripe-admin.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-cms/client/src/styles/bundle-silverstripe-cms.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-session-manager/client/src/styles/bundle-silverstripe-session-manager.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-versioned-admin/client/src/styles/bundle-silverstripe-versioned-admin.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-asset-admin/client/src/styles/bundle-silverstripe-asset-admin.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-campaign-admin/client/src/styles/bundle-silverstripe-campaign-admin.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-mfa/client/src/styles/bundle-silverstripe-mfa.scss">
                    <link rel="stylesheet" href="' . $host . '/silverstripe-totp-authenticator/client/src/styles/bundle-silverstripe-totp-authenticator.scss">
                    <link rel="stylesheet" href="' . $host . '/extra/sass/enchantment.scss">
                    ');
                }
            }
        }
    }
}
