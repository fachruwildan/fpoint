<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StatusAbsensi;

/**
 * common\models\StatusAbsensiSearch represents the model behind the search form about `common\models\StatusAbsensi`.
 */
 class StatusAbsensiSearch extends StatusAbsensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status_absensi'], 'integer'],
            [['keterangan_status_absensi'], 'safe'],
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
        $query = StatusAbsensi::find();

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
            'id_status_absensi' => $this->id_status_absensi,
        ]);

        $query->andFilterWhere(['like', 'keterangan_status_absensi', $this->keterangan_status_absensi]);

        return $dataProvider;
    }
}
