<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KategoriAturan;

/**
 * common\models\KategoriAturanSearch represents the model behind the search form about `common\models\KategoriAturan`.
 */
 class KategoriAturanSearch extends KategoriAturan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kategori'], 'integer'],
            [['kategori_aturan'], 'safe'],
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
        $query = KategoriAturan::find();

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
            'id_kategori' => $this->id_kategori,
        ]);

        $query->andFilterWhere(['like', 'kategori_aturan', $this->kategori_aturan]);

        return $dataProvider;
    }
}
