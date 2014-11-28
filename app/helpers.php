<?php

function lang($text)
{
    return str_replace('hms.', '', trans('hms.'.$text));
}
