import replace from 'replace-in-file';

replace({
  files: '../dist/**/*.css',
  from: /\/build\/enchantment\/assets\//g,
  to: '../../../dist/enchantment/assets/',
});

replace({
  files: '../dist/**/*.css',
  from: /\/silverstripe-cms\/client\/src\/images\//g,
  to: '../../../dist/enchantment/assets/silverstripe-cms/client/src/images/',
});

replace({
  files: '../dist/**/*.css',
  from: /\/placement.png/g,
  to: '../../../dist/enchantment/assets/enchantment/placement.png',
});

replace({
  files: '../dist/enchantment/assets/bundle-silverstripe-admin.css',
  from: /\/_resources\/vendor\/goldfinch\/enchantment\/client\/dist\/enchantment\/assets\/images\//g,
  to: '../../../dist/enchantment/assets/silverstripe-admin/client/src/images/',
});
