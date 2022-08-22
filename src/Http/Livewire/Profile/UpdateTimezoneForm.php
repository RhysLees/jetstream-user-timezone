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

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
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
        return view('profile.update-timezone-form');
    }
}
