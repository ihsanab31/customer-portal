<?php
/**
 * Created by PhpStorm.
 * User: ARS
 * Date: 10/18/2018
 * Time: 10:23 AM
 */

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class ActionColumn extends \yii\grid\ActionColumn
{
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'edit');
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
        ]);
        $this->initDefaultButton('approval', 'user');
    }

    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        $class = 'btn btn-sm btn-circle btn-info';
                        break;
                    case 'update':
                        $title = Yii::t('yii', 'Edit');
                        $class = 'btn btn-sm btn-circle btn-warning';
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        $class = 'btn btn-sm btn-circle btn-danger';
                        break;
                    case 'approval':
                        $title = Yii::t('yii', 'Approval');
                        $class = 'btn btn-sm btn-circle btn-primary';
                        break;
                    default:
                        $title = ucfirst($name);
                        $class = 'btn btn-sm btn-circle btn-default';
                        break;
                }
                
                $options = [
                    'title' => $title,
                    'aria-label' => $title,
                    'class' => $class,
                    'data-pjax' => '0',
                ];

                if ($name === 'delete') {
                    $options = array_merge([
                        'data' => [
                            'toggle' => 'modal',
                            'remote' => 'false',
                            'target' => '#modal-confirm',
                            'action' => Url::to($url),
                        ],
                    ], $options);

                    $additionalOptions = [];
                    $url = '#';
                }
                
                $options = array_merge($options, $additionalOptions, $this->buttonOptions);

                $icon = Html::tag('i', '', ['class' => "fa fa-$iconName"]);

                return Html::a($icon, $url, $options);
            };
        }
    }
}