Click here to reset your password: <a href="{{ $link = URL::to('admin/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
