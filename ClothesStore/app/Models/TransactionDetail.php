<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = "transactiondetails";
    protected $guarded = ['id'];

    public function clothes(){

    	return $this->belongsTo(Clothes::class);
    }

    public function transaction(){

    	return $this->belongsTo(Transaction::class);
    }
}
