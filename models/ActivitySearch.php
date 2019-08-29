<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'isBlocked', 'isRepeated', 'useNotification', 'isDeleted', 'user_id'], 'integer'],
            [['title', 'description', 'dateStart', 'dateEnd', 'email', 'createAt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Activity::find()->cache();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd,
            'isBlocked' => $this->isBlocked,
            'isRepeated' => $this->isRepeated,
            'useNotification' => $this->useNotification,
            'createAt' => $this->createAt,
            'isDeleted' => $this->isDeleted,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'email', $this->email]);

        $query->andWhere(['user_id' => \Yii::$app->user->getId()]);
        $query->with('user');

        return $dataProvider;
    }
}
