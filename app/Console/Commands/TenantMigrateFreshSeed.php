<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantMigrateFreshSeed extends TenantCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:migrate-fresh-seed';

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
        $this->info('Migrating: ' . $tenant->id);
        Artisan::call('tenant:run', [
            'commandname' => 'tenant:migrate-fresh', // String
            '--tenant' => [$tenant->id], // Array
        ]);
        $this->info('Migration done.');
//
//        $this->info('Seeding: ' . $tenant->id);
//        Artisan::call('tenant:run', [
//            'commandname' => 'tenant:seed', // String
//            '--tenant' => [$tenant->id], // Array
//        ]);
//        $this->info('Seeding done.');
    }
}
