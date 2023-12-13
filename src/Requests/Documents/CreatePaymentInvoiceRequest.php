<?php

namespace Sylapi\Saloon\Destiny\Requests\Documents;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\PaymentInvoice;

class CreatePaymentInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/command/8589934718';
    }

    public function __construct(public PaymentInvoice $paymentPaymentInvoice)
    {
        
    }

    public function defaultData(): array
    {
        return [
            '_option' => 'order_sale_doc',
            '_ids' => [$this->paymentPaymentInvoice->getOrderId()],
            '_data' => [
                'prepayment_doc' => true,
                'prepayment_value' => $this->paymentPaymentInvoice->getPrepaymentValue(),
                'note' => $this->paymentPaymentInvoice->getNote(),
                'id_payment_way' => $this->paymentPaymentInvoice->getPaymentWayId(),
                'printed_note' => $this->paymentPaymentInvoice->getPrintedNote(),
                'date' => $this->paymentPaymentInvoice->getDate()->format('Y-m-d'),
                'sale_date' => $this->paymentPaymentInvoice->getSaleDate()->format('Y-m-d'),
                'doc_date' => $this->paymentPaymentInvoice->getDocDate()->format('Y-m-d'),
                'country_iso' => $this->paymentPaymentInvoice->getCountryIso(),
            ],
        ];
    }
    
}