<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;

class SlidesFields extends Component
{
    use WithFileUploads;

    public $slide_id = null;

    public $title;
    public $content;
    public $date;
    public $status;
    public $photo;

    public $dbSlide;

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required|string',
        'status' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.slides-fields', [
            'slide' => Slider::find($this->slide_id),
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->dbSlide = Slider::find($this->slide_id);

        if (isset($this->dbSlide)) {
            $this->title = $this->dbSlide->title;
            $this->content = $this->dbSlide->content;
            $this->status = strtolower($this->dbSlide->status);
        }
    }

    public function saveSlide()
    {

        global $url;

        $this->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
        ]);

        $validatedData = $this->validate();

        if (empty($this->photo)) {
            if(isset($this->dbSlide)) {
                $url = $this->dbSlide->image;
            }
        }else {
            $url = $this->photo->store('/', 'slider-images');
        }

        if (isset($this->dbSlide)) {

            Slider::where('id', $this->slide_id)->update([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'image' => $url,
                'updated_at' => now()
            ]);
        } else {

            Slider::insert([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'image' => $url,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('slider.index');
    }

}
