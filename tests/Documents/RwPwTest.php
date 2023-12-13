<?php
namespace Sylapi\Saloon\Destiny\Tests\Documents;

use DateTime;
use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\RwPwGood;
use Sylapi\Saloon\Destiny\Entities\Documents\RwPw;
use Sylapi\Saloon\Destiny\Requests\Documents\CreateRwPwRequest;

class RwPwTest extends TestCase
{
    public function createRwPw()
    {
        $rwpwGoodIn = new RwPwGood();
        $rwpwGoodIn->setCode('xyzIN');
        $rwpwGoodIn->setQuantity(2);

        $rwpwGoodOut = new RwPwGood();
        $rwpwGoodOut->setCode('xyzOUT');
        $rwpwGoodOut->setQuantity(1);

        $this->assertTrue($rwpwGoodIn->validate());
        $this->assertTrue($rwpwGoodOut->validate());

        $rwpw = new RwPw();
        $rwpw->addInGood($rwpwGoodIn);
        $rwpw->addOutGood($rwpwGoodOut);
        $rwpw->setIdStorehousePlaceFrom(123);
        $rwpw->setIdStorehousePlaceTo(123);
        $rwpw->setPrintedNote('test');
        $rwpw->setNote('test2');

        $this->assertTrue($rwpw->validate());
       
        return $rwpw;
    }

    public function testCreateRwPw()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200)
        ]);

        $rwpw = $this->createRwPw();

        $request = new CreateRwPwRequest($rwpw);
        
        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);

        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }
}