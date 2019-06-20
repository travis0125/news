<p>{{ $name }}，您好：</p>
<p>請點選下列網址，完成密碼重設手續。</p>
<a href="{{route('password.reset', $token) }}">{{route('password.reset', $token) }}</a>
<br/><br/><br/>
<p>#### 本郵件由 {{ config('app.url') }} 系統自動發出，請勿回覆。 ####</p>