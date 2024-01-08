<?php

namespace Sylapi\Saloon\Destiny\Requests\Documents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\Invoice;

class CreateInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/command/8589934718';
    }

    public function __construct(public Invoice $invoice)
    {

    }

    public function defaultData(): array
    {
        return [
            '_option' => 'order_sale_doc',
            '_ids' => [$this->invoice->getOrderId()],
            '_data' => [
                'note' => $this->invoice->getNote(),
                'id_payment_way' => $this->invoice->getPaymentWayId(),
                'printed_note' => $this->invoice->getPrintedNote(),
                'date' => $this->invoice->getDate()->format('Y-m-d'),
                'sale_date' => $this->invoice->getSaleDate()->format('Y-m-d'),
                'doc_date' => $this->invoice->getDocDate()->format('Y-m-d'),
                'erp_id' => $this->invoice->getOrderId(),
                'country_iso' => $this->invoice->getCountryIso(),
            ],
        ];
    }
}
