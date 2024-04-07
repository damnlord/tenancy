<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Console\Command;

class SuperAdmin extends TenantCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SuperAdmin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    protected function runnable(): bool
    {
        return true;
    }


    public function runOnTenant(Tenant $tenant): void
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->info('Please provide a valid email for the user you want to make a Super Admin');
            $this->info('eg: php artisan SuperAdmin admin@gmail.com');
        } else {
            $user->assignRole("Super Admin");
        }
    }
}
