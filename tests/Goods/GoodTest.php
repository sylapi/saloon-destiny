<?php
namespace Sylapi\Saloon\Destiny\Tests\Goods;

use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sylapi\Saloon\Destiny\Entities\Good;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Requests\Goods\CreateGoodRequest;
use Sylapi\Saloon\Destiny\Requests\Goods\GetGoodByIdRequest;

class GoodTest extends TestCase
{
    public function testGetGoodByIdRequest()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200)
        ]);

        $request = new GetGoodByIdRequest(12345);
        
        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);

        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }

    public function testCreateGood()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200)
        ]);

        $good = $this->createGood();

        $this->assertEquals(true, $good->validate());

        $request = new CreateGoodRequest($good);
        
        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);

        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }

    private function createGood()
    {
        $good = new Good();
        $good->setName('Towar testowy');
        $good->setInvoiceName('Towar testowy');
        $good->setDescription('Opis towaru testowego');
        $good->setCode('XYZTEST');
        $good->setIdMeasureUnit(8589934598);
        $good->setIdSysConstListLumpRate(8589935015);
        $good->setIdVatRate(8589934598);
        $good->setIdGoodGroup(8589934596);
        $good->setIdSysConstListGoodType(8589934675);
        $good->setStatus(1);
        $good->setIdSysConstListGoodStrategy(8589936096);

        return $good;
    }
}