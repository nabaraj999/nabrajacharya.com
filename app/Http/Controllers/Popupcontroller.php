<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;

class Popupcontroller extends Controller
{
    // app/Http/Controllers/PopupController.php
public function getActivePopup()
{
    $popup = Popup::active()->first();

    if (!$popup) {
        return response()->json(null);
    }

    return response()->json([
        'id'          => $popup->id,
        'title'       => $popup->title,
        'image'       => asset('storage/' . $popup->image_path),
        'url'         => $popup->url,
        'button_text' => $popup->button_text,
    ]);
}
}
