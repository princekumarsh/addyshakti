<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

trait SendMail {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function codorderplacedMail($cart_id, $prod_name, $price2, $delivery_date, $time_slot, $user_email, $user_name)
    {
        $logo = DB::table('tbl_web_setting')
        ->first();
        $app_name = $logo->name;

        $data = array('to' => $user_email, 'from' => 'noreply@gogrocer.in', 'to-name' => $user_name, 'from-name' => $app_name);

        Mail::send('admin.mail.codorderplaced', compact('cart_id', 'prod_name', 'price2', 'delivery_date', 'time_slot'), function ($m) use ($data) {
            $m->from($data['from'], $data['from-name']);
            $m->to($data['to'], $data['to-name'])->subject("Order Successfully Placed");
        });

        return "send";
    }

}