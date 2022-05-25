<?php

namespace App\Service;

use App\Service\interfaces\ApiInterface;

class Api implements ApiInterface
{
    public function getDataApi(array $data)
    {
        $datefrom = date("d/m/Y", strtotime($data['datefrom']));
        $dateupto = date("d/m/Y", strtotime($data['dateupto']));
        $url = 'http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1='.$datefrom.'&date_req2='.$dateupto.'&VAL_NM_RQ=R01235';
        $data_xml = file_get_contents($url);
        return $data_xml;
    }

}
