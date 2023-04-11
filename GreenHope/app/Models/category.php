<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class category extends Model
{
    use HasFactory;
    use Sortable;


    protected $guarded = [];
    public $sortable = ['id', 'label'];



    public function donations()
    {
        return $this->hasMany(donations::class);
    }
    public function needs()
    {
        return $this->hasMany(needs::class);
    }
}
