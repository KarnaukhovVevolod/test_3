<?php

namespace App\Service;
use App\Service\Adapter;
use App\Service\Api;
use App\Service\interfaces\AdapterInterface;
use App\Service\interfaces\ApiInterface;

class GetGraphicService
{
    public function getDataGraphic(array $data, string $param)
    {
        switch ($param) {
            case 'graphic_dollars':
                $api = new Api();
                $adapter = new Adapter();
                break;
            default:
                $api = null;
                $adapter = null;
        }
        if (
            $api instanceof ApiInterface &&
            $adapter instanceof AdapterInterface
        ) {
            $apiData = $api->getDataApi($data);
            $returnData = $adapter->adapter($apiData);
        } else {
            $returnData = [];
        }

        return $returnData;
    }

}
