### In-depth Examples
```php 
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
```
### Methods
For more methods just PR away.
#### Clan
```php
$clan->getTag();
$clan->getMembers();
$clan->getMembers();
$clan->getLocation();
$clan->getMembersCount();
$clan->getLeaders();
```

#### Player
```php
$player->getLeague();
$player->getClan();
$player->getAchievements();
```

#### League
```php
$league->getIcon('small'); // small, tiny, medium
```

#### Warlog
```php
$warlog->getWinCount();
$warlog->getLoseCount();
$warlog->getMatchDates();
```

#### Match
```php
$match->getClan();
$match->getOpponent();
```

### Random Examples

```php
$player = $clan->getLeaders()->first();
$lastOpponent = $warlog->last()->getOpponent();
$icon = $player->getLeague()->getIcon('medium');
```


### Copyright/License
Copyright 2017 [Raphael Bronsveld](https://github.com/RaphaelBronsveld) - [MIT Licensed](http://RaphaelBronsveld.mit-license.org) 

Suggestions? E-mail me at <raphaelbronsveld@outlook.com>