<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
     /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::latest()->where('user', Auth::id())->paginate(5);
    
        return view('logs.index',compact('logs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
