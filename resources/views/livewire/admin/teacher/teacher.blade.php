<div>

    @if ($etat === "add")
        @include('livewire.admin.teacher.add')
    @elseif ($etat === "show")
        @include('livewire.admin.teacher.show')
    @else
    <div class="row py-lg-2">
                <button class="btn btn-success btn-rounded  float-md-right" wire:click.prevent="addNew" aria-pressed="true">{{__('messages.btn.add')}}</button>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
            @foreach ($teachers as $user)

                <div class="col-xl-3 col-lg-12">
                <div class="card mb-4">
                    <div class="card-body bar-primary">
                        <div class="card-block">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="storage/images/{{$user['photo']}}" class="rounded-circle img-border gradient-summer" height="70" alt="Card image">
                                </a>
                            </div>
                            <div class="text-center">
                                <span class="font-medium-2 text-uppercase">{{$user->prenom}} {{$user->nom}}</span>
                                <p class="grey font-small-2">{{$user->roles[0]->name}}</p>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="card-footer">

                        <div class="row">
                            <div class="col">
                            <button class="btn btn-success rounded-circle btn-circle font-12"
                                            wire:click="show({{$user->id}})" aria-pressed="true" title="{{__('messages.btn.info')}}"><i class="fa fa-eye"></i></button>
                        </div>
                        <div class="col text-md-right">
                            <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item"  title="{{__('messages.btn.delete')}}"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            @endforeach
                </div>
            </div>
        </div>

    @endif


</div>

@section('js')
    <script>

        window.addEventListener('teacherAdded', event =>{
            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.teacher")}}', {positionClass: 'toast-top-right'});
        })
        window.addEventListener('teacherUpdated', event =>{
            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.teacher")}}', {positionClass: 'toast-top-right'});
        })

    </script>

@endsection
