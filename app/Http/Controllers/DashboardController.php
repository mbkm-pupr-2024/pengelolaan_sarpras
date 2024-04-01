<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Wisma;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Transaction::where('start', '>=', now(-10))
            ->where('end', '<=', now()->addDays(30))
            ->orderBy('start', 'asc')
            ->get();

        $paviliunTotal = 14;
        $paviliun = Wisma::where('room', 'like', '%pav%')->count();
        $paviliunAvailable = $paviliunTotal - $paviliun;

        $wismaTotal = 90;
        $wisma = Wisma::where('room', 'not like', '%pav%')->count();
        $wismaAvailable = $wismaTotal - $wisma;

        return view('welcome', [
            'events' => $events,
            'paviliun' => $paviliun,
            'paviliunAvailable' => $paviliunAvailable,
            'wisma' => $wisma,
            'wismaAvailable' => $wismaAvailable,
        ]);
    }
}
