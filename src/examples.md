### In-depth Examples
```php 
/**
 *  This api is simply building up the right url to get the right object.
 *  With that object you can do whatever you want. If you want more functionality please contact me.
 */
 
public function getClanLeaders($id)
{
    $clash = new Clash();
    
    $clan = $clash->getClan($id);
    
    //$clan is an object now. Let's grab those leaders.
    
    $leaders = $clan->getLeaders();
    
    //Done!
    
    return view('pages.clan.leaders.show', compact('leaders'));
}
 
public function getCountries()
{
    
    // What about just the countries.
    $countries = app()->make('clash')->getLocations()->getCountries();
    
    // Done!
    
    return view('pages.locations.countries.show', compact('countries'));
}

// Or just with the helper method
public function getClans()
{
    $clans = clash()->getClans(['name' => 'test',
                                        'limit' => '10']);
    
    return view('yourview', compact('clans'));
}
```

What about views?

```html
@foreach($clans as $clan)
    <ul>
        <li>
            Clanname: {{ $clan->name }}
        <br>
            Members: {{ $clan->members }}
        </li>
    </ul>
@endforeach

Let's say you have this in your controller.
$clan = \Clash::getClan('LGRQPCJG');

{{ $clan->name }}
{{ $clan->tag }}
{{ $clan->members }}

Just depends on your needs.

For all the methods please take a look at the Raphaelb\ClashOfApi\Clash class.
```

### Copyright/License
Copyright 2017 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>