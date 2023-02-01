<?php

namespace TomatoPHP\TomatoSettings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;
use Psy\Output\Theme;
use TomatoPHP\TomatoPHP\Services\Tomato;
use TomatoPHP\TomatoSettings\Http\Requests\Settings\SiteSettingsRequest;
use TomatoPHP\TomatoSettings\Http\Requests\Settings\ThemesSettingsRequest;
use TomatoPHP\TomatoSettings\Services\Setting;
use TomatoPHP\TomatoSettings\Settings\SitesSettings;
use TomatoPHP\TomatoSettings\Settings\ThemesSettings;

class ThemesSettingsController extends Setting
{
    public string $setting = ThemesSettings::class;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return $this->get(request: $request, view:'tomato-settings::settings.themes');
    }

    /**
     * @param ThemesSettingsRequest $request
     * @return RedirectResponse
     */
    public function store(ThemesSettingsRequest $request): RedirectResponse
    {
        return $this->save(request: $request, redirect: "admin.settings.themes.index", media:[]);
    }
}
