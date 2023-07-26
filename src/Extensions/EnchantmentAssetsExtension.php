<?php

namespace Goldfinch\Enchantment\Extensions;

use Composer\InstalledVersions;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Core\Environment;
use SilverStripe\SiteConfig\SiteConfig;
use Goldfinch\Enchantment\Helpers\BuildHelper;

class EnchantmentAssetsExtension extends Extension
{
    public function init()
    {
        if (Environment::getEnv('SS_THEME_ENCHANTMENT'))
        {
            $cfg = SiteConfig::current_site_config();

            if ($cfg->ThemeEnchantment)
            {
                // silverstripe-admin
                Requirements::block('silverstripe/admin: client/dist/enchantment/assets/styles/bundle.css');
                // Requirements::css('silverstripe/admin: dist/css/LeftAndMain_printable.css');

                // silverstripe-cms
                Requirements::block('silverstripe/cms: client/dist/enchantment/assets/styles/bundle.css');

                // silverstripe-session-manager
                Requirements::block('silverstripe/session-manager: client/dist/enchantment/assets/styles/bundle.css');

                // silverstripe-versioned-admin
                Requirements::block('silverstripe/versioned-admin:client/dist/enchantment/assets/styles/bundle.css');

                // silverstripe-asset-admin
                Requirements::block('silverstripe/asset-admin:client/dist/enchantment/assets/styles/bundle.css');

                // silverstripe/campaign-admin
                if (InstalledVersions::isInstalled('silverstripe/campaign-admin') && !InstalledVersions::isInstalled('goldfinch/cleaner'))
                {
                    Requirements::block('silverstripe/campaign-admin: client/dist/enchantment/assets/styles/bundle.css');
                }

                // silverstripe-mfa
                if (InstalledVersions::isInstalled('silverstripe/mfa'))
                {
                    Requirements::block("silverstripe/mfa: client/dist/enchantment/assets/styles/bundle.css");
                    Requirements::block("silverstripe/mfa: client/dist/enchantment/assets/styles/bundle-cms.css");

                    // silverstripe/totp-authenticator
                    if (InstalledVersions::isInstalled('silverstripe/totp-authenticator'))
                    {
                        Requirements::block('silverstripe/totp-authenticator: client/dist/enchantment/assets/styles/bundle.css');
                    }
                }

                if (BuildHelper::isProduction())
                {
                    // silverstripe-admin
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
                    if (InstalledVersions::isInstalled('silverstripe/campaign-admin') && !InstalledVersions::isInstalled('goldfinch/cleaner'))
                    {
                        Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-campaign-admin.css');
                    }

                    // silverstripe-mfa
                    if (InstalledVersions::isInstalled('silverstripe/mfa'))
                    {
                        Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-mfa.css');

                        // silverstripe/totp-authenticator
                        if (InstalledVersions::isInstalled('silverstripe/totp-authenticator'))
                        {
                            Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-totp-authenticator.css');
                        }
                    }

                    // Enchantment
                    Requirements::css('goldfinch/enchantment:client/dist/enchantment/assets/enchantment-style.css');
                    Requirements::javascript('goldfinch/enchantment:client/dist/enchantment/assets/enchantment.js');
                }

                // extra assets
                Requirements::css('goldfinch/extra-assets:client/dist/font-opensans.css');
                Requirements::css('goldfinch/extra-assets:client/dist/bootstrap-icons.css');
            }
        }
    }
}
