<?php

namespace SysCart;

require __DIR__ . '/../../../../svenanders/sarmysql/src/SarMysql/SarMysql.php';

class SysCart
{

    protected $totalsArray;

    public function __construct()
    {

    }


    public function calculateTotalFromInvoice($invoice = 0)
    {
        $db = new \SarMysql\SarMysql();

        $this->totalsArray =
            array(
                "grand" => 0,
                "items" => 0,
                "freight" => 0,
                "fee" => array()
            );


        $skus = $db->select("invoice_sku", array(
            "Quantity", "BuyPrice", "ListPrice", "SalePrice", "Freight"
        ), "WHERE Invoice = ? AND Cancelled != 'Y'", array($invoice));
        foreach ($skus as $sku) {
            if ($sku["SalePrice"] > 0)
                $this->totalsArray["items"] += $sku["Quantity"] * $sku["SalePrice"];
            else if ($sku["BuyPrice"] > 0)
                $this->totalsArray["items"] += $sku["Quantity"] * $sku["BuyPrice"];
            else
                $this->totalsArray["items"] += $sku["Quantity"] * $sku["ListPrice"];
        }

        // add total of items and freight to grand total
        $this->totalsArray["grand"] += $this->totalsArray["items"];

        // get total item cost and freight
        $fees = $db->select("invoice_fee", array(
            "Fee", array("SUM(Value)", "Value")
        ), "WHERE Invoice = ? GROUP BY Fee", array($invoice));


        foreach ($fees as $fee) {
            //store fee total indexed by name
            $Total[($this->_getFeeName($fee["Fee"]))] = $fee["Value"];

            //add total to grand
            $this->totalsArray["grand"] += $fee["Value"];

        }

        //make sure a coupon doesn't turn the invoice into a credit
        if ($this->totalsArray["grand"] < 0.00) {
            $this->totalsArray["grand"] = 0.00;
        }

        return $this->totalsArray;
    }

    private function _getFeeName($feeID)
    {
        STATIC $fee;

        if (!is_array($fee)) {
            $db = new \SarMysql\SarMysql();
            $fees = $db->select("fee", array(
                "ID", "Name"
            ), "WHERE ID >= ?", array(0), 2);

            foreach ($fees as $feeRow) {
                $fee[($feeRow->ID)] = $feeRow->Name;
            }

        }

        return ($fee[$feeID]);
    }

}