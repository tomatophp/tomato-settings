<?php

namespace TomatoPHP\TomatoSettings\Facades;

use Illuminate\Support\Facades\Facade;
use TomatoPHP\TomatoSettings\Services\Contracts\SettingHold;

/**
 *  @method static \Illuminate\Support\Collection get()
 * @method static \Illuminate\Support\Collection load()
 * @method static \TomatoPHP\TomatoSettings\Services\SettingHolderHandler register(array|SettingHold $item)
 */
class TomatoSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tomato-settings';
    }
}
