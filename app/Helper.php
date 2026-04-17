<?php

namespace App;

use Illuminate\Support\Facades\Auth;

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



}