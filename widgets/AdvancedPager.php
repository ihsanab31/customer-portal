<?php

namespace app\widgets;

use Yii;
use app\widgets\PageSize;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\LinkPager;

class AdvancedPager extends Widget {

	/**
     * @var Pagination the pagination object that this pager is associated with.
     * You must set this property in order to make LinkPager work.
     */
    public $dataProvider;

    /**
     * @var array the configuration for the pager widget. By default, [[LinkPager]] will be
     * used to render the pager. You can use a different widget class by configuring the "class" element.
     * Note that the widget must support the `pagination` property which will be populated with the
     * [[\yii\data\BaseDataProvider::pagination|pagination]] value of the [[dataProvider]] and will overwrite this value.
     */
    public $pager = [];

    /**
     * @var string the HTML content to be displayed as the summary of the list view.
     * If you do not want to show the summary, you may set it with an empty string.
     *
     * The following tokens will be replaced with the corresponding values:
     *
     * - `{begin}`: the starting row number (1-based) currently being displayed
     * - `{end}`: the ending row number (1-based) currently being displayed
     * - `{count}`: the number of rows currently being displayed
     * - `{totalCount}`: the total number of rows available
     * - `{page}`: the page number (1-based) current being displayed
     * - `{pageCount}`: the number of pages available
     */
    public $summary;

	/**
     * Initializes the pager.
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
    	echo $this->renderItems();
    }

    public function renderItems()
    {
    	$content = $this->renderSummary();
    	$content .= $this->renderPageSize();
    	$content .= $this->renderPager();

    	$options = ['style' => 'display:flex;justify-content:flex-end;align-items:flex-start;'];
    	$tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::tag($tag, $content, $options);
    }

    /**
     * Renders the pager.
     * @return string the rendering result
     */
    public function renderPager()
    {
    	$pagination = $this->dataProvider->getPagination();;
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }

        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();
        $pager['options'] = ['class' => 'pagination', 'style' => 'margin-bottom:0px;'];
        $pager['hideOnSinglePage'] = false;

        return $class::widget($pager);
    }

    /**
     * Renders the summary text.
     */
    public function renderSummary()
    {
    	$count = count($this->dataProvider->models);
        if ($count <= 0) {
            return '';
        }
        $summaryOptions = ['class' => 'summary', 'style' => 'background-color:transparent;padding:7px;display:block;margin:20px 20px 0px 0px;'];
        $tag = ArrayHelper::remove($summaryOptions, 'tag', 'span');
        if (($pagination = $this->dataProvider->getPagination()) !== false) {
            $totalCount = $this->dataProvider->getTotalCount();
            $begin = $pagination->getPage() * $pagination->pageSize + 1;
            $end = ($pagination->getPage() + 1) * $pagination->pageSize;
            if ($end > $totalCount) {
                $end = $totalCount;
            }
            $page = $pagination->getPage() + 1;
            $pageCount = $pagination->pageCount;
            if (($summaryContent = $this->summary) === null) {
                return Html::tag($tag, Yii::t('yii', 'Showing <b>{begin, number}-{end, number}</b> of <b>{totalCount, number}</b> {totalCount, plural, one{item} other{items}}.', [
                        'begin' => $begin,
                        'end' => $end,
                        'count' => $count,
                        'totalCount' => $totalCount,
                        'page' => $page,
                        'pageCount' => $pageCount,
                    ]), $summaryOptions);
            }
        } else {
            $begin = $page = $pageCount = 1;
            $end = $totalCount = $count;
            if (($summaryContent = $this->summary) === null) {
                return Html::tag($tag, Yii::t('yii', 'Total <b>{count, number}</b> {count, plural, one{item} other{items}}.', [
                    'begin' => $begin,
                    'end' => $end,
                    'count' => $count,
                    'totalCount' => $totalCount,
                    'page' => $page,
                    'pageCount' => $pageCount,
                ]), $summaryOptions);
            }
        }

        return Yii::$app->getI18n()->format($summaryContent, [
            'begin' => $begin,
            'end' => $end,
            'count' => $count,
            'totalCount' => $totalCount,
            'page' => $page,
            'pageCount' => $pageCount,
        ], Yii::$app->language);
    }

    public function renderPageSize()
    {
        $class = ArrayHelper::remove($pager, 'class', PageSize::className());
        $options['perPage'] = [5, 10, 15, 20];
        $options['dataProvider'] = $this->dataProvider;

        return $class::widget($options);
    }

}