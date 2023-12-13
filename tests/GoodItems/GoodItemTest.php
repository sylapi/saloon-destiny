<?php
namespace Sylapi\Saloon\Destiny\Tests\GoodItems;

use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sylapi\Saloon\Destiny\Entities\Good;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\GoodItem;
use Sylapi\Saloon\Destiny\Requests\GoodItems\CreateGoodItemRequest;
use Sylapi\Saloon\Destiny\Requests\GoodItems\GetGoodItemByIdRequest;

class GoodItemTest extends TestCase
{
    public function testGetGoodItemByIdRequest()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200)
        ]);

        $request = new GetGoodItemByIdRequest(12356);
        
        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);

        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }

    public function testCreateGoodItem()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200)
        ]);

        $goodItem = $this->createGoodItem();

        $this->assertEquals(true, $goodItem->validate());

        $request = new CreateGoodItemRequest($goodItem);
        
        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);

        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }

    private function createGoodItem()
    {
        $goodItem = new GoodItem();
        $goodItem->setIdGood(4294967296007000);
        $goodItem->setName('Towar testowy');
        $goodItem->setInvoiceName('Towar testowy');
        $goodItem->setDescription('Opis towaru testowego');
        $goodItem->setCode('XYZTEST');
        $goodItem->setIdMeasureUnit('8589934598');
        $goodItem->setIdSysConstListLumpRate('8589935015');
        $goodItem->setIdVatRate('8589934598');
        $goodItem->setIdGoodGroup('8589934596');
        $goodItem->setIdSysConstListGoodType('8589934675');
        $goodItem->setStatus(1);
        $goodItem->setIdSysConstListGoodStrategy('8589936096');
        $goodItem->setNetPrice(10000);
        $goodItem->setTotPrice(11000);
        $goodItem->setInactive(0);
        $goodItem->setIdSysConstListJewelerAssay('8589935785');
        $goodItem->setSize(5);

        $goodItem->addSize(5);
        $goodItem->addSize(6);
        $goodItem->addSize(7);


        return $goodItem;
    }
}