<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
    </head>
<body>
  <div style="margin: 0 auto; max-width: 600px; font-family: Arial, sans-serif; text-align: center;">
    <div style="margin-bottom: 10px;">
      <img src="{{$message->embed(public_path('/assets/images/email-attachment.png'))}}" style="max-width: 100%;">
    </div>
    <h1 style="font-family: Inter, sans-serif; font-weight: bold; font-size: 2rem; color: #010414; text-align: center;">Recover password</h1>
    <p style="font-family: Inter, sans-serif; font-size: 1rem; margin-top: 2px; text-align: center;">Click this button to recover a password</p>
    <a href="{{$verificationLink}}" style="font-family: Inter, sans-serif; display: inline-block; border: none; border-radius: 0.25rem; width: 80%; height: 3.5rem; background-color: #10B981; color: #FFFFFF; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05rem; font-size: 1.125rem; margin-top: 0.75rem; text-decoration: none; text-align: center; line-height: 3.5rem; transition: background-color 0.2s ease-in-out; outline: none;">Recover password</a>
  </div>
</body>