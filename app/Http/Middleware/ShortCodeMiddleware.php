<?php

namespace App\Http\Middleware;

use App\Models\ShortCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShortCodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $content = $response->getContent();
       // preg_match_all("/\[\[ShortCode\]\]/", $content, $matches);
        //$uniqueShortCodes = array_unique($matches[0]);

        foreach (ShortCode::all() as $shortCode) {

           //0 $value = ShortCode::where('shortcode', $shortCode)->value('replace');

            $content = str_replace($shortCode->shortcode, $shortCode->replace, $content);
        }
        $response->setContent($content);
        return $response;
    }
}
