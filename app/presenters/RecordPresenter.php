<?php 

use Laracasts\Presenter\Presenter;


class RecordPresenter extends Presenter
{
    /**
     * Present a link to the user gravatar
     */
    public function recordType()
    {
        $value = '';
        switch ($this->type)
        {
            case 0: $value = '开户'; break;
            case 1: $value = '直推奖'; break;
            case 2: $value = '提成'; break;
            case 3: $value = '重消奖'; break;
            case 4: $value = '充值'; break;
            case 5: $value = '现金提现'; break;
            case 6: $value = '内部转入'; break;
            case 7: $value = '内部转出'; break;
            case 8: $value = '普通消费'; break;
            case 9: $value = '开户消费'; break;
            case 10: $value = '领导奖'; break;   
            case 11: $value = '区域奖'; break;          
            case 12: $value = '订单退款'; break;
            default: break;
        }
        return $value;       
    }

    public function recordFlag($amount)
    {
        $value = '';
        switch ($this->flag)
        {
            case 1: 
                $value = '<span class="green">+'.number_format($amount,2).'</span>'; 
                break;
            case 0: 
                $value = '<span class="red">-'.number_format($amount,2).'</span>'; 
                break;
            
            default: 
                break;
        }
        return $value;       
    }


    public function recordStatus()
    {
        $value = '';
        switch ($this->status)
        {
            case 1: 
                $value = '<span class="green">已结</span>'; 
                break;
            case 0: 
                $value = '<span class="red">未结</span>'; 
                break;
            
            default: 
                break;
        }
        return $value;       
    }

    

}
