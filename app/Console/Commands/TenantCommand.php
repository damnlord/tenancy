<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Throwable;

abstract class TenantCommand extends Command
{
    public function __construct()
    {
        parent::__construct();

        $this->specifyParameters();
    }

    protected function getOptions(): array
    {
        return array_merge([
            ['tenant', null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'Specify tenant', null],
            ['debug', null, InputOption::VALUE_OPTIONAL, 'Run in debug', null],
            ['runnable', null, InputOption::VALUE_NONE, 'Skip runnable() if applied', null],
        ], parent::getOptions());
    }

    protected function runnable(): bool
    {
        return true;
    }

    public function handle(): void
    {
        Tenant::when($this->option('tenant'), function ($query) {
                $query->whereIn('id', $this->option('tenant'));
            })
            ->each(function (Tenant $tenant) {
                $tenant->run(function () use ($tenant) {
                    if ($this->runnable() || $this->option('runnable')) {
                        $this->runOnTenant($tenant);
                    }
                });
            });
    }

    abstract public function runOnTenant(Tenant $tenant): void;
}
