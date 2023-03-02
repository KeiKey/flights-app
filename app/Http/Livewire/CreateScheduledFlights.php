<?php

namespace App\Http\Livewire;

use App\Models\Season;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Livewire\Component;

class CreateScheduledFlights extends Component
{
    public Collection $seasons;
    public SupportCollection|Collection $companies;
    public $season = '';

    public function updatedSeason($value)
    {
        $this->companies = Season::query()->find($value)->companies ?? collect([]);
    }

    public function mount()
    {
        $this->seasons = Season::query()->get();
        $this->companies = collect([]);
    }

    public function render(): View
    {
        return view('livewire.create-scheduled-flights');
    }
}
