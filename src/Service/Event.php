<?php

namespace App\Service;

class Event{

    static function Pusher(Array $message,$channel,$event){
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            '576aec32d50bd84ba5f3',
            'db4ff4d3ae788a7c7ce2',
            '989814',
            $options
        );
        $keys = array_keys($message);

        foreach ($keys as $value) {
            $keyMessage = $value;
            $data[$keyMessage] = $message[$keyMessage];
        }

        $pusher->trigger($channel, $event, $data);
    }
}
