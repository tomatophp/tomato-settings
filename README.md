![Screenshot](https://github.com/tomatophp/tomato-settings/blob/master/art/screenshot.png)

# Tomato Settings

🍅 Full Settings Generator / Manager with GUI for [TomatoPHP](https://docs.tomatophp.com/) build with [Splade](https://splade.dev/) build with [Laravel-settings](https://github.com/spatie/laravel-settings)

## Installation

```bash
composer require tomatophp/tomato-settings
```
after install use this command to install the package and publish assets

```bash
php artisan tomato-settings:install
```

## Using

you can generate a new setting for this package by use this command

```bash
php artisan tomato:setting
```

it will ask you for the setting name and if you like to put it inside a module as HMVC.

after run the command you must register the menu on the `tomato-admin` config or Module provider.

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/tomato-settings)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Queen Tech Solutions](https://github.com/queents)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
