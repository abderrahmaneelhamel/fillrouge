<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class donations extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = [];
    public $sortable = ['id','label', 'image', 'category', 'description', 'donor', 'To', 'updated_at'];


    public function donor_user()
    {
        return $this->belongsTo(User::class ,'donor');
    }

    public function To_user()
    {
        return $this->belongsTo(User::class ,'To');
    }

    public function categories()
    {
        return $this->belongsTo(category::class ,'category');
    }
}
