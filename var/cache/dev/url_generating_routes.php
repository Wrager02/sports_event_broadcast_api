<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    'app_event_getevent' => [['id'], ['_controller' => 'App\\Controller\\EventController::getEvent'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/events']], [], []],
    'app_event_getevents' => [[], ['_controller' => 'App\\Controller\\EventController::getEvents'], [], [['text', '/api/events']], [], []],
];
