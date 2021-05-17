@component('mail::message')
# Introduction

Hello
Your token is

{{$token}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent