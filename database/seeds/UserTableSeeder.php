
<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('users')->delete();

        $first_user = new User();
        $first_user->name = 'Gabrielle Francis';
        $first_user->email = 'gabriellefrancis@gmail.com';
        $first_user->password = Hash::make('gabrielle1234');
        $first_user->save();

        $second_user = new User();
        $second_user->name = 'Jovani Tate';
        $second_user->email = 'jovanitate@gmail.com';
        $second_user->password = Hash::make('jovani1234');
        $second_user->save();

        $third_user = new User();
        $third_user->name = 'Miya Banks';
        $third_user->email = 'miyabanks@gmail.com';
        $third_user->password = Hash::make('miya1234');
        $third_user->save();

    }
}
