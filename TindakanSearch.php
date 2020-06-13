<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tindakan;

/**
 * app\models\TindakanSearch represents the model behind the search form about `common\models\Tindakan`.
 */
 class TindakanSearch extends Tindakan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tindakan'], 'integer'],
            [['tindakan'], 'safe'],
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
        $query = Tindakan::find();

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
            'id_tindakan' => $this->id_tindakan,
        ]);

        $query->andFilterWhere(['like', 'tindakan', $this->tindakan]);

        return $dataProvider;
    }
}
