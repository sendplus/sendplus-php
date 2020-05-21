# Sendplus PHP Package

[![Latest Version](https://img.shields.io/github/release/thephpleague/skeleton.svg?style=flat-square)](https://github.com/sendplus/sendplus-php/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/league/skeleton.svg?style=flat-square)](https://packagist.org/packages/sendplus/sendplus-php)

This is Sendplus official PHP package to easily interacting with sendplus client API.

## Install

Via Composer

``` bash
$ composer require sendplus/sendplus-php
```

## Usage
First you should user Composer autoloader in your application to load all dependencies like below:


``` php
require 'vendor/autoload.php';
use Sendplus\Sendplus;
```

Then You need to configure Http request by entering your api token generated in Sendplus dashboard
``` php
$sendplus = Sendplus::configure('Your-Api-Token');
```

After that it's ready to use methods
``` php
$sendplus->campaign()->all();
```

For more example you can take a look at `examples` or `docs` folder.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/sendplus/sendplus-php/blob/master/CONTRIBUTING.md) for details.

## Credits

- [Pemiphilo](https://github.com/pemiphilo)
- [All Contributors](https://github.com/sendplus/sendplus-php/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
