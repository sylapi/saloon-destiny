<?php

namespace Sylapi\Saloon\Destiny\Tests\Documents;

use DateTime;
use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\Order;
use Sylapi\Saloon\Destiny\Requests\Documents\CreateOrderRequest;

class OrderTest extends TestCase
{
    public function createOrder(): Order
    {
        $order = new Order();
        $order->setExternalOrderId('123');
        $order->setCompletionDate(new DateTime());
        $order->setCustomerTaxId('123');
        $order->setCustomerPostalCode('123');
        $order->setCustomerAddress('123');
        $order->setCustomerPostOffice('123');
        $order->setCustomerEmail('test@savicki.pl');
        $order->setCustomerName('123');
        $order->setCurrencyId(1);
        $order->setPaymentWayId(1);
        $order->setBusinessPlaceId(1);
        $order->setCountryId(1);
        $order->setCustomerId(1);

        $this->assertTrue($order->validate());

        return $order;
    }

    public function testCreateOrder()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200),
        ]);

        $order = $this->createOrder();
        $request = new CreateOrderRequest($order);

        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);
        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }
}
