<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transactionheader';
    protected $fillable = [
        'product_id',
        'quantity',
        'user_id'
    ];

    public function transactiondetail(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
