<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Gate;

class MessagesController extends Controller
{
    public function index()
    {
        Gate::authorize('view_contact_messages');

        return view(
            'jambasangsang.backend.messages.index',
            [
                'messages' => ContactMessage::all()
            ]
        );
    }
}
