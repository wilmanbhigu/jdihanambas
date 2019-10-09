@extends('layouts.manage')

@section('title')
    Create New Users
@endsection

@section('content')

    <div class="flex-container">
        <div class="column is-10 is-offset-2 m-t-50">
            <h1 class="title m-b-5">Create New User</h1>
            <hr class="m-t-0">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        
            <div class="columns">
                <div class="column">
                    <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="field">
                                <label for="">Nama</label>
                                <p class="control">
                                    <input type="text" name="name" class="input {{ $errors->has('name') ? 'is-invalid':'' }}">
                                </p>
                                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="field">
                                <label for="">Username</label>
                                <p class="control">
                                    <input type="text" name="username" class="input {{ $errors->has('username') ? 'is-invalid':'' }}">
                                </p>
                                <p class="alert alert-danger">{{ $errors->first('username') }}</p>
                            </div>
                            <div class="field">
                                <label for="">Email</label>
                                <p class="control">
                                    <input type="email" name="email" class="input {{ $errors->has('email') ? 'is-invalid':'' }}">
                                </p>
                                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="field">
                                <label for="">Password</label>
                                <p class="control">
                                    <input type="password" name="password" class="input {{ $errors->has('password') ? 'is-invalid':'' }}">
                                </p>
                                <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="field">
                                <label for="">Role</label>
                                <select name="role" class="{{ $errors->has('role') ? 'is-invalid':'' }}">
                                    <option value="">Pilih</option>
                                    @foreach ($role as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <p class="alert alert-danger">{{ $errors->first('role') }}</p>
                            </div>
                            <div class="field">
                                <button class="button is-success is-fullwidth">
                                    Save
                                </button>
                            </div>
                        </form>  

                    {{-- <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf                     
                        <div class="field">
                            <label for="name" class="label">Nama</label>
                            <p class="control">
                                <input type="text" class="input" name="name" id="name">
                            </p>
                        </div>

                        <div class="field">
                            <label for="username" class="label">Username</label>
                            <p class="control">
                                <input type="text" class="input" name="username" id="username">
                            </p>
                        </div>

                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <p class="control">
                                <input type="text" class="input" name="email" id="email">
                            </p>
                        </div>

                        <div class="field">
                            <label for="role" class="label">Role</label>
                            <div class="control" >
                                <div class="select is-primary">
                                    <select name="role">
                                        <option value="">Select Role</option>
                                        @foreach ($role as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <p class="control">
                                <input type="text" class="input" name="password" id="password">
                            </p>
                        </div>

                        <button class="button is-success is-fullwidth">Create New User</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
