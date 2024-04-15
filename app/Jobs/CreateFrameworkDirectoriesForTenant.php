<?php

namespace App\Jobs;

use Stancl\Tenancy\Contracts\Tenant;

class CreateFrameworkDirectoriesForTenant
{
    protected $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {
        $this->tenant->run(function ($tenant) {
            $storage_path = storage_path();

            if (!file_exists("$storage_path/framework/cache")) {
                mkdir("$storage_path/framework/cache", 0777, true);
            }
        });
    }
}
