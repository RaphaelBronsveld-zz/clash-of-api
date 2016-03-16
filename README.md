![Laravel logo](http://laravel.com/assets/img/laravel-logo.png)  Clash Of API
========================

| **Laravel** | 5.1 |
|:-----------:|:----:|
| Clash of API | v1.0 |
  
**Laravel** package providing additional functionality to the official Clash Of Clans API.

[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](https://packagist.org/packages/raphaelb/clashofapi)
[![GitHub Version](https://img.shields.io/github/release/raphaelbronsveld/clash-of-api.svg?branch=master&style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![Code Coverage](https://img.shields.io/badge/coverage-100%-green.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![Total Downloads](https://img.shields.io/packagist/dt/raphaelb/clashofapi.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![License](http://img.shields.io/badge/license-MIT-ff69b4.svg?style=flat-square)](http://RaphaelBronsveld.mit-license.org)

## 1.0 Released
#####Features
- View as example @ yoururl.com/clashofclans.
- Ready-to-use
- Additional features coming soon.

##### Composer require
```JSON
"raphaelb/clashofapi": "~1.0"
```

##### API Key

Before this is going to work you need to get an api key from https://developer.clashofclans.com/#/

Insert this into your .env file.

CLASH_KEY=yourapikeyhere


##### Laravel usage
```php
Raphaelb\ClashOfApi\ClashServiceProvider::class

'Clash' => Raphaelb\ClashOfApi\Facades\Clash::class

php artisan vendor:publish to get the view and the clash.php file generated.
```

##### Some examples
```php
// Resolving from the container.
public function getClans(){
    $clans = app()->make('clash')
                    ->getClans(['name'  => 'Clans',
                                'limit' => '20']);
    return view('yourview', compact('clans'));
}

// Facade way. 
public function getLocations(){
    $locations = \Clash::getLocations();
    
    return view('yourview', compact('locations'));
}

public function getLeagues(){
    $clash = new Clash();
    $leagues = $clash->getLeagues();
    
    return view('yourview', compact('leagues'));
}

public function getClan($id){
    //Just an example. $id can be something you are requesting.
    $id = "LGRQPCJG";
    
    $clash = new Clash();
    $leagues = $clash->getClan($id);
    
    return view('yourview, compact('leagues'));
}
```

##### Methods
```php
public function getLeagues(){};
public function getClan($id){};
public function getClans($params){};
public function getLocation($id){};
public function getLocations(){};
``` 

##### Objects
Everything returned is an object, so that makes it super easy to access different data.
For the different properties just check the documentation at https://developer.clashofclans.com/#/documentation

```php
$clan  = app()->make('clash')
            ->getClan('RJVPRCQ');

$members = $clan->memberList;
```

### Copyright/License
Copyright 2016 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>