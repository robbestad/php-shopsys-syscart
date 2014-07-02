# SysConfig for ShopSys

###More info

http://blog.robbestad.com

### How to use

In your composer.json, add the following line

    "shopsys/php-shopsys-sysconfig": "dev-master"


In your code, include the class:

    use SysConfig/SysConfig;

(or use composer's autoloader)

and then in your functions, use it like this:

     $this->config = $SysConfig->getConfig();

this will populate $this->config with the config values from your config-directory

### Protip
Copy config/sysconfig.global.php.dist to your projects config/autoload/sysconfig.local.php and
set your config values

Tests:

execute **phpunit vendor/shopsys/sysconfig/tests/** from the root of your project to run the tests

#####License:

Sven Anders Robbestad (C) 2014

<img src="http://i.creativecommons.org/l/by/3.0/88x31.png" alt="CC BY">

