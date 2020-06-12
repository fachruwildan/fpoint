<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pegawai;

/**
 * common\models\PegawaiSearch represents the model behind the search form about `common\models\Pegawai`.
 */
 class PegawaiSearch extends Pegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_agama'], 'integer'],
            [['nama_pegawai', 'alamat_pegawai', 'jenis_kelamin_pegawai', 'no_hp_pegawai', 'status_kepegawaian', 'jabatan_pegawai', 'foto_pegawai'], 'safe'],
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
        $query = Pegawai::find();

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
            'id_pegawai' => $this->id_pegawai,
            'id_agama' => $this->id_agama,
        ]);

        $query->andFilterWhere(['like', 'nama_pegawai', $this->nama_pegawai])
            ->andFilterWhere(['like', 'alamat_pegawai', $this->alamat_pegawai])
            ->andFilterWhere(['like', 'jenis_kelamin_pegawai', $this->jenis_kelamin_pegawai])
            ->andFilterWhere(['like', 'no_hp_pegawai', $this->no_hp_pegawai])
            ->andFilterWhere(['like', 'status_kepegawaian', $this->status_kepegawaian])
            ->andFilterWhere(['like', 'jabatan_pegawai', $this->jabatan_pegawai])
            ->andFilterWhere(['like', 'foto_pegawai', $this->foto_pegawai]);

        return $dataProvider;
    }
}
