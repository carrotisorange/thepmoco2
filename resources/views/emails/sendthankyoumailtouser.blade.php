@component('mail::message')
# Hi!

<p>
    Welcome to {{ env('APP_NAME') }} for Home Owners Association. You have come to the right place to digitalize
    your community association management. Managing a community is a complex task so we have made it your mission
    to simplify the administrative tasks for managing a community.</p>
<p>
    As a database storage, your data is encrypted and information is made secure with COMODO SSL, a global security authority, giving you
    that peace of mind. Start migrating your HOA data in {{ env('APP_NAME') }}. Should you need help in migrating your data faster, our
    team can provide migration support.
</p>

<p>
    The {{ env('APP_NAME') }} team is here to help you every step of your digitalization journey.
    Reach us from Mondays to Fridays at 9am to 5pm thru:
</p>

<p>
    Email:
    <br>
    {{ env('HELP_EMAIL') }}
    <br>
    {{ env('TECH_EMAIL') }}
</p>

<P>
    Facebook Messenger:
    <br>
    {{ env('APP_MESSENGER') }}
</P>

<p>
    Thank you for signing up. We look forward to hearing from you soon.
</p>

<p>
   {{ env('APP_CEO') }}
   <br>
   CEO
   <br>
   Propsuite Team
</p>

@endcomponent
