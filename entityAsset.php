<?php
/**
 * @link http://www.frenzel.net/
 * @author Philipp Frenzel <philipp@frenzel.net> 
 */

namespace frenzelgmbh\cmentity;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class entityAsset extends AssetBundle
{
    public $sourcePath = '@frenzelgmbh/cmentity/assets';
    
    public $css = [
        'css/cm-entity.css'
    ];
    
    public $js = [];
    
    public $depends = [
      'frenzelgmbh\appcommon\commonAsset'
    ];
}
