<?php

namespace TomatoPHP\TomatoSettings\Menus;

use TomatoPHP\TomatoPHP\Services\Menu\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class SettingsMenu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group = "Settings";

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    public function __construct()
    {
        $this->group = trans('tomato-settings::global.group');
    }

    /**
     * @return array
     */
    public static function handler(): array
    {
        return [
            Menu::make()
                ->label(trans('tomato-settings::global.site.title'))
                ->icon("bx bxs-cog")
                ->route("admin.settings.site.index"),
            Menu::make()
                ->label(trans('tomato-settings::global.email.title'))
                ->icon("bx bxs-envelope")
                ->route("admin.settings.email.index"),
            Menu::make()
                ->label(trans('tomato-settings::global.payments.title'))
                ->icon("bx bxs-credit-card")
                ->route("admin.settings.payments.index"),
            Menu::make()
                ->label(trans('tomato-settings::global.google.title'))
                ->icon("bx bxl-google")
                ->route("admin.settings.google.index"),
            Menu::make()
                ->label(trans('tomato-settings::global.services.title'))
                ->icon("bx bxs-cloud")
                ->route("admin.settings.services.index"),
            //TODO: Theme setting for frontend actions with Builder package
//            Menu::make()
//                ->label("Themes")
//                ->icon("bx bxs-brush")
//                ->route("admin.settings.themes.index"),
        ];
    }
}
