<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categorias = [
            'H87' => 'Pieza',
            'E48' => 'Unidad de servicio',
            'EA' => 'Elemento',
            'KGM' => 'Kilogramo',
            'MTR' => 'Metro',
            'ACT' => 'Actividad',
            'E51' => 'Trabajo',
            'A9' => 'Tarifa',
            'KT' => 'Kit',
            'LTR' => 'Litro',
            'XBX' => 'Caja',
            'HUR' => 'Hora',
            '11' => 'Equipos',
            'SET' => 'Conjunto',
            'AB' => 'Paquete a granel',
            'E54' => 'Viaje',
            'DAY' => 'Día',
            'DPC' => 'Docenas de piezas'
        ];

        $claveSat = array_rand($categorias);

        return [
            'nombre' => $categorias[$claveSat],
            'claveSat' => $claveSat,
        ];
    }
}
