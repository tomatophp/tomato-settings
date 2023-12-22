<?php

namespace TomatoPHP\TomatoSettings\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TomatoPHP\TomatoSettings\Http\Requests\Settings\SiteSettingsRequest;
use TomatoPHP\TomatoSettings\Services\Setting;
use TomatoPHP\TomatoSettings\Settings\SitesSettings;

class LocalSettingsController extends Setting
{
    public string $setting = SitesSettings::class;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return $this->get(request: $request, view:'tomato-settings::settings.location');
    }

    /**
     * @param SiteSettingsRequest $request
     * @return RedirectResponse
     */
    public function store(SiteSettingsRequest $request): RedirectResponse
    {
        return $this->save(request: $request, redirect: "admin.settings.local.index", media:[
            "site_profile",
            "site_logo"
        ]);
    }
}
