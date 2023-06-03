<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12 m-auto py-2">
            <div class="card">
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form wire:submit.prevent="saveSlide">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group has-success">
                                            <label for="title" class="control-label mb-1">@lang('Title')</label>
                                            <input id="title" wire:model="title" type="text" class="form-control title valid">
                                        </div>
                                        @error('title')
                                            <div class="help-block field-validation-valid alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-success">
                                            <label for="content" class="control-label mb-1">@lang('Content')</label>
                                            <textarea class="ckeditor form-control" id="content" wire:model="content"></textarea>
                                        </div>
                                        @error('content')
                                            <div class="help-block field-validation-valid alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-4">

                                    <div class="col-12 col-md-6 mt-3">
                                        <label for="x_card_code" class="control-label mb-1">@lang('Status')</label>
                                        <div class="form-group">
                                            <select id="status" class="form-control" wire:model="status">
                                                <option value="">@lang('Select Status')</option>
                                                <option value="enabled">@lang('Enabled')</option>
                                                <option value="disabled">@lang('Disabled')</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="help-block field-validation-valid alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 mt-3 mb-3">
                                        <label for="x_card_code" class="control-label mb-1">@lang('Image')</label>
                                        <div class="form-group">
                                            <input type="file" wire:model="photo" id="image" class="form-control">
                                        </div>
                                        @error('photo')
                                            <div class="help-block field-validation-valid alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-save fa-lg"></i>&nbsp;<span id="payment-button-amount">
                                            {{ isset($slide) ? 'Edit Slide' : 'Create Slide' }}
                                        </span>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div>
        <!--/.col-->
    </div>
</div><!-- .animated -->
