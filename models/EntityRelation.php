<?php

namespace frenzelgmbh\cmentity\models;

use Yii;

/**
 * This is the model class for table "tbl_entity_relation".
 *
 * @property integer $id
 * @property integer $from_entity_id
 * @property integer $to_entity_id
 * @property string $relation
 * @property integer $user_id
 * @property string $system_key
 * @property string $system_name
 * @property integer $system_upate
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property Entity $toEntity
 * @property Entity $fromEntity
 */
class EntityRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entity_relation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_entity_id', 'to_entity_id', 'user_id', 'system_upate', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['relation', 'system_key', 'system_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from_entity_id' => Yii::t('app', 'From Entity ID'),
            'to_entity_id' => Yii::t('app', 'To Entity ID'),
            'relation' => Yii::t('app', 'Relation'),
            'user_id' => Yii::t('app', 'User ID'),
            'system_key' => Yii::t('app', 'System Key'),
            'system_name' => Yii::t('app', 'System Name'),
            'system_upate' => Yii::t('app', 'System Upate'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToEntity()
    {
        return $this->hasOne(Entity::className(), ['id' => 'to_entity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromEntity()
    {
        return $this->hasOne(Entity::className(), ['id' => 'from_entity_id']);
    }
}
