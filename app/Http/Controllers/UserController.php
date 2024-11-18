<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportUser;
use Excel;

class UserController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
