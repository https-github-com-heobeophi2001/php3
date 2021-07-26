<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'invoices_detail';
    protected $primaryKey ='id';

    protected $fillable = [
        'invoice_id',
        'product_id',
        'unit_price',
        'quantity',
    ];
    public function invoice(){
        return $this->beLongTo(Invoice::class, 'invoice_id', 'id');
    }
}
