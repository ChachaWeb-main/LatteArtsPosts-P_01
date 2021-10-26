<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MegaBytes;
use App\Latte; //Latte Modelが使えるようになる

class StoreLatteRequest extends FormRequest
{
    public function rules()
    {
        return array_merge(Latte::$rules, ['image' => ['required', new MegaBytes(2)]]);
    }
}
