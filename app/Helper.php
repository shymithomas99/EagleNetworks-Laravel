<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Helper
{



    // public function menu()
    // {
    //     // $menus = Navigation::where('status', 1)
    //     //     ->get();
    //     $menus = Navigation::where('status', 1)
    //         ->orderBy('sort_order', 'asc')
    //         ->get();

    //     return $menus;
    // }

    // public function getSeo($menu)
    // {
    //     $getSeo = seo::select('data')->where('menu', $menu)->first();
    //     // dd($getSeo);
    //     return $getSeo ? json_decode($getSeo->data) : (object) ['metaTitle' => '', 'metaKey' => '', 'metaDesc' => ''];
    // }

    // public function contactUs()
    // {
    //     $contactUs = contactus::first();
    //     return $contactUs;
    // }

    // public function getOrCreateSessionId()
    // {
    //     if (!session()->has('news_session_id')) {
    //         $sessionId = bin2hex(random_bytes(16)); // 32 char unique ID
    //         session(['news_session_id' => $sessionId]);
    //     } else {
    //         $sessionId = session('news_session_id');
    //     }
    //     return $sessionId;
    // }


    // use Illuminate\Support\Facades\Storage;


    public static function uploadToS3($file, $folder = 'uploads')
    {
        if (!$file) return null;

        // better method (handles file naming properly)
        $path = Storage::disk('s3')->putFile($folder, $file);

        return [
            'url' => Storage::disk('s3')->url($path),
            'key' => $path
        ];
    }

    public static function deleteFromS3($key)
    {
        if ($key) {
            Storage::disk('s3')->delete($key);
        }
    }
}