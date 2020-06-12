<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Penghargaan;

/**
 * common\models\PenghargaanSearch represents the model behind the search form about `common\models\Penghargaan`.
 */
 class PenghargaanSearch extends Penghargaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penghargaan', 'point_penghargaan'], 'integer'],
            [['uraian_penghargaan'], 'safe'],
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
        $query = Penghargaan::find();

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
            'id_penghargaan' => $this->id_penghargaan,
            'point_penghargaan' => $this->point_penghargaan,
        ]);

        $query->andFilterWhere(['like', 'uraian_penghargaan', $this->uraian_penghargaan]);

        return $dataProvider;
    }
}
