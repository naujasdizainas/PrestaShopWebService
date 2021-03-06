<?php

namespace phshopws;

use PHPUnit_Framework_TestCase;
use pshopws\PShopWsException;
use pshopws\PShopWsProducts;
use pshopws\PShopWsProductsTestClass;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @cover PShopWsProducts
 */
class PShopWsProductsTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsProductsTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsProductsTestClass::class, $ps);

        return $ps;
    }

    public function testGetByIdBadRequest()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsProducts(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsProductsTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsProductsTestClass
     */
    public function testGetList($ps)
    {
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }
}
