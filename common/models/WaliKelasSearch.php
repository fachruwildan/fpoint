<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WaliKelas;

/**
 * common\models\WaliKelasSearch represents the model behind the search form about `common\models\WaliKelas`.
 */
 class WaliKelasSearch extends WaliKelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_wali_kelas', 'id_pegawai'], 'integer'],
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
        $query = WaliKelas::find();

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
            'id_wali_kelas' => $this->id_wali_kelas,
            'id_pegawai' => $this->id_pegawai,
        ]);

        return $dataProvider;
    }
}
