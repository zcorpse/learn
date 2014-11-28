<?php

class PagePresenter extends Illuminate\Pagination\Presenter {

    /**
     * Get HTML wrapper for a page link.
     *
     * @param  string  $url
     * @param  int  $page
     * @param  string  $rel
     * @return string
     */
    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<a href="'.$url.'"'.$rel.'><span class="btn btn-xs btn-white btn-pink">'.$page.'</span></a>&nbsp;';
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    public function getDisabledTextWrapper($text)
    {
        return '<span class="disabled btn btn-xs btn-white btn-pink">'.$text.'</span>&nbsp;';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    public function getActivePageWrapper($text)
    {
        return '<span class="active btn btn-xs btn-white btn-pink">'.$text.'</span>';
    }

}