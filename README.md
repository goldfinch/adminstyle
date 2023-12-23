# 🦅 Styled Admin theme for Silverstripe

[![Silverstripe Version](https://img.shields.io/badge/Silverstripe-5.1-005ae1.svg?labelColor=white&logoColor=ffffff&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDEuMDkxIDU4LjU1NSIgZmlsbD0iIzAwNWFlMSIgeG1sbnM6dj0iaHR0cHM6Ly92ZWN0YS5pby9uYW5vIj48cGF0aCBkPSJNNTAuMDE1IDUuODU4bC0yMS4yODMgMTQuOWE2LjUgNi41IDAgMCAwIDcuNDQ4IDEwLjY1NGwyMS4yODMtMTQuOWM4LjgxMy02LjE3IDIwLjk2LTQuMDI4IDI3LjEzIDQuNzg2czQuMDI4IDIwLjk2LTQuNzg1IDI3LjEzbC02LjY5MSA0LjY3NmM1LjU0MiA5LjQxOCAxOC4wNzggNS40NTUgMjMuNzczLTQuNjU0QTMyLjQ3IDMyLjQ3IDAgMCAwIDUwLjAxNSA1Ljg2MnptMS4wNTggNDYuODI3bDIxLjI4NC0xNC45YTYuNSA2LjUgMCAxIDAtNy40NDktMTAuNjUzTDQzLjYyMyA0Mi4wMjhjLTguODEzIDYuMTctMjAuOTU5IDQuMDI5LTI3LjEyOS00Ljc4NHMtNC4wMjktMjAuOTU5IDQuNzg0LTI3LjEyOWw2LjY5MS00LjY3NkMyMi40My0zLjk3NiA5Ljg5NC0uMDEzIDQuMTk4IDEwLjA5NmEzMi40NyAzMi40NyAwIDAgMCA0Ni44NzUgNDIuNTkyeiIvPjwvc3ZnPg==)](https://packagist.org/packages/spatie/schema-org)
[![Package Version](https://img.shields.io/packagist/v/goldfinch/enchantment.svg?labelColor=333&color=F8C630&label=Version)](https://packagist.org/packages/spatie/schema-org)
[![Total Downloads](https://img.shields.io/packagist/dt/goldfinch/enchantment.svg?labelColor=333&color=F8C630&label=Downloads)](https://packagist.org/packages/spatie/schema-org)
[![License](https://img.shields.io/packagist/l/goldfinch/enchantment.svg?labelColor=333&color=F8C630&label=License)](https://packagist.org/packages/spatie/schema-org)

Restyled and 🪄 enhanced admin interface for Silverstripe based on Bootstrap 5 🔮

## Install

```
composer require goldfinch/enchantment
```

.env

```
SS_THEME_ENCHANTMENT=true
```

## Usage

#### Enable/Disable

The new interface is controlled by a switcher in *admin/settings*, for you to easily go back to the original theme if you need to. Go and do that in Settings to see the magic 🧙‍♂️ ✨✨✨

You might need to do a page hard-refresh after enabling/disabling it.

#### Icons

**Bootstrap Icons** are included. Go and use it for your needs:

https://icons.getbootstrap.com/

```php
class MyAwesomeAdmin extends ModelAdmin
{
    private static $menu_icon_class = 'bi-fire';
}
```

## Previews

#### Login page
![Login screenshot](screenshots/login.jpeg)
#### Lost password page
![Lost Password screenshot](screenshots/lost-password.jpeg)
#### Page tree
![Page Tree screenshot](screenshots/page-tree.jpeg)
#### Page
![Page screenshot](screenshots/page.jpeg)
#### Assets
![Assets screenshot](screenshots/assets.jpeg)
#### Page Settings
![Page Settings screenshot](screenshots/page-settings.jpeg)

## License

The MIT License (MIT)
