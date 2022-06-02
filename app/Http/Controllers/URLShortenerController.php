<?php

namespace App\Http\Controllers;

use App\Http\Requests\URLShortRequest;
use App\Models\Link;
use App\Service\UrlGenerator;

class URLShortenerController extends Controller
{
    protected $urlGenerator;

    public function __construct()
    {
        $this->urlGenerator = new UrlGenerator();
    }

    public function create()
    {
        return view('form');
    }

    public function store(URLShortRequest $uRLShortRequest)
    {
        $url = $uRLShortRequest->validated('url');

        $link = $this->generate($url);

        $url = $link->getGeneratedRoute();

        $message = 'URL has been generated <a href="'.$url.'"> ' . $url. ' </a>';

        return back()->with('message', $message);
    }

    protected function generate(string $url) : Link
    {
        $code = $this->urlGenerator->generateRandom();
        $link = Link::create([
            'code' => $code,
            'destination_url' => $url,
        ]);

        return $link;
    }
}
