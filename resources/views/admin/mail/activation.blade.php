@component('mail::message')
# Shop activation request

Please activate shop. Here are shop details.

Shop Name : {{$shop->name}}
Shop Owner : {{$shop->owner->name}}

@component('mail::button', ['route' => route('/admin')
Manage Shops
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
