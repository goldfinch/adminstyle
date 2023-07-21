
class AdminGear {

  constructor() {

    this.init()

  }

  init() {

    // TODO last edited date

    let editLink = document.head.querySelector('meta[name="x-cms-edit-link"]');

    if (editLink) {

      let logoutLink = document.head.querySelector('meta[name="x-cms-logout-link"]');

      let body = document.getElementsByTagName('body')[0];

      let adminctrl = document.createElement('div');
      adminctrl.classList.add('adminctrl');
      adminctrl.innerHTML = '\
          <ul>\
            <li data-i="exit"><a href="' + logoutLink.content + '" title="Log out"></a></li>\
            <li data-i="planet"><a href="/admin" title="Admin panel"></a></li>\
            <li data-i="build"><a href="' + editLink.content + '" title="Edit this page"></a></li>\
          </ul>\
      ';

      adminctrl.addEventListener('mouseover', (e) => {

        let element = document.getElementsByClassName('adminctrl')[0];
        element.classList.add('adminctrl--active')
      });
      adminctrl.addEventListener('mouseout', (e) => {

        let element = document.getElementsByClassName('adminctrl')[0];
        element.classList.remove('adminctrl--active')
      });

      setTimeout(() => adminctrl.classList.add('adminctrl--visible'), 100);
    }

  }

}

window.addEventListener('load', (event) => {
  new AdminGear();
});
