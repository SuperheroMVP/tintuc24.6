<?php

use Illuminate\Database\Seeder;

class Customer_Search_Ajax extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
        	[
                'CustomerName'=>'Đỗ Văn Hùng',
                'Address'=>'Thái Bình',
                'City'=>'Thái Nguyên',
                'PostalCode'=>'143000',
                'Country'=>'Việt Nam'
        	],
          	[
                'CustomerName'=>'Nguyễn Ngọc Huyện',
                'Address'=>'Tuyên Quang',
                'City'=>'Thái Nguyên',
                'PostalCode'=>'123050',
                'Country'=>'Việt Nam'
        	],
        	[
                'CustomerName'=>'Nguyễn Sái Khánh Hòa',
                'Address'=>'Lào Cai',
                'City'=>'Thái Nguyên',
                'PostalCode'=>'123300',
                'Country'=>'Việt Nam'
        	],
        	[
                'CustomerName'=>'Phan Văn Quang',
                'Address'=>'Nghệ An',
                'City'=>'Thái Nguyên',
                'PostalCode'=>'123000',
                'Country'=>'Việt Nam'
        	],
        	[
                'CustomerName'=>'Nguyễn Thị Hạnh',
                'Address'=>'Tuyên Quang',
                'City'=>'Thái Nguyên',
                'PostalCode'=>'143050',
                'Country'=>'Việt Nam'
        	]
        ];
        DB::table('customer_search_ajax')->insert($data);
    }
}
