<?php

namespace App\Tenancy\Bootstrappers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;


class FilesystemTenancyBootstrapper implements TenancyBootstrapper
{
    /** @var Application */
    protected $app;

    /** @var array */
    public $originalPaths = [];
    public $original = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->originalPaths = [
            'disks' => [],
        ];

        $this->app['url']->macro('setAssetRoot', function ($root) {
            $this->assetRoot = $root;

            return $this;
        });
    }

    public function bootstrap(Tenant $tenant)
    {
        $suffix = $this->app['config']['tenancy.filesystem.suffix_base'] . $tenant->getTenantKey();

        // Storage facade
        Storage::forgetDisk($this->app['config']['tenancy.filesystem.disks']);

        foreach ($this->app['config']['tenancy.filesystem.disks'] as $disk) {
            $originalRoot = $this->app['config']["filesystems.disks.{$disk}.root"];
            $this->originalPaths['disks'][$disk] = $originalRoot;
            $this->original['disks'][$disk] = $this->app['config']["filesystems.disks.{$disk}"];

            $finalPrefix = str_replace(
                ['%storage_path%', '%tenant%'],
                [storage_path(), $tenant->getTenantKey()],
                $this->app['config']["tenancy.filesystem.root_override.{$disk}"] ?? '',
            );

            if (! $finalPrefix) {
                $finalPrefix = $originalRoot
                    ? rtrim($originalRoot, '/') . '/'. $suffix
                    : $suffix;
            }
            if($this->app['config']["filesystems.disks.{$disk}.driver"] == 'local'
                && isset($this->app['config']["filesystems.disks.{$disk}.url"])
                && $this->app['config']["filesystems.disks.{$disk}.visibility"] == 'public'){
                $this->app['config']["filesystems.disks.{$disk}.url"] = '/tenancy/assets';
            }

            $this->app['config']["filesystems.disks.{$disk}.root"] = $finalPrefix;
        }
    }

    public function revert()
    {
        // Storage facade
        Storage::forgetDisk($this->app['config']['tenancy.filesystem.disks']);
        foreach ($this->app['config']['tenancy.filesystem.disks'] as $disk) {
            $this->app['config']["filesystems.disks.{$disk}"] = $this->original['disks'][$disk];
        }
    }
}
