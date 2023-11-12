import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import * as path from 'path'
import { viteStaticCopy } from 'vite-plugin-static-copy'
import fs from 'fs';
import initCfg from './app.config.js'

export default defineConfig(({ command, mode, ssrBuild }) => {

  const cfg = initCfg(command, mode, ssrBuild)

  const host = cfg.host;

  return {

    resolve: {
      alias: {
        '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
      }
    },

    server: {
      host,
      hmr: { host },
      https: {
        key: fs.readFileSync(`${cfg.certs}.key`),
        cert: fs.readFileSync(`${cfg.certs}.crt`),
      },
    },

    build: {
      emptyOutDir: true,
      outDir: '../dist',
      rollupOptions: {
        output: {
          entryFileNames: `enchantment/assets/[name].js`,
          chunkFileNames: `enchantment/assets/[name]-[hash].js`,
          assetFileNames: `enchantment/assets/[name].[ext]`
        }
      }
    },
    // build: {
    //   emptyOutDir: true,
    //   outDir: '../dist',
    //   rollupOptions: {
    //     output: {
    //       entryFileNames: `[name].js`,
    //       chunkFileNames: `js/[name].js`,
    //       assetFileNames: (assetInfo) => {
    //         if (assetInfo.name.endsWith('.css')) {
    //           return '[name][extname]'
    //         } else if (
    //           assetInfo.name.match(/(\.(woff2?|eot|ttf|otf)|font\.svg)(\?.*)?$/)
    //         ) {
    //           return 'fonts/[name][extname]'
    //         } else if (assetInfo.name.match(/\.(jpg|png|svg)$/)) {
    //           return 'images/[name][extname]'
    //         }

    //         return 'js/[name][extname]'
    //       }
    //     }
    //   }
    // },

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

          // - silverstripe-session-manager
          'silverstripe-session-manager/client/src/bundles/bundle-silverstripe-session-manager.scss',

          // - silverstripe-campaign-admin
          'silverstripe-campaign-admin/client/src/styles/bundle-silverstripe-campaign-admin.scss',

          // - silverstripe-tfa (TODO: if installed)
          'silverstripe-mfa/client/src/bundles/bundle-cms-silverstripe-mfa.scss',
          'silverstripe-mfa/client/src/bundles/bundle-silverstripe-mfa.scss',
          'silverstripe-totp-authenticator/client/src/bundles/bundle-silverstripe-totp-authenticator.scss',

          // - silverstripe-login-forms
          'silverstripe-login-forms/client/src/styles/bundle-silverstripe-login-forms.scss',
          'silverstripe-login-forms/client/src/styles/dark-mode-silverstripe-login-forms.scss',

          // symbiote/silverstripe-grouped-cms-menu
          'silverstripe-grouped-cms-menu/GroupedCmsMenu.scss',

          // 'enchantment/bootstrap.scss',
          'enchantment/enchantment-style.scss',
          'enchantment/enchantment.js',
          'enchantment/enchantment-wysiwyg.scss',
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

          // extra

          {
            src: './enchantment/fonts/*',
            dest: '../dist/enchantment/assets/enchantment/fonts',
          },
          {
            src: './enchantment/images/*',
            dest: '../dist/enchantment/assets/enchantment/images',
          },

          // lost assets
          {
            src: './silverstripe-asset-admin/client/src/components/InsertEmbedModal/placement.png',
            dest: '../dist/enchantment/assets/enchantment',
          },
        ],
      })
    ],

    css: {
      preprocessorOptions: {
        scss: {
          additionalData: cfg.sassAdditionalData,
        },
      },
      postcss: {
        plugins: [
          autoprefixer,
        ],
      }
    },
  };

});
