<x-tomato-admin-layout>
    <x-slot:header>
        {{__('Firebase Services')}}
    </x-slot:header>
    <x-slot:icon>
        bx bxl-firebase
    </x-slot:icon>

    <div class="flex flex-col gap-4 mb-4">
        <div>
            <x-tomato-settings-card :title="trans('tomato-settings::global.google.sections.firebase.title')" :description="trans('tomato-settings::global.google.sections.firebase.description')">
                <x-splade-form method="post" action="{{route('admin.settings.google-recap.store')}}" class="mt-6 space-y-6" :default="$settings">
                    <div>
                        <x-splade-file id="google_firebase_cr" name="google_firebase_cr" :label="trans('tomato-settings::global.google.sections.firebase.google_firebase_cr')" required filepond />
                        @if(config('tomato-settings.helpers'))
                            <div class="p-1">
                                <small class="text-red-500"><code>setting('google_firebase_cr')</code></small>
                            </div>
                        @endif
                    </div>
                    <div>
                        <x-splade-input id="google_firebase_database_url" name="google_firebase_database_url" type="text" :label="trans('tomato-settings::global.google.sections.firebase.google_firebase_database_url')" required  />
                        @if(config('tomato-settings.helpers'))
                            <div class="p-1">
                                <small class="text-red-500"><code>setting('google_firebase_database_url')</code></small>
                            </div>
                        @endif
                    </div>
                    <div>
                        <x-splade-textarea id="google_firebase_vapid" name="google_firebase_vapid" type="text" :label="trans('tomato-settings::global.google.sections.firebase.google_firebase_vapid')" required  />
                        @if(config('tomato-settings.helpers'))
                            <div class="p-1">
                                <small class="text-red-500"><code>setting('google_firebase_vapid')</code></small>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center gap-4">
                        <x-tomato-admin-submit spinner :label="trans('tomato-admin::global.save')" />
                    </div>
                </x-splade-form>
            </x-tomato-settings-card>
        </div>
    </div>
</x-tomato-admin-layout>
