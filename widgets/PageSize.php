<?php
/**
 * Created by PhpStorm.
 * User: ARS
 * Date: 10/18/2018
 * Time: 10:23 AM
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class PageSize extends Widget {

	public $dataProvider;

	public $perPage = [5, 10, 15, 20, 25, 50, 100];

	public $activeLink = '5';

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		echo $this->renderPageSizer();
	}

	protected function renderPageSizer()
	{
		if ($this->dataProvider->getCount() < 1) {
			return '';
		}

		$content = Html::tag('div', $this->renderButton(), ['style' => 'margin:20px 20px 0 0;']);

		return $content;
	}

	protected function renderButton()
	{
		$pagination = $this->dataProvider->getPagination();
		$pageSize = $pagination->pageSize;
		$currentPageSize = Yii::$app->request->get('per-page');

		$buttonOptions = [
			'class' => 'btn btn-default dropdown-toggle', 
			'type' => 'button', 
			'id' => 'pageSize', 
			'data-toggle' => 'dropdown', 
			'aria-haspopup' => 'true', 
			'aria-expanded' => 'true',
		];
		$button = Html::tag(
			'button', 
			Html::tag('span', $currentPageSize ?: $pageSize, []) . ' ' . Html::tag('span', '', ['class' => 'caret']), 
			$buttonOptions
		);

		$ulOptions = [
			'class' => 'dropdown-menu', 
			'style' => 'min-width:0px;'
		];
		$ul = Html::tag('ul', implode("\n", $this->renderList()), $ulOptions);

		$options = ['class' => 'dropup', 'style' => 'display:inline-block;font-size:13px;'];
		return 'Show ' . Html::tag('div', $button . $ul, $options) . ' rows';
	}

	protected function renderList()
	{
		$list = [];
		foreach (array_reverse($this->perPage) as $value) {
			array_push($list, Html::tag('li', $this->renderLink($value), []));
		}

		return $list;
	}

	protected function renderLink($text)
	{
		$url = '?per-page=' . $text;
		return Html::a($text, $url, []);
	}
}