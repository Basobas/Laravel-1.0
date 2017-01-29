

@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="imagePage_container">

            <div class="controlPageTitle">
                Control Panel
            </div>
            <div class="user_container">
                <div class="user">
                    <div class = "user_name">
                        <h4><b>Username</b></h4>
                    </div>

                    <div class="user_email" >
                        <h4><b>Email</b></h4>
                    </div>

                    <div class="user_role">
                        <h4><b>Role</b></h4>
                    </div>

                    <div class="user_active">
                        <h4><b>Active</b></h4>
                    </div>

                    <div class="user_edit">
                        <h4><b>Edit</b></h4>
                    </div>
                    <div class="user_delete">
                        <h4><b>Delete</b></h4>
                    </div>
                </div>
                @foreach ($users as $user)

                    <div class="user">
                        <div class = "user_name">
                            {{ $user->name }}
                        </div>

                        <div class="user_email" >
                            {{$user->email}}
                        </div>
                        <div class="user_role">
                            @if($user->admin == 1)
                                Admin
                            @else
                                User
                            @endif
                        </div>

                        <div class="user_active">
                            <button onclick ="userActivate('{{ $user->id}}', this)" type="button" class="btn btn-default">
                                @if( $user->active == 1)
                                        Make inactive
                                @else
                                        Make active
                                @endif
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
