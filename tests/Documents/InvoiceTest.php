<?php

namespace Sylapi\Saloon\Destiny\Tests\Documents;

use DateTime;
use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\Invoice;
use Sylapi\Saloon\Destiny\Requests\Documents\CreateInvoiceRequest;

class InvoiceTest extends TestCase
{
    public function createInvoice(): Invoice
    {
        $invoice = new Invoice();
        $invoice->setOrderId(123);
        $invoice->setNote('test');
        $invoice->setPaymentWayId(123);
        $invoice->setPrintedNote('test');
        $invoice->setDate(new DateTime());
        $invoice->setSaleDate(new DateTime());
        $invoice->setDocDate(new DateTime());
        $invoice->setCountryIso('PL');

        $this->assertTrue($invoice->validate());

        return $invoice;
    }

    public function testCreateOrder()
    {
        $mockClient = new MockClient([
            MockResponse::make(['result_code' => 0, 'json_data' => []], 200),
        ]);

        $invoice = $this->createInvoice();
        $request = new CreateInvoiceRequest($invoice);

        $connector = new DestinyConnector();

        $response = $connector->send($request, $mockClient);
        $this->assertEquals(0, $response->json()['result_code']);
        $this->assertEquals(200, $response->status());
    }
}
