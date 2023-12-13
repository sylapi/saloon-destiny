<?php

namespace Sylapi\Saloon\Destiny\Requests\Documents;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Sylapi\Saloon\Destiny\DestinyConnector;
use Sylapi\Saloon\Destiny\Entities\Documents\Order;


class UpdateOrderRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/option/order_sale_doc/' . $this->orderId;
    }

    public function __construct(public string $orderId, public Order $order)
    {
        
    }

    public function defaultData(): array
    {
        return [
            'ext_order_number' => $this->order->getExternalOrderId(),
            'note' => $this->order->getExternalOrderId(),
            'doc_date' => $this->order->getCompletionDate()->format('Y-m-d'),
            'completion_date' => $this->order->getCompletionDate()->format('Y-m-d'),
            'printed_note' => $this->order->getExternalOrderId(),
            'cust_tin' => $this->order->getCustomerTaxId(),
            'cust_post_code' => $this->order->getCustomerPostalCode(),
            'cust_address' => $this->order->getCustomerAddress(),
            'cust_post_office' => $this->order->getCustomerPostOffice(),
            'cust_email' => $this->order->getCustomerEmail(),
            'cust_name' => $this->order->getCustomerName(),
            'id_document_type' => '8589934607',
            'id_currency' => $this->order->getCurrencyId(),
            'id_sys_const_list-payment_way' => $this->order->getPaymentWayId(),
            'id_customer' => $this->order->getCustomerId(),
            'id_business_place' => $this->order->getBusinessPlaceId(),
            'gross_doc' => 1,
            'id_country' => $this->order->getCountryId(),
        ];
    }
    
}