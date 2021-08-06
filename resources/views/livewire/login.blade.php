<div>
    <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(storage/images/bg.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="storage/images/logo.jpg" class="rounded-circle"  width="100" >
                        </div>
                        <h2 class="mt-3 text-center">{{__('messages.login')}}</h2>
                        <form class="mt-4" wire:submit.prevent="connecter" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">{{__('messages.form.username')}}</label>
                                        <input class="form-control" id="uname" type="text"
                                            wire:model="form.username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">{{__('messages.form.password')}}</label>
                                        <input class="form-control" id="pwd" type="password"
                                            wire:model="form.password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">{{__('messages.btn.login')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
</div>


@section('js')
    <script>
        window.addEventListener('errorLogin', event =>{
            toastr.error('{{__('messages.alert.errorLogin')}}', '{{__('messages.login')}}', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
