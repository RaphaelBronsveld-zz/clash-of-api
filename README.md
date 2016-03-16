![Laravel logo](http://laravel.com/assets/img/laravel-logo.png)  Clash Of API
========================

| **Laravel** | 5.1 |
|:-----------:|:----:|
| Clash of API | v1.0 |
  
**Laravel** package providing additional functionality to the official Clash Of Clans API.

## 1.0 Released
Features
- View as example @ yoururl.com/clashofclans.
- Ready-to-use
- Additional features coming soon.

###### Composer require
```JSON
"raphaelb/clashofapi": "~1.0"
```

###### API Key

Before this is going to work you need to get an api key from https://developer.clashofclans.com/#/

Insert this into your .env file with the key CLASH_KEY.

CLASH_KEY=yourapikeyhere


###### Laravel usage
```php
Raphaelb\ClashOfApi\ClashServiceProvider::class

'Clash' => Raphaelb\ClashOfApi\Facades\Clash::class

php artisan vendor:publish to get the view and the clash.php file generated.
```

###### Some examples

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

### Copyright/License
Copyright 2016 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 