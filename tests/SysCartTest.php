<?php

namespace SysCart\tests;

use SysCart\SysCart;

require __DIR__.'/../src/SysCart/SysCart.php';

class SysCartTest extends \PHPUnit_Framework_TestCase{

    protected $cart;

    public function __construct(){
        $this->cart = new SysCart();
    }

    public function testCalculateTotalFromInvoice(){
        $invoiceTotal=$this->cart->calculateTotalFromInvoice('11161');
        $this->assertInternalType('array', $invoiceTotal);
        $this->assertNotEmpty($invoiceTotal["grand"]);
    }


}