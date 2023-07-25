<?php

namespace Goldfinch\Enchantment\Helpers;

use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;

class BuildHelper
{
    public static function isProduction()
    {
        if (
          Director::isDev() &&
          is_dir(Director::baseFolder() . '/vendor/goldfinch/enchantment/client/src') &&
          is_dir(Director::baseFolder() . '/vendor/goldfinch/enchantment/client/public')
        )
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

            return false;
        }
        else
        {
            return true;
        }
    }
}
