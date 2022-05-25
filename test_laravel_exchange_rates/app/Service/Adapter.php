<?php

namespace App\Service;

use App\Service\interfaces\AdapterInterface;

class Adapter implements AdapterInterface
{
    public function adapter(string $data)
    {
        $xml = simplexml_load_string($data);
        $data_result = [];
        foreach($xml->Record as $record) {
            $date = $record->attributes()['Date']->__toString();
            $dat = explode('.',$date);
            $date = gmmktime(0, 0, 0, (int)$dat[1], (int)$dat[0], $dat[2])*1000;
            $data_result[] = [
                $date,
                (float)str_replace(',','.',$record->Value->__toString())
            ];
        }
        return $data_result;
    }

}
