export default function initCfg(command, mode, ssrBuild) {
  const dev = command === 'serve';
  const host = 'mysite.lh';

  const buildAssetsDir = '../../../dist/enchantment/assets/';

  const bootstrap_icon_path = dev
    ? '../node_modules/bootstrap-icons/font/fonts'
    : '../../../dist/bootstrap-icons/fonts';
  const silverstripe_admin = dev
    ? 'silverstripe-admin/client/src/'
    : '../../../dist/enchantment/assets/silverstripe-admin/client/src/';
  const enchantment = dev
    ? '../../../dist/enchantment/assets/enchantment/'
    : '';

  const silverstripe_admin_font_path = dev
    ? '../../../../silverstripe-admin/client/src/font/fonts/'
    : `${buildAssetsDir}silverstripe-admin/client/src/font/fonts/`;
  const enchantment_images = dev
    ? './images/'
    : `${buildAssetsDir}enchantment/images/`;

  const silverstripe_asset_admin = dev
    ? '/silverstripe-asset-admin/client/src/'
    : `${buildAssetsDir}silverstripe-asset-admin/client/src/`;
  const silverstripe_cms = 'silverstripe-cms/client/src/';

  return {
    host,
    certs: `/Applications/MAMP/Library/OpenSSL/certs/${host}`,

    sassAdditionalData: `
      $bootstrap-icons-font-dir: '${bootstrap_icon_path}';
      $silverstripe-admin: '${silverstripe_admin}';
      $enchantment: '${enchantment}';

      $silverstripe-admin-font-path: '${silverstripe_admin_font_path}';
      $enchantment_images: '${enchantment_images}';

      $theme-path-silverstripe-asset-admin: '${silverstripe_asset_admin}';
      $theme-path-silverstripe-cms: '${silverstripe_cms}';
    `,

    public: {
      bootstrap_icon_path,
    },
  };
}
