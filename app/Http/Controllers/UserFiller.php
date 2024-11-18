<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ImportUsers;
use App\Exports\ExportUserToExcel;

class UserFiller extends Controller
{
    public function SeedUsers()
    {
        ImportUsers::dispatch('TestUser');
        return back()->with('success', 'Users are being imported');
    }
}
