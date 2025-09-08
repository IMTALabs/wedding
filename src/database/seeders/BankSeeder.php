<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banks')->truncate();

        $banks = [
            ['name' => 'Ngân hàng TMCP Ngoại thương Việt Nam', 'code' => 'VCB'],
            ['name' => 'Ngân hàng TMCP Kỹ thương Việt Nam', 'code' => 'TCB'],
            ['name' => 'Ngân hàng TMCP Đầu tư và Phát triển Việt Nam', 'code' => 'BIDV'],
            ['name' => 'Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam', 'code' => 'AGRIBANK'],
            ['name' => 'Ngân hàng TMCP Công thương Việt Nam', 'code' => 'VIETINBANK'],
            ['name' => 'Ngân hàng TMCP Quân đội', 'code' => 'MB'],
            ['name' => 'Ngân hàng TMCP Á Châu', 'code' => 'ACB'],
            ['name' => 'Ngân hàng TMCP Sài Gòn Thương Tín', 'code' => 'SACOMBANK'],
            ['name' => 'Ngân hàng TMCP Việt Nam Thịnh Vượng', 'code' => 'VPBANK'],
            ['name' => 'Ngân hàng TMCP Hàng hải Việt Nam', 'code' => 'MSB'],
            ['name' => 'Ngân hàng TMCP Sài Gòn - Hà Nội', 'code' => 'SHB'],
            ['name' => 'Ngân hàng TMCP Tiên Phong', 'code' => 'TPBANK'],
            ['name' => 'Ngân hàng TMCP Quốc tế Việt Nam', 'code' => 'VIB'],
            ['name' => 'Ngân hàng TMCP Xuất Nhập khẩu Việt Nam', 'code' => 'EXIMBANK'],
            ['name' => 'Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh', 'code' => 'HDBANK'],
            ['name' => 'Ngân hàng TMCP Đông Á', 'code' => 'DONGABANK'],
            ['name' => 'Ngân hàng TMCP Kiên Long', 'code' => 'KLB'],
            ['name' => 'Ngân hàng TMCP Nam Á', 'code' => 'NAMABANK'],
            ['name' => 'Ngân hàng TMCP OCB', 'code' => 'OCB'],
            ['name' => 'Ngân hàng TMCP Bản Việt', 'code' => 'VietCapitalBank'],
            ['name' => 'Ngân hàng TMCP Xây dựng Việt Nam', 'code' => 'CB'],
            ['name' => 'Ngân hàng TMCP LienVietPostBank', 'code' => 'LPB'],
            ['name' => 'Ngân hàng TMCP An Bình', 'code' => 'ABBANK'],
            ['name' => 'Ngân hàng TMCP Việt Á', 'code' => 'VAB'],
            ['name' => 'Ngân hàng TMCP Sài Gòn Công Thương', 'code' => 'SCB'],
            ['name' => 'Ngân hàng TNHH MTV Public Bank Việt Nam', 'code' => 'PBB'],
            ['name' => 'Ngân hàng Standard Chartered Việt Nam', 'code' => 'SC'],
            ['name' => 'Ngân hàng HSBC Việt Nam', 'code' => 'HSBC'],
            ['name' => 'Ngân hàng Citibank Việt Nam', 'code' => 'Citi'],
            ['name' => 'Ngân hàng UOB Việt Nam', 'code' => 'UOB'],
            ['name' => 'Ngân hàng Shinhan Việt Nam', 'code' => 'Shinhan'],
            ['name' => 'Ngân hàng Krungsri Việt Nam', 'code' => 'Krungsri'],
            ['name' => 'Ngân hàng Mizuho Việt Nam', 'code' => 'Mizuho'],
            ['name' => 'Ngân hàng Sumitomo Mitsui Việt Nam', 'code' => 'SMBC'],
            ['name' => 'Ngân hàng BNP Paribas Việt Nam', 'code' => 'BNP'],
            ['name' => 'Ngân hàng Deutsche Bank Việt Nam', 'code' => 'Deutsche'],
            ['name' => 'Ngân hàng Bank of China Việt Nam', 'code' => 'BOC'],
            ['name' => 'Ngân hàng J.P. Morgan Việt Nam', 'code' => 'JPMorgan'],
        ];

        DB::table('banks')->insert($banks);
    }
}
