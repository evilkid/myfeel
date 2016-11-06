<?php

/**
 * Created by PhpStorm.
 * User: evilkid
 * Date: 8/6/2016
 * Time: 3:24 PM
 */
class Stats
{
    private $id_user;
    private $returns;

    //date
    private $type;
    private $from;
    private $to;

    //clients
    //number;
    private $clients;

    //enquetes
    //$id_enquete;
    private $enquetes;

    //devices
    //$id_device;
    private $devices;

    /**
     * Stats constructor.
     * @param $id_user
     * @param $returns
     * @param $type
     * @param $from
     * @param $to
     * @param $clients
     * @param $enquetes
     * @param $devices
     */
    public function __construct($id_user, $returns, $type, $from, $to, $clients, $enquetes, $devices)
    {
        $this->id_user = $id_user;
        $this->returns = $returns;
        $this->type = $type;
        $this->from = $from;
        $this->to = $to;
        $this->clients = $clients;
        $this->enquetes = $enquetes;
        $this->devices = $devices;
    }

    public function toJson()
    {
        $json = '{'
            .'"id_user":"'.$this->id_user.'",'.
            '"returns":"'.$this->returns.'",'.
            '"date":{'.
            '"type":"'.$this->type.'",'.
            '"from":"'.$this->from.'",'.
            '"to":"'.$this->to.'"'.
            '}';

        if (count($this->clients) > 0) {
            $json .= ',"clients":{';
            for ($i = 0; $i < count($this->clients); ++$i) {
                $json .= '"client":{"number":"'.$this->clients[$i].'"}';
                if ($i != count($this->clients) - 1) {
                    $json .= ",";
                }
            }
            $json .= '}';
        } else {
            $json .= ',"clients":null';
        }

        if (count($this->enquetes) > 0) {
            $json .= ',"enquetes":{';
            for ($i = 0; $i < count($this->enquetes); ++$i) {
                $json .= '"enquete":{"id_enquete":"'.$this->enquetes[$i].'"}';
                if ($i != count($this->enquetes) - 1) {
                    $json .= ",";
                }
            }
            $json .= '}';
        } else {
            $json .= ',"enquetes":null';
        }

        if (count($this->devices) > 0) {
            $json .= ',"devices":{';
            for ($i = 0; $i < count($this->devices); ++$i) {
                $json .= '"device":{"id_device":"'.$this->devices[$i].'"}';
                if ($i != count($this->devices) - 1) {
                    $json .= ",";
                }
            }
            $json .= '}';
        } else {
            $json .= ',"devices":null';
        }
        $json .= '}';

        return $json;
    }

    public function getResponse()
    {
        define("BASE_URL", 'http://'.$_SERVER['HTTP_HOST']."/myfeel_api/v1");

        require_once "webservice/Functions.php";

        $data = array(
            "stats" => $this->toJson(),
        );

        $res = CallAPI("POST", BASE_URL."/stats", $data);

        return json_decode($res);
    }
}

//__construct($user_id, $returns, $type, $from, $to, $clients, $enquetes, $devices)

