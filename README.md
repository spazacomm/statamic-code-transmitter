<p align="center">
    <img src="./img/time-to-dev-logo.svg" height="250" alt="time-to.dev">
</p>
<hr>

## This is a Fork of the original statamic-code-transmitter. Modified to support v5 and Laravel 11.

# Code Transmitter Fieldtype for Statamic 4 & 5

## Description

This is a simple Statamic 4 fieldtype that allows to pass HTML code to the frontend (inline).

> **Warning**
> This addon is not further developed or maintained.
> However, you can create a merge request or fork this project to customize it as you wish.

## Purpose

You can utilize this addon to incorporate the "Code Transmitter" fieldtype in your blueprints.
The "Code Transmitter" fieldtype empowers you to transmit HTML and CSS code to the frontend.
This proves to be highly useful when you intend to enhance your pages with HTML content through the control panel,
without the need to modify the Antlers templates.

## Installation

> **Note**
> This addon was specifically developed for Statamic 4. However, comprehensive backward compatibility testing has not been conducted.
> Please note that compatibility with later versions of Statamic cannot be guaranteed.

Install it via the composer command:

``` bash
composer require time-to-dev/statamic-code-transmitter
```

Publish the JavaScript file for the Control Panel:

``` bash
php artisan vendor:publish --provider="TimeToDev\CodeTransmitter\ServiceProvider" --force
```

## Support

I love to share with the community. Nevertheless, it does take a lot of work, time and effort.

[Sponsor me on GitHub](https://github.com/sponsors/time-to-dev/) to support my work and the support for this addon.

## Resources

- https://statamic.dev/extending/addons

## License

This fieldtype is licensed under the MIT license.
