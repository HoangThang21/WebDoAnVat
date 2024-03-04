<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function langen_vi()
    {
        $lang = new GoogleTranslate('en');

        return [
            'helo' => $lang->setSource('en')->setTarget('vi')->translate('hello'),
            'helo2' => $lang->setSource('en')->setTarget('vi')->translate('hello 2'),



        ];
    }
    public function langvi_en()
    {
        $lang = new GoogleTranslate('vi');

        return [
            $lang->setSource('vi')->setTarget('en')->translate("Chào thế giới")
        ];
    }
}
