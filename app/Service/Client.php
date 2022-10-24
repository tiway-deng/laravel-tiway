<?php


namespace App\Service;


class Client
{
    protected $baseUri = 'host.docker.internal:8500';

    protected $serviceName;

    public function __construct($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return array
     */
    public function getClient()
    {
        $client = New \Consul\Client(['base_uri' => $this->baseUri]);
        $catalog = new \Consul\Services\Catalog($client);
        $services = $catalog->service($this->serviceName)->json();

        //根据随机策略获取服务
        $index = rand(0, count($services) - 1);
        $service = $services[$index];
        if ($service) {
            return [true, $service['ServiceAddress'] . ':' . $service['ServicePort']];
        }

        return [false, ''];
    }

}
