# VirtuaShopwareAnonymizer
## About VirtuaShopwareAnonymizer
Shopware plugin providing function of user data anonymization

##Installation
Download plugin
Ensure plugin dir name is exactly VirtuaShopwareAnonymizer (case of letters matter)
Install composer via plugin manager
###or
with console by navigating to plugin dir and running 
composer install
and than
bin/console sw:pl:ins VirtuaShopwareAnonymizer --activate --clear-cache 

###Note
if after installing and activating the plugin there is no 
Configure > Anonymize menu, just refresh the page


##Usage
To use the plugin from admin panel your cron needs to be set

Anonymize database from admin panel menu with
Configure > Anonymize 
###Or
Anonymize database with console command
bin/console VirtuaShopwareAnonymizer:anonymize

##Testing
To test this plugin you need to prepare database and set
connection data in 

###Warning
Take into account that files in database will be permanently changed

## License
Please see [License File](LICENSE) for more information.