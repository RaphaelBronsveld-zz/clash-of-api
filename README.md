![Laravel logo](http://laravel.com/assets/img/laravel-logo.png)  Clash Of API
========================

| **Laravel** | 5.1 |
|:-----------:|:----:|
| Clash of API | v2.1 |
  
**Laravel** package providing additional functionality to the official Clash Of Clans API.

[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](https://packagist.org/packages/raphaelb/clashofapi)
[![GitHub Version](https://img.shields.io/github/release/raphaelbronsveld/clash-of-api.svg?branch=master&style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![Code Coverage](https://img.shields.io/badge/coverage-100%-green.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![Total Downloads](https://img.shields.io/packagist/dt/raphaelb/clashofapi.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![License](http://img.shields.io/badge/license-MIT-ff69b4.svg?style=flat-square)](http://RaphaelBronsveld.mit-license.org)

## 2.1 Released
#####Features
- View as example @ yoururl.com/clashofclans.
- Ready-to-use
- Additional features.
- Helper method clash().

##### Composer require
```JSON
"raphaelb/clashofapi": "~2.1"
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
    
    return view('yourview', compact('leaders'));
}

// Or just with the helper method
public function getClans(){
    
    $clans = clash()->getClans(['name' => 'test',
                                        'limit' => '10']);
    
    return view('yourview', compact('clans'));
}

```

##### General Methods
```php
public function getLeagues();
public function getClan($tag);
public function getClans($params);
public function getWarlog($tag);
public function getLocation($id);
public function getLocations();
public function getPlayerRankings($location);
public function getClanRankings($location);
public function getMemberList();
public function getMemberCount();
public function getLeaders();
public function getPlayer($tag)
``` 

##### In-depth examples
Please check the examples.md file located in the src folder.

#### Todo list
Custom exceptions. Move to a stable 3.0


### Copyright/License
Copyright 2016 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>