<?php

use App\Controller\ActivityController;
use App\Controller\CalendarController;
use App\Controller\CommitteeController;
use App\Controller\DistributionController;
use App\Controller\HolyController;
use App\Controller\HomeController;
use App\Controller\MarkingController;
use App\Controller\OperationController;
use App\Controller\RegionController;
use App\Controller\ResponsibilityController;
use App\Controller\ResultController;
use App\Controller\SacramentController;
use App\Controller\SituationController;
use App\Controller\TicketController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;

return [
    ['path' => "/", "method" => "GET", "controller" => [HomeController::class, "index"], "middleware" => [AuthMiddleware::class]],

    ['path' => "/responsibilities", "method" => "GET", "controller" => [ResponsibilityController::class, "index"]],
    ['path' => "/responsibilities/create", "method" => "POST", "controller" => [ResponsibilityController::class, "create"]],
    ['path' => "/responsibilities/update", "method" => "POST", "controller" => [ResponsibilityController::class, "update"]],
    ['path' => "/responsibilities/delete", "method" => "POST", "controller" => [ResponsibilityController::class, "delete"]],

    ['path' => "/regions", "method" => "GET", "controller" => [RegionController::class, "index"]],
    ['path' => "/regions/create", "method" => "POST", "controller" => [RegionController::class, "create"]],
    ['path' => "/regions/update", "method" => "POST", "controller" => [RegionController::class, "update"]],
    ['path' => "/regions/delete", "method" => "POST", "controller" => [RegionController::class, "delete"]],

    ['path' => "/holies", "method" => "GET", "controller" => [HolyController::class, "index"]],
    ['path' => "/holies/create", "method" => "POST", "controller" => [HolyController::class, "create"]],
    ['path' => "/holies/update", "method" => "POST", "controller" => [HolyController::class, "update"]],
    ['path' => "/holies/delete", "method" => "POST", "controller" => [HolyController::class, "delete"]],

    ['path' => "/committees", "method" => "GET", "controller" => [CommitteeController::class, "index"]],
    ['path' => "/committees/create", "method" => "POST", "controller" => [CommitteeController::class, "create"]],
    ['path' => "/committees/update", "method" => "POST", "controller" => [CommitteeController::class, "update"]],
    ['path' => "/committees/delete", "method" => "POST", "controller" => [CommitteeController::class, "delete"]],

    ['path' => "/sacraments", "method" => "GET", "controller" => [SacramentController::class, "index"]],
    ['path' => "/sacraments/create", "method" => "POST", "controller" => [SacramentController::class, "create"]],
    ['path' => "/sacraments/update", "method" => "POST", "controller" => [SacramentController::class, "update"]],
    ['path' => "/sacraments/delete", "method" => "POST", "controller" => [SacramentController::class, "delete"]],

    ['path' => "/activities", "method" => "GET", "controller" => [ActivityController::class, "index"]],
    ['path' => "/activities/create", "method" => "POST", "controller" => [ActivityController::class, "create"]],
    ['path' => "/activities/update", "method" => "POST", "controller" => [ActivityController::class, "update"]],
    ['path' => "/activities/delete", "method" => "POST", "controller" => [ActivityController::class, "delete"]],

    ['path' => "/users", "method" => "GET", "controller" => [UserController::class, "index"]],
    ['path' => "/users/create", "method" => "POST", "controller" => [UserController::class, "create"]],
    ['path' => "/users/create", "method" => "GET", "controller" => [UserController::class, "showCreateForm"]],
    ['path' => "/users/update", "method" => "POST", "controller" => [UserController::class, "update"]],
    ['path' => "/users/update", "method" => "GET", "controller" => [UserController::class, "showEditForm"]],
    ['path' => "/users/delete", "method" => "POST", "controller" => [UserController::class, "delete"]],

    ['path' => "/operations", "method" => "GET", "controller" => [OperationController::class, "index"]],
    ['path' => "/operations/create", "method" => "POST", "controller" => [OperationController::class, "createOperation"]],
    ['path' => "/operations/update", "method" => "POST", "controller" => [OperationController::class, "updateOperation"]],
    ['path' => "/operations/delete", "method" => "POST", "controller" => [OperationController::class, "deleteOperation"]],

    ['path' => "/tickets", "method" => "GET", "controller" => [TicketController::class, "index"]],
    ['path' => "/tickets/create", "method" => "POST", "controller" => [TicketController::class, "createTicket"]],
    ['path' => "/tickets/update", "method" => "POST", "controller" => [TicketController::class, "updateTicket"]],
    ['path' => "/tickets/delete", "method" => "POST", "controller" => [TicketController::class, "deleteTicket"]],

    ['path' => "/marking", "method" => "GET", "controller" => [MarkingController::class, "index"]],
    ['path' => "/situations", "method" => "GET", "controller" => [SituationController::class, "index"]],
    ['path' => "/distributions", "method" => "GET", "controller" => [DistributionController::class, "index"]],
    ['path' => "/results", "method" => "GET", "controller" => [ResultController::class, "index"]],

    ['path' => "/calendars", "method" => "GET", "controller" => [CalendarController::class, "index"]],

];