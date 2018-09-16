<?php

namespace Yish\AutoPage\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @param $slug
     * @param null $one
     * @param null $two
     * @param null $three
     * @param null $four
     * @param null $five
     * @return mixed
     */
    public function page($slug, $one = null, $two = null, $three = null, $four = null, $five = null)
    {
        $prefix = config('auto-page.prefix') ?? 'pages';
        $default = config('auto-page.default') ?? 'whoops';

        $args = implode('', array_map(function($arg) {
            return ! empty($arg) ? '.' . $arg : '';
        }, [$one, $two, $three, $four, $five]));

        $combine = $prefix . '.' . $slug;
        $whoops_page = (empty($args)) ? pathinfo($combine, PATHINFO_FILENAME) . '.' . $default :
            $combine . pathinfo($args, PATHINFO_FILENAME) . '.' . $default;

        if (! view()->exists($whoops_page)) {
            abort(404);
        }

        return view()->first([
            $combine . $args,
            $whoops_page,
        ]);
    }
}