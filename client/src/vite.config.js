import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import { resolve } from 'path';
import { viteStaticCopy } from 'vite-plugin-static-copy'
import * as path from 'path'

export default defineConfig({

  resolve: {
      alias: {
          '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
      }
  },

  build: {
    emptyOutDir: true,
    outDir: '../dist',
    rollupOptions: {
      output: {
        entryFileNames: `enchantment/assets/[name].js`,
        chunkFileNames: `enchantment/assets/[name].js`,
        assetFileNames: `enchantment/assets/[name].[ext]`
      }
    }
  },

  plugins: [
      laravel({
          input: [
              // - silverstripe-admin
              'silverstripe-admin/client/src/styles/bundle-silverstripe-admin.scss',
              // 'silverstripe-admin/client/src/styles/bundle.scss',
              'silverstripe-admin/client/src/styles/editor.scss',
              'silverstripe-admin/client/src/styles/legacy/GridField_print.scss',
              // - silverstripe-asset-admin
              'silverstripe-asset-admin/client/src/styles/bundle-silverstripe-asset-admin.scss',
              // 'silverstripe-asset-admin/client/src/styles/bundle.scss',
              // - silverstrip-cms
              'silverstripe-cms/client/src/styles/bundle-silverstripe-cms.scss',
              // 'silverstripe-cms/client/src/styles/bundle.scss',
              'silverstripe-cms/client/src/styles/SilverStripeNavigator.scss',
              // - silverstripe-versioned-admin
              'silverstripe-versioned-admin/client/src/styles/bundle-silverstripe-versioned-admin.scss',
              // - silverstripe-campaign-admin
              'silverstripe-campaign-admin/client/src/styles/bundle-silverstripe-campaign-admin.scss',
              // - silverstripe-session-manager
              'silverstripe-session-manager/client/src/bundles/bundle-silverstripe-session-manager.scss',
              // - silverstripe-tfa (TODO: if installed)
              'silverstripe-mfa/client/src/bundles/bundle-cms-silverstripe-mfa.scss',
              'silverstripe-mfa/client/src/bundles/bundle-silverstripe-mfa.scss',
              'silverstripe-totp-authenticator/client/src/bundles/bundle-silverstripe-totp-authenticator.scss',

              'extra/sass/enchantment.scss',
              'extra/sass/wysiwyg.scss',
          ],
          refresh: true,
      }),

      viteStaticCopy({
        targets: [
          // silverstripe-admin
          {
            src: './silverstripe-admin/client/src/images/*',
            dest: '../dist/enchantment/assets/silverstripe-admin/client/src/images',
          },
          {
            src: './silverstripe-admin/client/src/font/*',
            dest: '../dist/enchantment/assets/silverstripe-admin/client/src/font',
          },
          {
            src: './silverstripe-admin/thirdparty/*',
            dest: '../dist/enchantment/assets/silverstripe-admin/thirdparty',
          },

          // lost assets (in .css files with no relative path)
          // {
          //   src: './silverstripe-asset-admin/client/src/images/chosen-sprite.png',
          //   dest: '../dist/enchantment/assets',
          // },
          // silverstripe-asset-admin
          {
            src: './silverstripe-asset-admin/client/src/images/*',
            dest: '../dist/enchantment/assets/silverstripe-asset-admin/client/src/images',
          },
          // silverstripe-cms
          {
            src: './silverstripe-cms/client/src/images/*',
            dest: '../dist/enchantment/assets/silverstripe-cms/client/src/images',
          },
          // silverstripe-campaign-admin
          {
            src: './silverstripe-campaign-admin/client/src/components/IntroScreen/images/*',
            dest: '../dist/enchantment/assets/silverstripe-campaign-admin/client/src/images',
          },
          {
            src: './silverstripe-campaign-admin/client/src/containers/CampaignAdmin/images/*',
            dest: '../dist/enchantment/assets/silverstripe-campaign-admin/client/src/images',
          },

          // bootstrap-icons
          {
            src: './node_modules/bootstrap-icons/font/fonts/*',
            dest: '../dist/enchantment/assets/extra/fonts/bootstrap-icons',
          },
          // extra
          {
            src: './extra/fonts/*',
            dest: '../dist/enchantment/assets/extra/fonts',
          },
          {
            src: './extra/images/*',
            dest: '../dist/enchantment/assets/extra/images',
          }
        ],
      })
  ],

    css: {
        postcss: {
            plugins: [
                autoprefixer,
            ],
        }
    },

});
