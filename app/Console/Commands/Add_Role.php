<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class Add_Role extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:add {role_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this Command will add new role in roles table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $role = new Role();
        $role->type=$this->argument('role_name');
        $role->save();
    }
}
