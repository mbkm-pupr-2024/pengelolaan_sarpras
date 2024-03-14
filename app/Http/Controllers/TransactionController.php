<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Properties;
use App\Models\Wisma;

class TransactionController extends Controller
{
    public function index()
    {
        $wisma = Wisma::all();
        $wisma = $wisma->map(function ($item) {
            return $item->room;
        });

        // $paviliun = Wisma::where('room', 'LIKE', '%Paviliun%')->get();
        // $paviliun = $paviliun->map(function ($item) {
        //     return $item->room;
        // });

        $aulaKelas = Properties::whereIn('type', ['aula', 'kelas'])->get();
        // $paviliunWisma = Properties::whereIn('type', ['paviliun', 'wisma'])->get();

        return view('admin.transaction', [
            'aulaKelas' => $aulaKelas,
            // 'paviliunWisma' => $paviliunWisma,
            'wisma' => $wisma,
            // 'paviliun' => $paviliun,
        ]);
    }

    public function wisma_store(Request $request)
    {
        // $isFound = Properties::find($request->property_id);
        // if ($isFound === null) {
        //     return redirect()->route('transactions')->with([
        //         'failed' => 'Data tidak ditemukan',
        //         'tab' => 'wisma'
        //     ]);
        // }

        // convert string to array 
        $rooms = explode(',', $request->rooms);

        foreach ($rooms as $room) {
            Wisma::create([
                'name' => ucfirst($request->name),
                'from' => ucfirst($request->asal),
                'room' => $room,
            ]);
        }
        
        return redirect()->route('transactions');
    }

    public function wisma_show_admin() {
        $wisma = Wisma::all();
        return view('admin.index-wisma', [
            'transactions' => $wisma
        ]);
    }

    public function wisma_show()
    {
        // $wisma = Wisma::all();
        // $wisma = $wisma->map(function ($item) {
        //     return $item->name;
        // });
        // dd($wisma);
        // return view('wisma.wisma-rooms', [
        //     'transactions' => $wisma
        // ]);
        $wisma = Wisma::all();
        $wisma = $wisma->map(function ($item) {
            return $item->room;
        });

        return view('admin.transaction-wisma', [
            'wisma' => $wisma,
        ]);
    }

    public function wisma_destroy(Request $request)
    {
        $ids = explode(',', $request->selected);
        Wisma::destroy($ids);
        return redirect()->route('wisma-admin');
    }
}
