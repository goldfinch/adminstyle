export default function initCfg(command, mode, ssrBuild) {

  const dev = command === 'serve';
  const host = 'silverstripe-starter.lh';

  const buildAssetsDir = '/_resources/vendor/goldfinch/enchantment/client/dist/enchantment/assets/'

  const bootstrap_icon_path = dev ? '../node_modules/bootstrap-icons/font/fonts' : '/_resources/vendor/goldfinch/extra-assets/client/dist/bootstrap-icons/icons';
  const silverstripe_admin = dev ? 'silverstripe-admin/client/src/' : '/_resources/vendor/goldfinch/enchantment/client/dist/enchantment/assets/'
  const enchantment = dev ? '/_resources/vendor/goldfinch/enchantment/client/dist/enchantment/assets/enchantment/' : ''

  const silverstripe_admin_font_path = dev ? '../../../../silverstripe-admin/client/src/font/fonts/' : (buildAssetsDir + 'silverstripe-admin/client/src/font/fonts/');
  const enchantment_images = dev ? './images/' : (buildAssetsDir + 'enchantment/images/');

  return {

    host: host,
    certs: '/Applications/MAMP/Library/OpenSSL/certs/' + host,

    sassAdditionalData: `
      $bootstrap-icons-font-dir: '${bootstrap_icon_path}';
      $silverstripe-admin: '${silverstripe_admin}';
      $enchantment: '${enchantment}';

      $silverstripe-admin-font-path: '${silverstripe_admin_font_path}';
      $enchantment_images: '${enchantment_images}';
    `,

    public: {
        bootstrap_icon_path: bootstrap_icon_path,
    }
  }
}
