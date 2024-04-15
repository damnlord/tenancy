- [Laravel](https://laravel.com/).
- [Jetstream](https://jetstream.laravel.com/introduction.html).
  - [livewire 3.x](https://livewire.laravel.com/).
  - [laravel-livewire-tables](https://github.com/rappasoft/laravel-livewire-tables).
- [tenancy](https://tenancyforlaravel.com/).
- [Laravel-enum](https://spatie.be/docs/enum/v3/usage/100-laravel).
- [laravel-medialibrary](https://spatie.be/docs/laravel-medialibrary/v11/introduction).
- [laravel-settings](https://github.com/spatie/laravel-settings).
- [heroicons 2.0](https://github.com/wireui/heroicons).


Create a tenant: php artisan make:tenant {user} {domain}
Create a tenant example: php artisan make:tenant foo foo.test.com

migrate tenant:  php artisan tenants:migrate --tenant="foo"
(--tenant="foo" - optional)
