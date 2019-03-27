<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ElectricPrice;

/**
 * ElectricPriceSearch represents the model behind the search form of `app\models\ElectricPrice`.
 */
class ElectricPriceSearch extends ElectricPrice
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priceid', 'price', 'kwh', 'isactive'], 'integer'],
            [['keterangan', 'entrydate', 'entryuserid', 'modifydate', 'modifyuserid'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ElectricPrice::find();
        $query->filterWhere([
            self::tableName() . '.isactive' => 1,
        ]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'priceid' => $this->priceid,
            'price' => $this->price,
            'kwh' => $this->kwh,
            'isactive' => $this->isactive,
            'entrydate' => $this->entrydate,
            'modifydate' => $this->modifydate,
        ]);

        $query->andFilterWhere(['ilike', 'keterangan', $this->keterangan])
            ->andFilterWhere(['ilike', 'entryuserid', $this->entryuserid])
            ->andFilterWhere(['ilike', 'modifyuserid', $this->modifyuserid]);

        return $dataProvider;
    }
}
