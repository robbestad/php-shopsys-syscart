<?php

namespace shopsys;

class SysCart
{

    protected $totalsArray;

    public function __construct()
    {

    }


    public function calculateTotal()
    {
        $this->totalsArray = array(
            array(
                "grand" => 0,
                "items" => array(),
                "freight" => 0,
                "fee" => array()
            )
        );

        return $this->totalsArray;
    }
}