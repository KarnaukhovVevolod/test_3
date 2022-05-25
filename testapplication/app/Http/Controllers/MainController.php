<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        //$url = route('/graphic');


        $url = url("/graphic");
        $token = csrf_token();
        //die();

        $data = [1,23,34,4,12,89,12,45,8,12,345,90,2];
        $data = json_encode($data);
        //dd($data);
        return view('home', compact('data','url','token'));
    }

    public function graphic(Request $request)
    {
        //route()
        if ($request->isMethod('POST')) {
            $data_post = $request->post();
            $datefrom = date("d/m/Y", strtotime($data_post['datefrom']));
            $dateupto = date("d/m/Y", strtotime($data_post['dateupto']));
            $url = 'http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1='.$datefrom.'&date_req2='.$dateupto.'&VAL_NM_RQ=R01235';
        }
         $data = [[0,1],[1,2],[3,4],[5,6],[7,8],[9,0],[10,2],[11,45],[12,79],[13,4],[14,488],[15,3],[18,9],[23,4],[26,1]];
        //$url = 'http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=02/03/2001&date_req2=14/03/2001&VAL_NM_RQ=R01235';
        $data_xml = file_get_contents($url);
        $xml = simplexml_load_string($data_xml);
        $data_result = [];
        foreach($xml->Record as $record) {

            $date = $record->attributes()['Date']->__toString();//new \DateTime(str_replace('.','-',$record->attributes()['Date']->__toString()));
            //$date = strtotime($date);
            $dat = explode('.',$date);
            $date =gmmktime(0, 0, 0, (int)$dat[1], (int)$dat[0], $dat[2])*1000;
            //echo date("d.m.Y",$date)."<br>";

            $data_result[]=[
                $date,
                (float)str_replace(',','.',$record->Value->__toString())
                //$record->Value->__toString()
            ];
        }
        //echo "<pre>".print_r($data_result, true)."</pre>";
        //echo "July 1, 2000 is on a " . gmmktime(0, 0, 0, 1, 1, 2007);
        //echo datetime("d.m.Y", 1167868800000)."<br>";
        //echo gmdate("M d Y H:i:s", mktime(0, 0, 0, 1, 1, 1998));

        //echo "<br>". mktime(0, 0, 0, 1, 1, 2001)."</br>";
        //echo "<br>".gmdate("M d Y H:i:s",1167609600000)."</br>";
         $data = json_encode($data_result);
         echo $data;
         die();
    }
}
