<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class register_Admin_Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:register {name=admin} {mail=superadmin@admin} {password=password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        
        $name = $this->ask("enter your name ");

        $mail = $this->ask("enter your email ");

        $password = $this->secret("enter your password ");

        $role_id = Role::where('type' , 'admin')->first()->id;


        $user = User::create([
            'name' => $name,
            'email' => $mail,
            'password' => Hash::make($password),
            'role_id' => $role_id,
        ]); 
        $user->markEmailAsVerified();

        $this->info("the admin account has been registered succesfully");

    }
}
