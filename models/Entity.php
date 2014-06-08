<?php

namespace frenzelgmbh\cmentity\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tbl_entity".
 *
 * @property integer $id
 * @property string $name
 * @property string $prename
 * @property string $name_two
 * @property string $name_three
 * @property string $official_one
 * @property string $official_two
 * @property string $param_date
 * @property string $param_text
 * @property integer $user_id
 * @property string $mod_table
 * @property integer $mod_id
 * @property string $system_key
 * @property string $system_name
 * @property integer $system_upate
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 * @property integer $entity_type_id
 * @property integer $entity_relation_id
 *
 * @property EntityType $entityType
 * @property EntityRelation[] $entityRelations
 */
class Entity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entity}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['param_date'], 'safe'],
            [['param_text'], 'string'],
            [['user_id', 'mod_id', 'system_upate', 'created_at', 'updated_at', 'deleted_at', 'entity_type_id', 'entity_relation_id'], 'integer'],
            //[['created_at', 'updated_at'], 'required'],
            [['name'], 'string', 'max' => 140],
            [['prename', 'name_two', 'name_three', 'mod_table', 'system_key', 'system_name'], 'string', 'max' => 100],
            [['official_one', 'official_two'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'prename' => Yii::t('app', 'Prename'),
            'name_two' => Yii::t('app', 'Name Two'),
            'name_three' => Yii::t('app', 'Name Three'),
            'official_one' => Yii::t('app', 'Official One'),
            'official_two' => Yii::t('app', 'Official Two'),
            'param_date' => Yii::t('app', 'Param Date'),
            'param_text' => Yii::t('app', 'Param Text'),
            'user_id' => Yii::t('app', 'User ID'),
            'mod_table' => Yii::t('app', 'Mod Table'),
            'mod_id' => Yii::t('app', 'Mod ID'),
            'system_key' => Yii::t('app', 'System Key'),
            'system_name' => Yii::t('app', 'System Name'),
            'system_upate' => Yii::t('app', 'System Upate'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'entity_type_id' => Yii::t('app', 'Entity Type ID'),
            'entity_relation_id' => Yii::t('app', 'Entity Relation ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityType()
    {
        return $this->hasOne(EntityType::className(), ['id' => 'entity_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityRelations()
    {
        return $this->hasMany(EntityRelation::className(), ['from_entity_id' => 'id']);
    }
}
