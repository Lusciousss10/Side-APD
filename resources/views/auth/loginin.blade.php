<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Akhir Nopal</title>
    <link rel="stylesheet" href="styles.css" />
    @vite(['resources/css/sidebar.css','resources/js/app.js'])</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2>
                <div class="input-group">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                    <label for="email" :value="__('Email')">Email</label>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600"/>
                <div class="input-group">
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" required>
                    <label for="password" :value="__('Password')">Password</label>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <div class="remember">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit">Login</button>
                {{-- <div class="signUp-link">
                    <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
                </div> --}}
            </form>
        </div>
        <div class="form-wrapper sign-up">
            <form method="POST" action="{{ route('register') }}">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                    <label for="name" :value="__('Name')">Username</label>
                </div>
                <div class="input-group">
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username">
                    <label for="email" :value="__('Email')">Email</label>
                </div>
                <div class="input-group">
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    <label for="password" :value="__('Password')">Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox"> I agree to the terms & conditions</label>
                </div>
                <button type="submit">Sign Up</button>
                {{-- <div class="signUp-link">
                      <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p> --}}
                </div>
            </form>
        </div>
    </div>
    <script>
        const signInBtnLink = document.querySelector('.signInBtn-link');
        const signUpBtnLink = document.querySelector('.signUpBtn-link');
        const wrapper = document.querySelector('.wrapper');
        signUpBtnLink.addEventListener('click', () => {
            wrapper.classList.toggle('active');
        });
        signInBtnLink.addEventListener('click', () => {
            wrapper.classList.toggle('active');
        });
    </script>
</body>

</html>