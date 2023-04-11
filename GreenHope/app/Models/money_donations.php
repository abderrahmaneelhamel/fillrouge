<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class money_donations extends Model
{
    use HasFactory;
    use Sortable;


    protected $guarded = [];
    public $sortable = ['id','amount', 'donor', 'To', 'created_at', 'updated_at'];

    public function donor_user()
    {
        return $this->belongsTo(User::class ,'donor');
    }

    public function To_user()
    {
        return $this->belongsTo(User::class ,'To');
    }

}
