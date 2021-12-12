@component('mail::message')
# Your Posts was liked

{{ $liker->name}} liked one of your posts

@component('mail::button', ['url' => route('posts.show', $post)])
 View posts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
