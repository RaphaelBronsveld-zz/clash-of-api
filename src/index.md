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
```

What about views?

```html
<!-- Multiple results are set into the data property. You have to loop through that. -->
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