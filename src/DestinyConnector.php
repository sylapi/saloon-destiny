<?php

namespace Sylapi\Saloon\Destiny;

use Saloon\Http\Connector;

class DestinyConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return $this->destinyUrl;
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Connection' => 'close',
            '_dst_client_id' => $this->dstClientId,
            '_dst_user' => $this->dstUser,
            '_dst_pass' => $this->dstPass,
            'Authorization' => 'Basic '.base64_encode($this->basicAuthUser.':'.$this->basicAuthPassword),
        ];
    }

    public function __construct(private string $dstClientId, private string $dstUser, private string $dstPass, private string $basicAuthUser, private string $basicAuthPassword, private string $destinyUrl)
    {

    }
}
