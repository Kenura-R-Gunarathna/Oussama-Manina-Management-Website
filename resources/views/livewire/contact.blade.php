
<div class="main-form pt-15">
        
    @if($message_status == true)
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hi {{ $name }}!</strong> Your message has been sent. Thank you for your response.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="closeMessageAlert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
    @endif

    <form wire:submit.prevent="sendContactMessage">
        <div class="row">
            <div class="col-md-6">
                <div class="singel-form form-group">
                    <input name="name" wire:model="name" type="text" placeholder="Your name" data-error="Name is required." required="required">
                    <div class="help-block with-errors">
                        @error('name') <span class="error" style="font-size: 12px;color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="singel-form form-group">
                    <input name="email" wire:model="email" type="email" placeholder="Email" data-error="Valid email is required." required="required">
                    <div class="help-block with-errors">
                        @error('email') <span class="error" style="font-size: 12px;color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="singel-form form-group">
                    <input name="subject" wire:model="subject" type="text" placeholder="Subject" data-error="Subject is required." required="required">
                    <div class="help-block with-errors">
                        @error('subject') <span class="error" style="font-size: 12px;color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="singel-form form-group">
                    <input name="phone" wire:model="phone" type="text" placeholder="Phone" data-error="Phone is required." required="required">
                    <div class="help-block with-errors">
                        @error('phone') <span class="error" style="font-size: 12px;color: red;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="singel-form form-group">
                    <textarea name="messege" wire:model="message" placeholder="Messege" data-error="Please,leave us a message." required="required"></textarea>
                    <div class="help-block with-errors">
                        @error('messege') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <p class="form-message"></p>
            <div class="col-md-12">
                <div class="singel-form">
                    <button type="submit" class="main-btn">Send</button>
                </div>
            </div>
        </div> <!-- row -->

    </form>

</div> 
       