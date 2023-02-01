<?php

namespace TomatoPHP\TomatoSettings\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TomatoPHP\TomatoSettings\Http\Requests\Settings\GoogleSettingsRequest;
use TomatoPHP\TomatoSettings\Http\Requests\Settings\SiteSettingsRequest;
use TomatoPHP\TomatoSettings\Services\Setting;
use TomatoPHP\TomatoSettings\Settings\GoogleSettings;

class GoogleSettingsController extends Setting
{
    public string $setting = GoogleSettings::class;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return $this->get(request: $request, view:'tomato-settings::settings.google');
    }

    /**
     * @param GoogleSettingsRequest $request
     * @return RedirectResponse
     */
    public function store(GoogleSettingsRequest $request): RedirectResponse
    {
        return $this->save(request: $request, redirect: "admin.settings.google.index", media:[
            'google_firebase_cr'
        ]);
    }
}
