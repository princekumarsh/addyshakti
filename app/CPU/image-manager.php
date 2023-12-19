<?php

namespace App\CPU;

use Carbon\Carbon;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageManager
{
    public static function upload(string $dir, string $format, $image = null)
    {   //dd($dir);
        if ($image != null) {
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
            if (!Storage::disk('public')->exists($dir)) {
                dd($dir);
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($image));
        } else {
            $imageName = 'def.png';
        }

        return $imageName;
    }

    public static function update(string $dir, $old_image, string $format, $image = null)
    {
        if (Storage::disk('public')->exists($dir . $old_image)) {
            Storage::disk('public')->delete($dir . $old_image);
        }
        $imageName = ImageManager::upload($dir, $format, $image);
        return $imageName;
    }

    public static function delete($full_path)
    {
        if (Storage::disk('public')->exists($full_path)) {
            Storage::disk('public')->delete($full_path);
        }

        return [
            'success' => 1,
            'message' => 'Removed successfully !'
        ];

    }

    public static function otpMail($code,  $user_email)
    {

        $data = array('to' => $user_email, 'from' => 'Addy02marketing02@gmail.com',  'from-name' => 'Addy');

      $mail=  Mail::send('mail.opt_send', compact('code'), function ($m) use ($data) {
            $m->from($data['from'], $data['from-name']);
            $m->to($data['to'], 'ajit')->subject("Opt send successfully");
        });
        //dd($mail);
        return "send";
    }
}