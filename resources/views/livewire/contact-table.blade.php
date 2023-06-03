<div class="card-body">

    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Email')</th>
                <th>@lang('Subject')</th>
                <th>@lang('Phone')</th>
                <th>@lang('Message')</th>
                <th>@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr wire:key="message-field-{{ $message->id }}">
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ $message->message }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-danger" style="color:white;" wire:click="deleteMessage({{ $message->id }})">
                                <i class="nav-icon fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>