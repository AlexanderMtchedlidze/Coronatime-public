<div class="flex justify-between mt-4">
    <div class="flex items-center">
        <input type="checkbox" name="remember-me" id="remember" class="mr-1.5 w-5 h-5 border-dark-20 rounded text-brand-secondary">
        <label for="remember" class="font-semibold text-sm">{{ trans('log_in.rememberThisDevice') }}</label>
    </div>
    <div>
        <a href="{{ route('reset_password') }}" class="text-brand-primary font-semibold text-sm">{{ trans('log_in.forgotPassword') }}</a>
    </div>
</div>
