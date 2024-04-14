<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            ['name' => 'Bitterballen', 'price' => 5.50, 'category_id' => 1, 'description' => 'Een heerlijke Nederlandse snackm. Wordt geserveerd met mosterd.'],
            ['name' => 'Brood plank', 'price' => 6.50, 'category_id' => 1, 'description' => 'Een assortiment van vers brood geserveerd met verschillende dips en spreads, perfect als voorgerecht.'],
            ['name' => 'Pizza margherita', 'price' => 8.50, 'category_id' => 2, 'description' => 'Een klassieke Italiaanse pizza met tomatensaus, mozzarella en verse basilicum.'],
            ['name' => 'Steak', 'price' => 12.50, 'category_id' => 2, 'description' => 'Een sappige biefstuk gegrild tot in de perfectie, geserveerd met aardappelen en groenten.'],
            ['name' => 'Spareribs', 'price' => 12.50, 'category_id' => 2, 'description' => 'Gemarineerde varkensribbetjes gegrild tot ze lekker mals zijn, met een smaakvolle barbecuesaus.'],
            ['name' => 'Appeltaart', 'price' => 4.50, 'category_id' => 3, 'description' => 'Een traditioneel Nederlands dessert gemaakt van verse appels, kaneel en een knapperige korst. Heerlijk met een bolletje vanille-ijs.'],
            ['name' => 'Tiramisu', 'price' => 5.50, 'category_id' => 3, 'description' => 'Een klassiek Italiaans dessert met lagen mascarponecrème, espresso gedrenkte lange vingers en cacaopoeder.'],
            ['name' => 'Dame blanche', 'price' => 6.50, 'category_id' => 3, 'description' => 'Een eenvoudig maar heerlijk dessert bestaande uit vanille-ijs overgoten met warme chocoladesaus en gegarneerd met slagroom.'],
            ['name' => 'Cola', 'price' => 2.50, 'category_id' => 4, 'description' => 'Een verfrissend koolzuurhoudend frisdrank met een kenmerkende cola-smaak.'],
            ['name' => 'Fanta', 'price' => 2.50, 'category_id' => 4, 'description' => 'Een fruitige en verfrissende frisdrank met een hint van sinaasappelaroma.'],
            ['name' => 'Sprite', 'price' => 2.50, 'category_id' => 4, 'description' => 'Een sprankelende citroen-limoen frisdrank die verfrissend en dorstlessend is.'],
            ['name' => 'Water', 'price' => 1.50, 'category_id' => 4, 'description' => 'Helder en puur drinkwater, perfect om je dorst te lessen.'],
        ];

        foreach ($dishes as $dishData) {
            Dish::create($dishData);
        }
    }
}
