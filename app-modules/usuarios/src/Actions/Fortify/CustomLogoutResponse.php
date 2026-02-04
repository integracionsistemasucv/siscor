<?php

namespace Modules\Usuarios\Actions\Fortify;

use Laravel\Fortify\Contracts\LogoutResponse;

class CustomLogoutResponse implements LogoutResponse
{
    public function toResponse($request)
    {
        return redirect('/login');
    }
}
