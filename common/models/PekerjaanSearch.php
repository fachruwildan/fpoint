<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pekerjaan;

/**
 * common\models\PekerjaanSearch represents the model behind the search form about `common\models\Pekerjaan`.
 */
 class PekerjaanSearch extends Pekerjaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pekerjaan'], 'integer'],
            [['nama_pekerjaan'], 'safe'],
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
        $query = Pekerjaan::find();

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
            'id_pekerjaan' => $this->id_pekerjaan,
        ]);

        $query->andFilterWhere(['like', 'nama_pekerjaan', $this->nama_pekerjaan]);

        return $dataProvider;
    }
}
