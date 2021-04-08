# PHP Countries
Rather than have a large PHP array of countries in your code, this package aims
to help speed up time and tidy your project by returning all countries and the
data you need in a sensible format, following the ISO-3166-1 standard.

This makes sense where you may need to provide a `<select>` HTML element of
countries or seed your database with constant data, for example.

## Installation
```bash
composer require liamjcooper/php-countries
```

## Usage

### Return all countries
```php
<?php

use LiamJCooper\Countries\Builder;

...

(new Builder)->all();

//  returns: [
//      ...
//      ['name' => 'United Kingdom', 'iso_2' => 'GB', 'iso_3' => 'GBR', 'code' => '826'],
//      ['name' => 'United States', 'iso_2' => 'US', 'iso_3' => 'USA', 'code' => '840']
//      ...
//  ]
```

### Search by value
```php
<?php

use LiamJCooper\Countries\Builder;

...

(new Builder)->where('iso_2', 'GB');

//  returns: [
//      ['name' => 'United Kingdom', 'iso_2' => 'GB', 'iso_3' => 'GBR', 'code' => '826']
//  ]