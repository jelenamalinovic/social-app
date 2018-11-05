<?php

use App\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('comments')->delete();

        $first_comment = new Comment();
        $first_comment->user_id = 1;
        $first_comment->post_id = 1;
        $first_comment->text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque molestie lacus a lorem semper, eu rutrum quam scelerisque. Maecenas vel augue convallis, accumsan nulla at, efficitur quam. Ut sed ante eu nibh consectetur pharetra.";
        $first_comment->save();

        $second_comment = new Comment();
        $second_comment->user_id = 2;
        $second_comment->post_id = 1;
        $second_comment->text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque molestie lacus a lorem semper, eu rutrum quam scelerisque. Maecenas vel augue convallis, accumsan nulla at, efficitur quam. Ut sed ante eu nibh consectetur pharetra.";
        $second_comment->save();

        $third_comment = new Comment();
        $third_comment->user_id = 3;
        $third_comment->post_id = 3;
        $third_comment->text = "Donec nulla sapien, facilisis id fringilla sit amet, efficitur ut lacus. Morbi placerat nunc non lacus semper, sed pretium nunc ullamcorper. Sed efficitur tristique mauris, sed commodo enim imperdiet eu.";
        $third_comment->save();

        $fourth_comment = new Comment();
        $fourth_comment->user_id = 1;
        $fourth_comment->post_id = 3;
        $fourth_comment->text = "Nam venenatis pellentesque odio ut tempus. Aenean nulla sapien, finibus sit amet lacus at, consequat auctor mi.";
        $fourth_comment->save();

        $fifth_comment = new Comment();
        $fifth_comment->user_id = 2;
        $fifth_comment->post_id = 2;
        $fifth_comment->text = "Aliquam volutpat erat felis, eget dignissim nisl iaculis et. Cras eget odio vitae tortor mattis bibendum. Pellentesque viverra eu nibh non pulvinar. Maecenas pharetra est eros, sit amet sagittis nisl rutrum ut. Vivamus faucibus sodales ex sit amet viverra. Phasellus non pulvinar elit. ";
        $fifth_comment->save();

        $sixth_comment = new Comment();
        $sixth_comment->user_id = 3;
        $sixth_comment->post_id = 2;
        $sixth_comment->text = "Duis sit amet erat vestibulum, lobortis lectus lacinia, gravida elit. In at orci tellus.";
        $sixth_comment->save();

        $seventh_comment = new Comment();
        $seventh_comment->user_id = 3;
        $seventh_comment->post_id = 1;
        $seventh_comment->text = "Quisque lacinia molestie dui vitae accumsan.";
        $seventh_comment->save();
    }
}
