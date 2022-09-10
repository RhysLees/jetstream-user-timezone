<x-jet-form-section submit="updateTimezone">
    <x-slot name="title">
        {{ __('Update Timezone') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s timezone.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Timezone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="timezone" value="{{ __('Timezone') }}" />
            <select id="timezone" type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.defer="state.timezone" autocomplete="timezone">
                <option value="">{{ __('Select a timezone...') }}</option>
                @foreach ($timezones as $timezone)
                    <option value="{{ $timezone }}">{{ $timezone }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="timezone" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
