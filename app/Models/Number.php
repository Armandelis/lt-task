<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use NumberToWords\NumberToWords;

class Number extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'number_stack';

    public function translate(){
        return (new NumberToWords())
            ->getNumberTransformer('en')
            ->toWords($this->number);
    }
}
