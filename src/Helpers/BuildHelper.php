<?php

namespace Goldfinch\Enchantment\Helpers;

use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;
use SilverStripe\Core\Environment;

class BuildHelper
{
    public static function isProduction()
    {
        if (
            Director::isDev() &&
            Environment::getEnv('GOLDFINCH_ENCHANTMENT_DEV')
        ) {
            $port = 5173;
            $host = 'https://' . Director::host() . ':' . $port;

            Requirements::insertHeadTags(
                '
            <script type="module" src="' .
                    $host .
                    '/@vite/client"></script>
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-admin/client/src/styles/bundle-silverstripe-admin.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-cms/client/src/styles/bundle-silverstripe-cms.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-session-manager/client/src/bundles/bundle-silverstripe-session-manager.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-versioned-admin/client/src/styles/bundle-silverstripe-versioned-admin.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-asset-admin/client/src/styles/bundle-silverstripe-asset-admin.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-campaign-admin/client/src/styles/bundle-silverstripe-campaign-admin.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-mfa/client/src/bundles/bundle-silverstripe-mfa.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-totp-authenticator/client/src/bundles/bundle-silverstripe-totp-authenticator.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/silverstripe-grouped-cms-menu/GroupedCmsMenu.scss">
            <link rel="stylesheet" href="' .
                    $host .
                    '/enchantment/enchantment-style.scss">
            <script type="module" src="' .
                    $host .
                    '/enchantment/enchantment.js"></script>
            ',
            );

            return false;
        } else {
            return true;
        }
    }
}
