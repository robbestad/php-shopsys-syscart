<?php

namespace shopsys\tests;

use shopsys\SysCart;

require __DIR__.'/../src/SysCart/SysCart.php';

class SysCartTest extends \PHPUnit_Framework_TestCase{

    protected $cart;

    public function __construct(){
        $this->cart = new SysCart();
    }

    public function testInit(){
        $this->assertInternalType('array', $this->cart->calculateTotal());
    }


}