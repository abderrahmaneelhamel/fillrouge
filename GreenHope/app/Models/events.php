<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class events extends Model
{
    use HasFactory;
    use Sortable;


    protected $guarded = [];
    public $sortable = ['id','organisation', 'image', 'label', 'description' , 'location', 'amount', 'created_at', 'raised'];


    public function organisations()
    {
        return $this->belongsTo(User::class ,'organisation');
    }
}
