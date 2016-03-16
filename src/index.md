##### In-depth Example

```php  
/**
 *  This api is simply building up the right url to get the right results.
 *  Let's say you want to retrieve a clan by id. In this case it's the clan tag.
 *  In this case the url is like /clans/RJVPRCQ. $id = RJVPRCQ
 */
 
 public function getClan($id){
    $client = new Clash();
    
    $clan = $client->getClan($id);
    
    //$clan is an object now. Do whatever you want with it.
    
    return view('pages.clans.show', compact('clan'));
 }
```