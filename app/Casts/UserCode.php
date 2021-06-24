<?php


namespace App\Casts;


use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class UserCode implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        return 'CT-'.$value.'ABC';
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return Str::of($value)
            ->after('CT-')
            ->before('ABC');
    }
}
