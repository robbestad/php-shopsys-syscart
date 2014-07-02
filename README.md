# SysCart for ShopSys

###More info

http://blog.robbestad.com

### How to use

In your composer.json, add the following line

    "shopsys/php-shopsys-syscart": "dev-master"


In your code, include the class:

    use SysCart/SysCart as cart;

(or use composer's autoloader)

and then in your functions, use it like this:

     $SysCart = new cart();

Tests:

execute **phpunit vendor/shopsys/syscart/tests/** from the root of your project to run the tests

#####License:

Sven Anders Robbestad (C) 2014

<img src="http://i.creativecommons.org/l/by/3.0/88x31.png" alt="CC BY">

