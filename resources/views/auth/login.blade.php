<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.auth')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')

    @include('admin.components.validationErrorMessage')

    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('Admin.auth.login') }}" method="post" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control"
                                   placeholder="E-mail"
                                   name="email"
                                   type="email">
                        </div>
                        <div class="form-group">
                            <input class="form-control"
                                   placeholder="Password"
                                   name="password"
                                   type="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember"
                                       type="checkbox"
                                       value="Remember Me">
                                Remember Me
                            </label>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                    </fieldset>
                    <!-- CSRF 欄位 -->
                    {!! csrf_field() !!}
                </form>
            </div>
        </div>
    </div>
@endsection
