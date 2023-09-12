<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class headerTemp extends Model
{
    use HasFactory;
    protected $table = 'headertemps';
    public function transactiondetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
