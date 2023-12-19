<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        return view('admin.account.list');
    }

    public function incompletePaymentDetails()
    {
        return view('admin.account.incomplete_payment');
    }
}
