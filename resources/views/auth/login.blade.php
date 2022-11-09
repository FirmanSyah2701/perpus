@extends('frontend.templates.default')

@section('content')
    <div class="container">
        <h3>Login</h3>
        <form action="{{ route('login') }}" method="POST" class="col s12">
            @csrf

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <label for="">Email</label>
                    <input type="email" name="email" 
                    class="@error('email') invalid @enderror" value="{{ old('email') }}">

                    @error('email') 
                        <span class="helper-text" data-error="{{ $message }}"></span> 
                    @enderror
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password" class="@error('password') invalid @enderror">
                    <label for="">Password</label>

                    @error('password') 
                        <span class="helper-text" data-error="{{ $message }}"></span> 
                    @enderror
                </div>

                <div class="input field right">
                    <input type="submit" value="Login" 
                    class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
                </div>
            </div>
        </form>
    </div>
@endsection