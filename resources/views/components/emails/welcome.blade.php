
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
    </head>
<body>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="margin-bottom: 10px;">
          <img src="{{ URL::to('/') }}/assets/images/email-attachment.png" style="max-width: 100%;">
        </div>
        <h1 style="font-family: Inter, sans-serif; font-weight: bold; font-size: 2rem; color: #010414;">Confirmation email</h1>
        <p style="font-family: Inter, sans-serif; font-size: 1rem; margin-top: 2px;">Click this button to verify your email</p>
        <a href="{{$verificationLink}}" style="display: flex; justify-content: center; align-items: center; border: none; border-radius: 0.25rem; width: 80%; height: 3.5rem; background-color: #10B981; color: #FFFFFF; font-family: Inter, sans-serif; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05rem; font-size: 1.125rem; margin-top: 0.75rem; text-decoration: none; transition: background-color 0.2s ease-in-out; outline: none;" class="lg:w-96">Verify Email</a>
      </div>
</body>
