<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
            ['name' => 'PHP', 'logo' => 'https://www.php.net/images/logos/php-logo.svg'],
            ['name' => 'Laravel', 'logo' => 'https://laravel.com/img/logomark.min.svg'],
            ['name' => 'Codeigniter', 'logo' => 'https://cdn.worldvectorlogo.com/logos/codeigniter.svg'],
            ['name' => 'Wordpress', 'logo' => 'https://cdn.worldvectorlogo.com/logos/wordpress-blue.svg'],
            ['name' => 'React', 'logo' => 'https://cdn.worldvectorlogo.com/logos/react-2.svg'],
            ['name' => 'Vue', 'logo' => 'https://cdn.worldvectorlogo.com/logos/vue-js-1.svg'],
            ['name' => 'Svelte', 'logo' => 'https://cdn.worldvectorlogo.com/logos/svelte-1.svg'],
        ]);
    }
}
