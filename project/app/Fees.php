<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $table = 'fees_book';

    protected $guarded = ['id'];
}
