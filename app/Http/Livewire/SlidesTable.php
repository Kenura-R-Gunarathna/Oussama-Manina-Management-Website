<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class SlidesTable extends Component
{
    public $slides;

    public function render()
    {
        return view('livewire.slides-table');
    }

    public function deleteSlide($id)
    {
        $deleted = Slider::where('id', $id)->delete();
        return redirect()->route('slider.index');
    }
}
