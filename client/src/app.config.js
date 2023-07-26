
const dev = import.meta.env && import.meta.env.DEV;
const host = 'silverstripe-starter.lh';

const bootstrap_icon_path = dev ? '/_resources/vendor/goldfinch/extra-assets/client/dist/bootstrap-icons/icons/' : '../node_modules/bootstrap-icons/font/fonts';
const silverstripe_admin = dev ? 'silverstripe-admin/client/src/' : '/_resources/vendor/goldfinch/enchantment/client/dist/enchantment/assets/'
const enchantment = dev ? '/_resources/vendor/goldfinch/enchantment/client/dist/enchantment/assets/enchantment/' : ''

const silverstripe_admin_font_path = dev ? (silverstripe_admin + 'font/fonts/') : '/_resources/vendor/silverstripe/admin/client/dist/fonts/';

export default {

  host: host,
  certs: '/Applications/MAMP/Library/OpenSSL/certs/' + host,

  sassAdditionalData: `
    $bootstrap-icons-font-dir: '${bootstrap_icon_path}';
    $silverstripe-admin: '${silverstripe_admin}';
    $enchantment: '${enchantment}';
    $silverstripe-admin-font-path: '${silverstripe_admin_font_path}';
  `,

  public: {
      bootstrap_icon_path: bootstrap_icon_path,
  }
}
