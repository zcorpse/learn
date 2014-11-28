<?php 

use Laracasts\Presenter\Presenter;


class UserPresenter extends Presenter
{
    /**
     * Present a link to the user gravatar
     */
    public function userType()
    {
        if ($this->type == 1)
            return '股东';
        if ($this->type == 2)
            return '会员';
    }

    public function userQuarter()
    {
        if ($this->accepter->quarter == 1)
            return 'A区';
        if ($this->accepter->quarter == 2)
            return 'B区';
    }

}
