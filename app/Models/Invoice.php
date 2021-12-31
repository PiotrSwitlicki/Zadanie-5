<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';
	protected $fillable = [
        'invoice_number', 
        'buyer_nip', 
        'seller_nip',
        'product_name',
        'net_sum','date',
        'edit_date',
        ];

    use HasFactory;   

}
