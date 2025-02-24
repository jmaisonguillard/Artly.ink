<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistDashboardController extends Controller
{
    public function index() {
        return view('dashboard.dashboard');
    }

    public function settings() {
        return view('dashboard.settings');
    }

    public function commissionServices() {
        $services = collect([
            (object)[
                'name' => 'Character Illustration',
                'description' => 'Full color character illustration with background',
                'base_price' => 150.00,
                'is_active' => true
            ],
            (object)[
                'name' => 'Portrait Sketch',
                'description' => 'Black and white portrait sketch, headshot only',
                'base_price' => 50.00,
                'is_active' => true
            ],
            (object)[
                'name' => 'Logo Design',
                'description' => 'Custom logo design with 3 revision rounds',
                'base_price' => 200.00,
                'is_active' => false
            ],
            (object)[
                'name' => 'Comic Page',
                'description' => 'Single comic page, up to 6 panels, full color',
                'base_price' => 300.00,
                'is_active' => true
            ]
        ]);

        return view('dashboard.services', compact('services'));
    }
}
