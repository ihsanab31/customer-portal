<?php

namespace app\widgets;

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField {

    public $template = "<div class=\"col-md-2\">{label}</div><div class=\"col-md-4\">{input}\n{error}</div>";

    public $hide = false;

    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{input}'])) {
                $this->textInput();
            }
            if (!isset($this->parts['{label}'])) {
                $this->label();
            }
            if (!isset($this->parts['{error}'])) {
                $this->error();
            }
            if (!isset($this->parts['{hint}'])) {
                $this->hint(null);
            }
            $this->HideInputGroup();
            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }

        return $content;
    }

    protected function HideInputGroup()
    {
        if ($this->hide) {
            $this->template = str_replace('row', 'row hide', $this->template);
        }
    }

    public function error($options = [])
    {
        if ($options === false) {
            $this->parts['{error}'] = '';
            return $this;
        }
        $options = array_merge($this->errorOptions, $options);
        $this->parts['{error}'] = Html::error($this->model, $this->attribute, $options);
        $this->parts['{error}'] .= $this->end();

        return $this;
    }

    public function input($type, $options = [])
    {
        if (empty($options['placeholder'])) {
            $options['placeholder'] = $this->model->getAttributeLabel($this->attribute);
        }

        if (empty($options['autocomplete'])) {
            $options['autocomplete'] = 'off';
        }

        $options = array_merge($this->inputOptions, $options);

        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }

        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);

        $this->parts['{input}'] = $this->begin();
        $this->parts['{input}'] .= Html::activeInput($type, $this->model, $this->attribute, $options);

        return $this;
    }

    public function dropDownList($items, $options = [])
    {
    	if (empty($options['prompt'])) {
    		$options['prompt'] = [
    			'text' => '-- Pilih ' . $this->model->getAttributeLabel($this->attribute) .' --',
    			'options' => [
    				'disabled' => true,
    				'selected' => true,
    			],
    		];
    	}
        else if (!empty($options['prompt']['options'])) {
            $options['prompt'] = [
                'text' => '-- Pilih ' . $this->model->getAttributeLabel($this->attribute) .' --',
                'options' => $options['prompt']['options'],
            ];
        }
        
        $options = array_merge($this->inputOptions, $options);

        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }

        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = $this->begin();
        $this->parts['{input}'] .= Html::activeDropDownList($this->model, $this->attribute, $items, $options);

        return $this;
    }
}