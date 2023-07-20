
class AdminGear {

  constructor() {

    this.init()

  }

  init() {

    // TODO last edited date

    let editLink = document.head.querySelector('meta[name="x-cms-edit-link"]');

    if (editLink) {

      let logoutLink = document.head.querySelector('meta[name="x-cms-logout-link"]');

      let html = '\
        <div class="adminctrl">\
          <ul>\
            <li data-i="exit"><a href="' + logoutLink.content + '" title="Log out"></a></li>\
            <li data-i="planet"><a href="/admin" title="Admin panel"></a></li>\
            <li data-i="build"><a href="' + editLink.content + '" title="Edit this page"></a></li>\
          </ul>\
        </div>\
      ';

      let body = document.getElementsByTagName('body')[0];

      body.innerHTML += html;

      let adminctrl = document.getElementsByClassName('adminctrl')[0];

      adminctrl.addEventListener('mouseover', (e) => {
        adminctrl.classList.add('adminctrl--active')
      });
      adminctrl.addEventListener('mouseout', (e) => {
        adminctrl.classList.remove('adminctrl--active')
      });

      setTimeout(() => adminctrl.classList.add('adminctrl--visible'), 100);
    }

  }

}

window.addEventListener('load', (event) => {
  new AdminGear();
});
