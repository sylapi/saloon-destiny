<?php

namespace Sylapi\Saloon\Destiny\Requests\Margins;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetMarginsRequest extends Request
{
    public ?int $tries = 10;

    public ?int $retryInterval = 500;

    public ?bool $useExponentialBackoff = true;

    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        return 'm/plugin/savicki/live_order_margin?date_from='.$this->dateFrom->format('Y-m-d').'&date_to='.$this->dateTo->format('Y-m-d');
    }

    public function __construct(public DateTime $dateFrom, public DateTime $dateTo)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }
}
