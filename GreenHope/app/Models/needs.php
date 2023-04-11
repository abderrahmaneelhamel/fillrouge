<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class needs extends Model
{
    use HasFactory;
    use Sortable;
    protected $guarded = [];
    public $sortable = ['id','label', 'category', 'inneed', 'created_at', 'updated_at'];



    public function inneed_user()
    {
        return $this->belongsTo(User::class ,'inneed');
    }

    public function categories()
    {
        return $this->belongsTo(category::class ,'category');
    }
}
