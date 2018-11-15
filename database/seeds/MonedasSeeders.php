<?php

use Illuminate\Database\Seeder;
use App\Moneda;

class MonedasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = new Moneda();
        $monedas->tipo_moneda= 'Pesos(ARS) $';
        $monedas->save();
    
        $monedas = new Moneda();
        $monedas->tipo_moneda= 'Dolar(EEUUU) U$S';
        $monedas->save();
    
        $monedas = new Moneda();
        $monedas->tipo_moneda= 'Euro(EUR) € ';
        $monedas->save();

    }
}
