@extends('frontend.templates.default')

@section('content')
    <div class="container">
        <h3>Register</h3>
        <form action="{{ route('register') }}" method="POST" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="name" 
                    class="@error('name') invalid @enderror" value="{{ old('name') }}">
                    <label for="">Name</label>
                    
                    @error('name') 
                        <span class="helper-text" data-error="{{ $message }}"></span> 
                    @enderror
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" 
                    class="@error('email') invalid @enderror" value="{{ old('email') }}">
                    <label for="">Email</label>        

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

                {{-- <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="confirm_password" class="@error('confirm_password') invalid @enderror">
                    <label for="">Confirm Password</label>

                    @error('confirm_password') 
                        <span class="helper-text" data-error="{{ $message }}"></span> 
                    @enderror
                </div> --}}

                <div class="input field right">
                    <input type="submit" value="Register" 
                    class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
                </div>
            </div>
        </form>
    </div>
@endsection