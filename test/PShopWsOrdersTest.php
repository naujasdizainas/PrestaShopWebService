<?php

namespace phshopws;

use PHPUnit_Framework_TestCase;
use pshopws\PShopWsException;
use pshopws\PShopWsOrders;
use pshopws\PShopWsOrdersTestClass;

/**
 * @author Marcos Redondo <kusflo at gmail.com>
 * @cover PShopWsOrders
 */
class PShopWsOrdersTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $ps = new PShopWsOrdersTestClass('xxx', 'xxx');
        $this->assertInstanceOf(PShopWsOrdersTestClass::class, $ps);

        return $ps;
    }

    public function testBadInstantiated()
    {
        $this->expectException(PShopWsException::class);
        new PShopWsOrders(null, null);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetById($ps)
    {
        $this->assertArrayHasKey("id", $ps->getById(1));
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetList($ps)
    {
        $this->assertArrayHasKey("id", $ps->getList()[0]);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetListLastDays($ps)
    {
        $this->assertArrayHasKey("id", $ps->getListLastDays()[0]);
    }

    /**
     * @depends testCanBeInstantiated
     * @param $ps PShopWsOrdersTestClass
     */
    public function testGetListToday($ps)
    {
        $this->assertArrayHasKey("id", $ps->getListToday()[0]);
    }
}
