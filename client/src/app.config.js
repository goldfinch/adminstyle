
const dev = import.meta.env && !import.meta.env.DEV;
const host = 'silverstripe-starter.lh';

const bootstrap_icon_path = dev ? '/node_modules/bootstrap-icons/font/fonts/' : '/_resources/vendor/goldfinch/extra-assets/client/dist/bootstrap-icons/icons/';
const silverstripe_admin = dev ? '' : 'silverstripe-admin/client/src/'
const enchantment = dev ? '' : 'enchantment/'
export default {

  host: host,
  certs: '/Applications/MAMP/Library/OpenSSL/certs/' + host,

  sassAdditionalData: `
    $bootstrap-icon-path: '${bootstrap_icon_path}';
    $silverstripe-admin: '${silverstripe_admin}';
    $enchantment: '${enchantment}';
  `,

  public: {
      bootstrap_icon_path: bootstrap_icon_path,
  }
}
