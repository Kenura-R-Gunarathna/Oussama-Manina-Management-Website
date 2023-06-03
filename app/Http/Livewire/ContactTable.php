<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;

class ContactTable extends Component
{
    public $messages;

    public function render()
    {
        return view('livewire.contact-table');
    }

    public function deleteMessage($id)
    {
        $deleted = ContactMessage::where('id', $id)->delete();
        return redirect()->route('messages.index');
    }
}
