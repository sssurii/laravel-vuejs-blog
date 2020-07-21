<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public static $is_migrated = false;

    public static function setUpBeforeClass():void
    {
        if (!self::$is_migrated) {
            echo "Running migrations...\n";
            exec('php artisan migrate:fresh');
            echo "Seeding database...\n ";
            exec('php artisan db:seed');
            self::$is_migrated = true;
        }
    }

    public function tearDown(): void
    {
        \DB::connection()->setPdo(null);
        parent::tearDown();
    }
}
