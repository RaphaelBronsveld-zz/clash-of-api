![Laravel logo](http://laravel.com/assets/img/laravel-logo.png)  Clash Of API
========================

| Clash of API | v3.0 |
  
**Laravel** package providing additional functionality to the official Clash Of Clans API.

[![Build Status](https://travis-ci.org/RaphaelBronsveld/clash-of-api.svg?branch=master)](https://packagist.org/packages/raphaelb/clashofapi)
[![GitHub Version](https://img.shields.io/github/release/raphaelbronsveld/clash-of-api.svg?branch=master&style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![StyleCI](https://styleci.io/repos/54012395/shield?branch=master)](https://styleci.io/repos/54012395)
[![Total Downloads](https://img.shields.io/packagist/dt/raphaelb/clashofapi.svg?style=flat-square)](https://packagist.org/packages/raphaelb/clashofapi)
[![License](http://img.shields.io/badge/license-MIT-ff69b4.svg?style=flat-square)](http://RaphaelBronsveld.mit-license.org)

##### Composer require
```JSON
"raphaelb/clashofapi": "~3.0"
```

##### API Key

Before this is going to work you need to get an api key from https://developer.clashofclans.com/#/

Insert this into your .env file.

CLASH_KEY=yourapikeyhere

##### Example
```php
public function someMethodBeingCalled()
{
    $clans = app()->make('clash')
                    ->getClans(['name'  => 'Clans',
                                'limit' => '20']);
                                
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

### Copyright/License
Copyright 2017 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>