Click here to reset your password: <a href="{{ $link = URL::to('account/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
