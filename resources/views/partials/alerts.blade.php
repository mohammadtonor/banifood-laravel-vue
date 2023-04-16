@if (session('wrongCredentials'))
    <div class="alert alert-danger">
        @lang('auth.user or password was wrong')
    </div>
@endif
@if (session('cantSendCode'))
    <div class="alert alert-danger">
        @lang('auth.cantSendCode')
    </div>
@endif
@if (session('invalidCode'))
    <div class="alert alert-danger">
        @lang('auth.invalidCode')
    </div>
@endif
@if (session('twoFactorActivated'))
    <div class="alert alert-success">
        @lang('auth.twoFactorActivated')
    </div>
@endif
@if (session('twoFactorDeactivated'))
    <div class="alert alert-success">
        @lang('auth.twoFactorDeactivated')
    </div>
@endif
@if (session('codeResent'))
    <div class="alert alert-success">
        @lang('auth.codeResent')
    </div>
@endif

