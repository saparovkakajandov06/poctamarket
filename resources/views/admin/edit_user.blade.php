@extends('layouts.admin')

@section('content')
    <div class="page-wrapper" style="display:block">

        <div class="container-fluid">

        @if(session('status'))
        <div class="alert alert-success mt-3">
        {{ session('status') }}
        </div>
        @endif

        @if(count($errors))
        <div class="alert alert-danger mt-3">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        </ul>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Логин</label>
                                            <input type="text" name="login" value="{{ old('login', $user->login) }}" class="form-control" placeholder="Login" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Имя</label>
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Имя" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Фамилия</label>
                                            <input type="text" name="surname" value="{{ old('surname', $user->surname) }}" class="form-control" placeholder="Фамилия" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Роль</label>
                                            <select name="role" class="form-control">
                                                <option value="">Нет роли</option>
                                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                                <option value="dispatcher" @if($user->role == 'dispatcher') selected @endif>Dispatcher</option>
                                                <option value="product_manager" @if($user->role == 'product_manager') selected @endif>Vendor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Телефон</label>
                                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" placeholder="Телефон" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Пароль</label>
                                            <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Проверка пароля</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Введите пароль еще раз">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <button type="submit" class="btn btn-info m-2">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
        
        </div>
        
        @include('inc.footer')
       
    </div>
@endsection
