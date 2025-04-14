<?php

declare(strict_types=1);

namespace protected\controllers;

use Views\View;

class HomeController
{
    public function home(): void
    {
        echo View::make("home")->render();
    }
}