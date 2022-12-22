<?php

namespace RhysLees\JetstreamUserTimezone\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RhysLees\JetstreamUserTimezone\Contracts\UpdatesUserTimezone;

class UpdateTimezoneForm extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    public $timezones;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state['timezone'] = Auth::user()->timezone;

        // If the timezones config is set, use that, otherwise use the default list
        if (config('jetstream-user-timezone.timezones') != []) {
            return $this->timezones = config('jetstream-user-timezone.timezones');
        }

        $this->timezones = timezone_identifiers_list();
    }

    /**
     * Update the user's timezone.
     *
     * @param  \RhysLees\JetstreamUserTimezone\Contracts\UpdatesUserTimezone  $updater
     * @return void
     */
    public function updateTimezone(UpdatesUserTimezone $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->state
        );

        $this->emit('saved');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('jetstream-user-timezone::profile.update-timezone-form');
    }
}
