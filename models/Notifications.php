<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $read
 * @property string $view
 * @property string $title
 * @property string $link
 * @property string $created_at
 * @property int $created_by
 * @property int $status
 * @property string $slug
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique'=>true,
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'status'], 'integer'],
            [['slug'], 'required'],
            [['read', 'view', 'title', 'link', 'slug','created_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'read' => Yii::t('app', 'Read'),
            'view' => Yii::t('app', 'View'),
            'title' => Yii::t('app', 'Title'),
            'link' => Yii::t('app', 'Link'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'status' => Yii::t('app', 'Status'),
            'slug' => Yii::t('app', 'Slug'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return NotificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationsQuery(get_called_class());
    }
}
