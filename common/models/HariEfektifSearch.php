<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HariEfektif;

/**
 * common\models\HariEfektifSearch represents the model behind the search form about `common\models\HariEfektif`.
 */
 class HariEfektifSearch extends HariEfektif
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hari_efektif'], 'integer'],
            [['nama_hari_efektif', 'status_hari_efektif'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = HariEfektif::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_hari_efektif' => $this->id_hari_efektif,
        ]);

        $query->andFilterWhere(['like', 'nama_hari_efektif', $this->nama_hari_efektif])
            ->andFilterWhere(['like', 'status_hari_efektif', $this->status_hari_efektif]);

        return $dataProvider;
    }
}
