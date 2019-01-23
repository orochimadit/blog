<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
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
        $date=Carbon::create(2019,1,16,9);
        //generate 10 dummy data

        $posts=[];
        
        for($i=1; $i<=10; $i++){
            $image ="Post_Image_".rand(1,5).".jpg";
            $date= $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);
            $posts[]=[
                'author_id'=>rand(1,3),
                'title'     =>$faker->sentence(rand(8,12)),
                'excerp'     =>$faker->text(rand(250,300)),
                'body'      =>$faker->paragraphs(rand(10,15),true),
                'slug'      =>$faker->slug(),
                'image'     =>rand(0,1)==1? $image:null,
                'created_at' =>$createdDate,
                'updated_at' =>$createdDate,
                'published_at'=>$i>5 ? $publishedDate:(rand(0,1)==0 ? NULL : $publishedDate->addDays(4))
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
