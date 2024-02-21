<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Adidas Superstar',
                'description' => 'Кроссовки Adidas Superstar - это икона стиля и удобства. Их знаменитый дизайн с тремя полосками и резиновым носком делает их незабываемыми. Adidas Superstar обладают прочной конструкцией и высоким качеством материалов, что обеспечивает долговечность и комфорт при носке. Эти кроссовки идеально подходят как для повседневного использования, так и для создания стильных спортивных образов. Будьте в центре внимания с кроссовками Adidas Superstar.',
                'price' => 115,
                'size' => 42,
                'color' => 'green',
                'stock_quantity' => 1300,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 1
            ],
            [
                'name' => 'New Balance 990',
                'description' => 'Кроссовки New Balance 990 - это символ качества и надежности. Их прочная конструкция и удобство делают их отличным выбором для активного образа жизни. Эти кроссовки подходят для различных видов спорта и повседневной носки.',
                'price' => 2500,
                'size' => 41,
                'color' => 'grey',
                'stock_quantity' => 900,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 5
            ],
            [
                'name' => 'Reebok Classic Leather',
                'description' => 'Кроссовки Reebok Classic Leather - это воплощение комфорта и стиля. Их классический дизайн и прочные материалы делают их популярным выбором для повседневной носки. Эти кроссовки подходят для различных активностей и создания ультрамодных образов.',
                'price' => 75,
                'size' => 40,
                'color' => 'brown',
                'stock_quantity' => 950,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 4
            ],
            [
                'name' => 'Puma Cali',
                'description' => 'Кроссовки Puma Cali - это смесь стиля и элегантности. Их женственный дизайн и удобство делают их отличным выбором для модных образов. Эти кроссовки подходят для различных событий и повседневного использования.',
                'price' => 2100,
                'size' => 37,
                'color' => 'pink',
                'stock_quantity' => 1000,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 3
            ],
            [
                'name' => 'Nike React Element 55',
                'description' => 'Кроссовки Nike React Element 55 - это инновационное сочетание стиля и комфорта. Их уникальный дизайн и передовые технологии обеспечивают высокую амортизацию и поддержку. Эти кроссовки подходят как для спортивных занятий, так и для повседневной носки.',
                'price' => 70,
                'size' => 44,
                'color' => 'grey',
                'stock_quantity' => 850,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 2
            ],
            [
                'name' => 'Adidas Stan Smith',
                'description' => 'Кроссовки Adidas Stan Smith - это воплощение минимализма и стиля. Их простой и чистый дизайн делает их популярным выбором для ценителей классики. Эти кроссовки идеально подходят для создания элегантных образов в любое время года.',
                'price' => 190,
                'size' => 43,
                'color' => 'white',
                'stock_quantity' => 1200,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 1
            ],
            [
                'name' => 'New Balance 997',
                'description' => 'Кроссовки New Balance 997 - это смесь стиля и функциональности. Их современный дизайн и передовые технологии обеспечивают комфорт и поддержку в течение всего дня. Эти кроссовки подходят для активных прогулок по городу и занятий спортом.',
                'price' => 105,
                'size' => 38,
                'color' => 'blue',
                'stock_quantity' => 950,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 5
            ],
            [
                'name' => 'Reebok Club C',
                'description' => 'Классические кеды Reebok Club C - это воплощение стиля и элегантности. Их простой, но элегантный дизайн делает их универсальным выбором для повседневного использования. Эти кеды идеально подходят для создания стильных образов в любое время года.',
                'price' => 75,
                'size' => 39,
                'color' => 'black',
                'stock_quantity' => 800,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 4
            ],
            [
                'name' => 'Puma RS-X',
                'description' => 'Модные кроссовки Puma RS-X - это смесь стиля и комфорта. Их оригинальный дизайн и передовые технологии делают их идеальным выбором для тех, кто ценит индивидуальность. Эти кроссовки подходят как для активного образа жизни, так и для повседневной носки.',
                'price' => 200,
                'size' => 41,
                'color' => 'grey',
                'stock_quantity' => 1100,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 3
            ],
            [
                'name' => 'Nike Air Force 1',
                'description' => 'Культовые кроссовки Nike Air Force 1 - это символ стиля и современности. Их классический дизайн и высокое качество материалов делают их популярным выбором среди модных ценителей. Эти кроссовки подходят для повседневного ношения и создания ультрамодных образов.',
                'price' => 140,
                'size' => 40,
                'color' => 'white',
                'stock_quantity' => 900,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 2
            ],
            [
                'name' => 'Adidas Superstar',
                'description' => 'Кроссовки Adidas Superstar - это икона стиля и удобства. Их знаменитый дизайн с тремя полосками и резиновым носком делает их незабываемыми. Adidas Superstar обладают прочной конструкцией и высоким качеством материалов, что обеспечивает долговечность и комфорт при носке. Эти кроссовки идеально подходят как для повседневного использования, так и для создания стильных спортивных образов. Будьте в центре внимания с кроссовками Adidas Superstar.',
                'price' => 120,
                'size' => 42,
                'color' => 'green',
                'stock_quantity' => 1300,
                'image' => 'https://i1.adis.ws/t/jpl/jd_product_list?plu=jd_499289_a&resmode=sharp',
                'category_id' => 1
            ]
            
            
            
            
            
            
            
            
            
            
    
        ]);
    }
}
