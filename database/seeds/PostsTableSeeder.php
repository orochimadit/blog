<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Http\Controllers\Date;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('posts')->truncate();
        $faker=Factory::create();
        //generate 10 dummy data

        $posts=[];
        
        for($i=1; $i<=10; $i++){
            $image ="Post_Image_".rand(1,5).".jpg";
            $date= date("Y-m-d H:i:s",strtotime("2019-01-23 08:00:00 +{$i} days"));
            $posts[]=[
                'author_id'=>rand(1,3),
                'title'     =>$faker->sentence(rand(8,12)),
                'excerp'     =>$faker->text(rand(250,300)),
                'body'      =>$faker->paragraphs(rand(10,15),true),
                'slug'      =>$faker->slug(),
                'image'     =>rand(0,1)==1? $image:null,
                'created_at' =>$date,
                'updated_at' =>$date,
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
