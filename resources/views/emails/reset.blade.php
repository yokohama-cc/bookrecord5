<a href="{{ config('app.url') }}">{{ config('app.name') }}</a><br>
<br>
パスワードをリセットします。以下のリンクをクリックしてください。<br>
このメールにお心当たりのない方は、削除をお願いいたします。<br>
<p>
    {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
</p>
