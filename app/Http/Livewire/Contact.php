<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

class Contact extends Component
{

    public string $name;
    public string $email;
    public string $subject;
    public string $phone;
    public string $message;

    public $message_status = false;

    public function render()
    {
        return view('livewire.contact');
    }

    protected $rules = [
        'name' => 'required|string|min:6|max:225',
        'email' => 'required|email|max:225',
        'subject' => 'required|string|min:6|max:225',
        'phone' => 'string|min:6|max:20',
        'message' => 'required|string|min:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sendContactMessage()
    {
        $validatedData = $this->validate();

        ContactMessage::create($validatedData);

        $this->name = "";
        $this->email = "";
        $this->subject = "";
        $this->phone = "";
        $this->message = "";

        $this->message_status = true;
    }

    public function closeMessageAlert()
    {
        $this->message_status = false;
    }
}
