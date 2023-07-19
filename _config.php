<?php

use SilverStripe\View\Requirements;
use SilverStripe\SiteConfig\SiteConfig;

if (SiteConfig::current_site_config()->SSRestyle)
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
        Requirements::css('/ssrestyle-build/assets/bundle-silverstripe-cms.css');
        // silverstripe-admin
        // Requirements::css('silverstripe/admin: dist/css/LeftAndMain_printable.css');
        Requirements::css('/ssrestyle-build/assets/bundle-silverstripe-admin.css');
        // silverstripe-asset-admin
        Requirements::css('/ssrestyle-build/assets/bundle-silverstripe-asset-admin.css');
        // Extend
        Requirements::css('/ssrestyle-build/assets/main.css');
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


