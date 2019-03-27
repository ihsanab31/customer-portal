<?php

use app\widgets\Alert;
use app\widgets\Button;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>

<div class="col-sm-3"
     style="position: absolute; margin: auto; top: 0; right: 0; bottom: 0; left: 0; height:75%; padding: 0.4%; background-color: rgba(255,255,255,0);">

    <?= Alert::widget() ?>
    <div class="panel"
         style="position: absolute; margin: auto; top: 0; right: 0; bottom: 0; left: 0; height: 75%; padding-top: 0.5%; background-color: rgba(255,255,255,0.8);">
        <?= Html::img('/img/logo.png', ['style' => 'height : 110px; width : 110px; padding: 2%', 'class'=>'']); ?>
        <div class="panel-body">
            <?php echo Html::label('Belleza Lifescape', null, ['style' => 'font-size: 22px; text-align: justify;']); ?>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'action' => ['site/login']
            ]); ?>
            <div class="form-group">
                <?= $form->field($model, 'username', ['template' => '
                        <div  style="margin-top:5px;">
                            <div class="input-group col-sm-12">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                {input}
                            </div>{error}{hint}
                        </div>'])->textInput(['autofocus' => true])
                    ->input('text', ['placeholder' => 'Username', 'autocomplete' => 'off']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password', ['template' => '
                        <div style="margin-top:15px;">
                            <div class="input-group col-sm-12">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                {input}
                            </div>{error}{hint}
                        </div>'])->passwordInput()
                    ->input('password', ['placeholder' => 'Password']) ?>
            </div>
            <div class="form-group">

                <?= Button::submit('login') ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>