<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MegaBytes implements Rule
{
    protected $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function passes($attribute, $value)
    {
        $megaBytes = $value->getSize() / 1024 / 1024;

        return $megaBytes <= $this->param;
    }

    public function message()
    {
        return trans('validation.max.file_mb', ['max_mb' => $this->param]);
    }
}
