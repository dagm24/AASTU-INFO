<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class UnauthorizedController extends Controller {

    public function index(): void {
        $this->views("Status.401", []);
    }
}