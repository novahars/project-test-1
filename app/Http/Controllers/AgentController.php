<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class AgentController
{


    public function index()
    {
        return view('agent.dashboard');
    }
  

}