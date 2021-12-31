<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = Invoice::class;

    public function definition()
    {
        

    	return [
            'invoice_number' => $this->faker->numberBetween(1,7999412438),
            'buyer_nip' => $this->faker->numberBetween(0000000000, 9999999999),
            'seller_nip' => $this->faker->numberBetween(0000000000, 9999999999),
            'product_name' => $this->faker->asciify('***'),
            'net_sum' => $this->faker->numberBetween(1, 9999),
            'date' => $this->faker->date('Y_m_d'),
            'edit_date' => $this->faker->date('Y_m_d'),
        ];

    }

}
