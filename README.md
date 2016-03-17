![Laravel logo](http://laravel.com/assets/img/laravel-logo.png)  Clash Of API
========================

| **Laravel** | 5.1 |
|:-----------:|:----:|
| Clash of API | v2.0 |
  
**Laravel** package providing additional functionality to the official Clash Of Clans API.

[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](https://packagist.org/packages/raphaelb/clashofapi)
[![GitHub Version](https://img.shields.io/github/release/raphaelbronsveld/clash-of-api.svg?branch=master&style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![Code Coverage](https://img.shields.io/badge/coverage-100%-green.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![Total Downloads](https://img.shields.io/packagist/dt/raphaelb/clashofapi.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![License](http://img.shields.io/badge/license-MIT-ff69b4.svg?style=flat-square)](http://RaphaelBronsveld.mit-license.org)

## 2.0 Released
#####Features
- View as example @ yoururl.com/clashofclans.
- Ready-to-use
- Additional features.

##### Composer require
```JSON
"raphaelb/clashofapi": "~2.0"
```

##### API Key

Before this is going to work you need to get an api key from https://developer.clashofclans.com/#/

Insert this into your .env file.

CLASH_KEY=yourapikeyhere


##### Laravel usage
```php
Raphaelb\ClashOfApi\ClashServiceProvider::class

'Clash' => Raphaelb\ClashOfApi\Facades\Clash::class

// php artisan vendor:publish to get the view and the clash.php file generated.
// Without this command it's not going to work.
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
public function getCountries(){
    $countries = \Clash::getLocations()->getCountries();
    
    return view('yourview', compact('countries'));
}

public function getLeagues(){
    $clash = new Clash();
    $leagues = $clash->getLeagues();
    
    return view('yourview', compact('leagues'));
}

public function getClanLeaders($id){
    //Just an example. $id can be something you are requesting.
    $id = "LGRQPCJG";
    
    $clash = new Clash();
    $leaders = $clash->getClan($id)
                    ->getLeaders();
    
    return view('yourview, compact('leaders'));
}
```

##### General Methods
```php
public function getLeagues(){};
public function getClan($id){};
public function getClans($params){};
public function getLocation($id){};
public function getLocations(){};

// For the clan(s) object.
public function getMemberList();
public function getLocation();
public function getMemberCount();
public function getLeaders();

// For the Location(s) object.
public function getCountries();

// For the League(s) object.
``` 

##### In-depth examples
Please check the index.md file located in the src folder.

### Copyright/License
Copyright 2016 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>