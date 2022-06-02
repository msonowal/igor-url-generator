<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class URLHandlerController extends Controller
{
    public function handle($code)
    {
        try {
            $link = Link::whereCode($code)->firstOrFail();

            $link->setVisitInformation();

            return redirect()->away($link->destination_url);
        } catch (ModelNotFoundException $exception) {
            logger('URL not found occured for ' . $code);
            return $this->handleNotFound($code);
        }
    }

    public function handleNotFound($code)
    {
        //if we need to do something on the code we can do it here
        abort(404, 'URL not found');
    }

}
