### In-depth Examples
```php 
/**
 *  This api is simply building up the right url to get the right object.
 *  With that object you can do whatever you want. If you want more functionality please contact me.
 */
 
public function getClanLeaders($id){
    $clash = new Clash();
    
    $clan = $clash->getClan($id);
    
    //$clan is an object now. Let's grab those leaders.
    
    $leaders = $clan->getLeaders();
    
    //Done!
    
    return view('pages.clan.leaders.show', compact('leaders'));
}
 
public function getCountries(){
    
    // What about just the countries.
    $countries = app()->make('clash')->getLocations()->getCountries();
    
    // Done!
    
    return view('pages.locations.countries.show', compact('countries'));
}

// Or just with the helper method
public function getClans(){
    // Accessing data property so we won't have to do that in our view file. 
    // Looks cleaner that way.
    $clans = clash()->getClans(['name' => 'test',
                                        'limit' => '10'])->data;
    
    return view('yourview', compact('clans'));
}
```

What about views?

```html
<!-- Results from clans, locations and leagues are set into the data property. 
     You have to loop through that. 
     If you are getting leaders, countries or members 
     i'm already accessing the data property so you won't have to.
     Really depends on what you are doing in your container. -->
     
@foreach($clans->data as $clan)
    <ul>
        <li>
            Clanname: {{ $clan->name }}
        <br>
            Members: {{ $clan->members }}
        </li>
    </ul>
@endforeach

<!-- Single results ( Location, league, clan ) need to be set like this. -->

Let's say you have this in your controller.
$clan = \Clash::getClan('LGRQPCJG');
$clan is now a Clan object with the 'data' property.

{{ $clan->data->name }}
{{ $clan->data->tag }}
{{ $clan->data->members }}

Or:

$clan = \Clash::getClan('LGRQPCJG')->data;

{{ $clan->name }}
{{ $clan->tag }}
{{ $clan->members }}

Just depends on your needs.

For all the methods please take a look at the Raphaelb\ClashOfApi\Clash class.
```
### Copyright/License
Copyright 2016 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>