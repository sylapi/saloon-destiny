<?php

namespace Sylapi\Saloon\Destiny\Requests\Goods;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Sylapi\Saloon\Destiny\DestinyConnector;

class GetGoodRequest extends Request
{
    protected Method $method = Method::GET;

    protected ?string $connector = DestinyConnector::class;

    public function resolveEndpoint(): string
    {
        $endpoint = 'm/option/good';

        if (!empty($this->params)) {
            $i = 0;
            foreach ($this->params as $key => $value) {
                if ($i == 0) {
                    $endpoint .= '?cond[' . $key . '_eq]=' . $value; 
                } else {
                    $endpoint .= '&cond[' . $key . '_eq]=' . $value; 
                }

                $i++;
            }
        }

        return $endpoint;
    }

    public function __construct(public array $params)
    {
        
    }
}