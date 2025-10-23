<x-mail::message>
# Hello {{ $user->name }},

Thank you for joining our CMS platform! We're excited to have you on board.

You can now create and manage your content, customize your profile.

<x-mail::button :url="route('auth.showLogin')">
Login Now
</x-mail::button>

<x-mail::button :url="route('auth.dashboard')" color="success">
Go to Dashboard
</x-mail::button>



Thanks,<br>
The {{ config('app.name') }} Team
</x-mail::message>
