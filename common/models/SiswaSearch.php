<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Siswa;

/**
 * common\models\SiswaSearch represents the model behind the search form about `common\models\Siswa`.
 */
 class SiswaSearch extends Siswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_wali_murid', 'id_agama'], 'integer'],
            [['nis', 'nama_siswa', 'tempat_lahir_siswa', 'tanggal_lahir_siswa', 'jenis_kelamin_siswa', 'alamat_rumah_siswa', 'alamat_domisili_siswa', 'no_hp_siswa', 'foto_siswa'], 'safe'],
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
        $query = Siswa::find();

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
            'id_siswa' => $this->id_siswa,
            'id_wali_murid' => $this->id_wali_murid,
            'id_agama' => $this->id_agama,
            'tanggal_lahir_siswa' => $this->tanggal_lahir_siswa,
        ]);

        $query->andFilterWhere(['like', 'nis', $this->nis])
            ->andFilterWhere(['like', 'nama_siswa', $this->nama_siswa])
            ->andFilterWhere(['like', 'tempat_lahir_siswa', $this->tempat_lahir_siswa])
            ->andFilterWhere(['like', 'jenis_kelamin_siswa', $this->jenis_kelamin_siswa])
            ->andFilterWhere(['like', 'alamat_rumah_siswa', $this->alamat_rumah_siswa])
            ->andFilterWhere(['like', 'alamat_domisili_siswa', $this->alamat_domisili_siswa])
            ->andFilterWhere(['like', 'no_hp_siswa', $this->no_hp_siswa])
            ->andFilterWhere(['like', 'foto_siswa', $this->foto_siswa]);

        return $dataProvider;
    }
}
