cm-entity
==========

Common Entity Module (Frenzel GmbH 2014) v.0.1

Installation
============

Add the following line to your composer.json require section:

```
"frenzelgmbh/cmentity":"*"
```

```
php yii migrate --migrationPath=@vendor/frenzelgmbh/cm-entity/migrations
```

Inside your yii-config, pls. add the following lines to your modules section. As you
might see, the gridview needs to be implemented too.
```
'entity'=>[
  'class' => 'frenzelgmbh\cmentity\Module',
],
'gridview' =>  [
  'class' => '\kartik\grid\Module'
],
```

After this, you should be able to see the set of build in widgets and options under:

http://yourhost/index.php?r=entity/default/test

Design
======

The Entity module is use to store Entity/location informations, that can be linked to any other "module".
So in general all modules are referenced by:

* mod_table (which should hold the table name VARCHAR(100))
* mod_id    (which should hold the primarey key of the referenced record INTEGER(11))

Our Entity Model is based upon an article of "flexible entity design patterns" and is focused on relations between entities while keeping each entity as a unique one.

Widgets
=======

The "create"-Button:
```php
if(class_exists('\frenzelgmbh\cmentity\widgets\CreateEntityModal')){
  echo \frenzelgmbh\cmentity\widgets\CreateEntityModal::widget(array(
    'module'      => 'tbl_test',
    'id'          => 1
  )); 
}
```

The "related"-Grid:
```php
if(class_exists('\frenzelgmbh\cmentity\widgets\RelatedEntityGrid')){
  echo \frenzelgmbh\cmentity\widgets\RelatedEntityGrid::widget(array(
    'module'      => 'tbl_test',
    'id'          => 1
  )); 
}
```
