Welcome to Tradenity Symfony framework SDK extensions.
==========

## Installation

This package is available through Packagist (PHP Package Index), to install it type the following on the command line:

    $ composer install tradenity/symfony-ext

Or, add this line to your application's composer.json:

```ruby
{
'tradenity/symfony-ext':"0.1.1"
}
```

And then execute:

    $ composer install

Dfine the required services:

In `app/config/services.yml`:

```yml

services:
    tradenity.session.service:
        class: Tradenity\SDK\Ext\Symfony\Services\SessionService
        arguments: ['@request_stack']

    app.tradenity_customer_user_provider:
        class: Tradenity\SDK\Ext\Symfony\Auth\CustomerUserProvider
        
```

If you will use the provided authentication support, add this to your security encoders:

```yml

encoders:
    Tradenity\SDK\Ext\Symfony\Auth\CustomerUser:
        algorithm:            bcrypt
        cost:                 10
            
```

Now you can add your credentials and start use the SDK services:

In `app/config/config.yml`:
 
```yml

parameters:
    tradenity_key: sk_xxxxxxxxxxxxxxxxxxxx
    stripe_public_key: pk_xxxxxxxxxxxxxxxx
```

## Sample application

Working sample application code can be found [here](https://github.com/tradenity/camerastore-php-symfony-sample). 

## Documentation

Detailed documentation can be found on our [knowledge base site:](http://docs.tradenity.com/kb/tutorials/php/symfony/)



## Contributing

1. Fork it ( https://github.com/tradenity/php-sdk-symfony-ext/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request
