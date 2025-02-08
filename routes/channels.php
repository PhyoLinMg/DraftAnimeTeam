<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('test', function () {
    return "testing websocket";
});

Broadcast::channel("character.selection",function(){
    return true;
});
