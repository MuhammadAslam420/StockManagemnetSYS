<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportProduct implements FromCollection , WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'Supplier_id',
            'supplier_name',
            'category_id',
            'purchase_price',
            'badge_number',
            'color',
            'type',
            'quantity',
            'weight',
            'unit',
            'packaging',
            'sale_quantity',
            'total_weight',
            'remaining_quantity',
            'remaining_weight',
            'stock',
            'expiry_date',
            'created_at',
            'updated_at'
        ];
    }
}
