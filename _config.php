<?php

use Composer\InstalledVersions;
use SilverStripe\View\Requirements;

// ! For Security pages only

if (strpos($_SERVER['REQUEST_URI'], '/Security') !== false) {
    // 1) Block

    // silverstripe-mfa
    if (InstalledVersions::isInstalled('silverstripe/mfa')) {
        Requirements::block('silverstripe/mfa: client/dist/styles/bundle.css');

        // silverstripe/totp-authenticator
        if (InstalledVersions::isInstalled('silverstripe/totp-authenticator')) {
            Requirements::block(
                'silverstripe/totp-authenticator: client/dist/styles/bundle.css',
            );
        }
    }

    // 2) Inject

    // silverstripe-mfa
    if (InstalledVersions::isInstalled('silverstripe/mfa')) {
        Requirements::css(
            'goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-mfa.css',
        );

        // silverstripe/totp-authenticator
        if (InstalledVersions::isInstalled('silverstripe/totp-authenticator')) {
            Requirements::css(
                'goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-totp-authenticator.css',
            );
        }
    }
}
