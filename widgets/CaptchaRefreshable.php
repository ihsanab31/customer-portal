<?php

namespace app\widgets;


class CaptchaRefreshable extends \yii\captcha\Captcha
{
    /**
     * Overrides the $template HTML
     */
    public $options = ['class' => 'form-control','placeholder' => 'Please insert verification code'];

    public function init() 
    {
        $refresh_a = \yii\helpers\Html::a(\yii\helpers\Html::tag('i', '', ['class' => 'fa fa-refresh', 'style' => 'font-size: 22px; color: #585757;']). '', '#', [
            'id' => 'refresh-captcha',
                ]);
        
        $this->template = '<div id="verify-code" class="row">'.
        '<div class="large-3 columns">{image} ' . $refresh_a . '</div>'.
        '<div class="large-6 columns" style="padding-right:10px; padding-left:10px;">{input}</div>'.
        '</div>';

        parent::init(); 
    }
    public function registerClientScript() { 
        $view = $this->getView(); $view->registerJs(" $('#refresh-captcha').on('click', function(e){ e.preventDefault(); $('#verify-code img').yiiCaptcha('refresh'); }) "); 
        parent::registerClientScript(); 
    } 
}