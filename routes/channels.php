<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('test', function () {
    return "testing websocket";
});
