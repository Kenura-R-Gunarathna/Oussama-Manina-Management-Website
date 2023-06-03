<div class="card">

    <div class="card-header">
        <strong class="card-title">@lang('Slides')</strong>
        <a href="{{ route('slider.create') }}"
            class="pull-right btn btn-sm btn-success">@lang('New slide')</a>
    </div>

    <div class="card-body">

        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>@lang('Title')</th>
                    <th>@lang('Content')</th>
                    <th>@lang('URL')</th>
                    <th>@lang('Status')</th>
                    <th>@lang('Slug')</th>
                    <th>@lang('Image')</th>
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                    <tr wire:key="message-field-{{ $slide->id }}">
                        <td>{{ $slide->title }}</td>
                        <td>{{ $slide->content }}</td>
                        <td>{{ $slide->url }}</td>
                        <td>{{ $slide->status }}</td>
                        <td>{{ $slide->slug }}</td>
                        <td>
                            <img src="{{ asset(\constPath::SliderImage.$slide->image) }}" alt="{{ $slide->title }} image" style="width:80px;">
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('slider.edit', [$slide->id]) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" style="color:white;" wire:click="deleteSlide({{ $slide->id }})">
                                    <i class="nav-icon fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
