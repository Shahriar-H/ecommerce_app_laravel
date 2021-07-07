<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name'=>'Mobile',
            'price'=>'200',
            'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod aliquid consequuntur explicabo corrupti doloremque, minima voluptate dolor sit iusto?',
            'category'=>'Mobile',
            'gallery'=>'https://www.animaker.com/hub/wp-content/uploads/2019/06/picmaker-youtube-banner-preview-popup.png',
            'color'=>'Red',
            'size'=>'32 Inch',
            'stock'=>'21',
            ],
            [
                'name'=>'Iphone',
                'price'=>'122200',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod aliquid consequuntur explicabo corrupti doloremque, minima voluptate dolor sit iusto?',
                'category'=>'Mobile',
                'gallery'=>'https://cdn.fastly.picmonkey.com/contentful/h6goo9gw1hh6/6ZNFMkew3Y2krAXIT8KO46/45bc5f6ccf551ef5b42577db9133ca54/01-youtube-banner.jpg?w=800&q=70',
                'color'=>'Blue',
                'size'=>'32 Inch',
                'stock'=>'21',
            ],
            [
                'name'=>'Television',
                'price'=>'20000',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod aliquid consequuntur explicabo corrupti doloremque, minima voluptate dolor sit iusto?',
                'category'=>'Television',
                'gallery'=>'https://images-eu.ssl-images-amazon.com/images/G/31/img17/TV/Samsung/QLED/New/QLED_PC_topbanner.jpg',
                'color'=>'White',
                'size'=>'32 Inch',
                'stock'=>'21',
            ],
            [
                'name'=>'Mobile',
                'price'=>'200',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod aliquid consequuntur explicabo corrupti doloremque, minima voluptate dolor sit iusto?',
                'category'=>'Mobile',
                'gallery'=>'http://www.persgroepadvertising.nl/showcase/assets/images/big_richmedia-Samsung-QLED-TV-Canvas-AD-Mobile-AD-Halfpage-Layer-Mobile-banner-Mobile-half-page-AD.PNG',
                'color'=>'blue Black',
                'size'=>'32 Inch',
                'stock'=>'21',
            ],
            [
                'name'=>'Clock',
                'price'=>'200',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod aliquid consequuntur explicabo corrupti doloremque, minima voluptate dolor sit iusto?',
                'category'=>'Mobile',
                'gallery'=>'https://www.indiater.com/wp-content/uploads/2018/10/free-vlogger-youtube-channel-banner-psd-template.jpg',
                'color'=>'Blacked',
                'size'=>'32 Inch',
                'stock'=>'21',
            ],
            [
                'name'=>'Home',
                'price'=>'200',
                'description'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quod aliquid consequuntur explicabo corrupti doloremque, minima voluptate dolor sit iusto?',
                'category'=>'Mobile',
                'gallery'=>'https://www.wikihow.com/images/thumb/4/43/Make-YouTube-Banners-Step-18.jpg/aid6109156-v4-1200px-Make-YouTube-Banners-Step-18.jpg',
                'color'=>'Blackish',
                'size'=>'32 Inch',
                'stock'=>'21',
            ]
    
        ]);
    }
}
