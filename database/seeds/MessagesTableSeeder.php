<?php

use App\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('messages')->delete();

        $first_user = new Message();
        $first_user->user_id = 1;
        $first_user->message = 'Hola!';
        $first_user->save();

        $second_user = new Message();
        $second_user->user_id = 2;
        $second_user->message = 'Guten Tag!';
        $second_user->save();

        $third_user = new Message();
        $third_user->user_id = 3;
        $third_user->message = 'Namaste!';
        $third_user->save();
    }
}
