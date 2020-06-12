<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WaliMurid;

/**
 * common\models\WaliMuridSearch represents the model behind the search form about `common\models\WaliMurid`.
 */
 class WaliMuridSearch extends WaliMurid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_wali_murid', 'id_pekerjaan', 'id_agama'], 'integer'],
            [['nama_wali_murid', 'tempat_lahir_wali_murid', 'tanggal_lahir_wali_murid', 'jenis_kelamin_wali_murid', 'alamat_rumah_wali_murid', 'no_hp_wali_murid'], 'safe'],
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
        $query = WaliMurid::find();

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
            'id_wali_murid' => $this->id_wali_murid,
            'id_pekerjaan' => $this->id_pekerjaan,
            'id_agama' => $this->id_agama,
            'tanggal_lahir_wali_murid' => $this->tanggal_lahir_wali_murid,
        ]);

        $query->andFilterWhere(['like', 'nama_wali_murid', $this->nama_wali_murid])
            ->andFilterWhere(['like', 'tempat_lahir_wali_murid', $this->tempat_lahir_wali_murid])
            ->andFilterWhere(['like', 'jenis_kelamin_wali_murid', $this->jenis_kelamin_wali_murid])
            ->andFilterWhere(['like', 'alamat_rumah_wali_murid', $this->alamat_rumah_wali_murid])
            ->andFilterWhere(['like', 'no_hp_wali_murid', $this->no_hp_wali_murid]);

        return $dataProvider;
    }
}
