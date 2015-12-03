<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
   {
      DB::table('settings')->insert([
			'logo'              => '',
			'name'              => 'Nguyên Hà Tech',
			'address'           => '15/03 Ngọc Hồi, Q. Hoàng Mai, TP. Hà Nội',
			'email_1'           => 'pureriver14@gmail.com',
			'email_2'           => '',
			'email_3'           => '',
			'phone_1'           => '0934577886',
			'phone_2'           => '',
			'phone_3'           => '',
			'skype_1'           => 'ttmanh.ifi',
			'skype_2'           => '',
			'skype_3'           => '',
			'yahoo_1'           => '',
			'yahoo_2'           => '',
			'yahoo_3'           => '',
			'short_description' => 'Chuyên tư vấn, thiết kế và xây dựng Website chuyên nghiệp',
			'description'       => '',
			'contact'           => '',
			'meta_title'        => 'Chuyên tư vấn, thiết kế và xây dựng Website chuyên nghiệp :: NHT',
			'meta_keyword'      => 'tu van, thiet ke, xay dung webstie',
			'meta_description'  => 'Chuyên tư vấn, thiết kế và xây dựng Website chuyên nghiệp',
			'js_codes'          => '',
			'facebook'          => '',
			'googleplus'        => '',
			'twitter'           => '',
			'linkin'            => '',
			'youtube'           => '',
		]);
   }
}
