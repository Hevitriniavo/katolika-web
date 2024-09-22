<?php

namespace App\Controller;

class CalendarController
{
    public function index(): string
    {
        return views("calendar.view");
    }
}