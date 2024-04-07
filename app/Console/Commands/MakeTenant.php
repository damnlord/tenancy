<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class MakeTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tenant {id} {domain}';

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
        $tenant = Tenant::create([
            'id' => $this->argument('id'),
            'tenancy_db_username' => $this->argument('id'),
            'tenancy_db_password' => $this->password(20),
        ]);
        $tenant->domains()->create([
            'domain' => $this->argument('domain')
        ]);

    }
    public function password($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
