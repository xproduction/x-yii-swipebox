<?php
/**
  * XSwipebox
  * ---------
  *
  * Yii Extension implementing great jQuery lightbox called swipebox (http://brutaldesign.github.io/swipebox/)
  *
  * @author Matěj Kašpar Jirásek <matej@xproduction.cz>
  * @copyright Copyright &copy; X Production s. r. o.
  * @version 1.0
  * @license MIT License
  */
class XSwipebox extends CComponent {
	
    /**
      * @var Path to css file in assets
      */
    const CSS_FILE = 'source/swipebox.css';
    /**
      * @var Path to base script
      */
    const JS_FILE = 'source/jquery.swipebox.min.js';
    /**
      * @var Path to iOS orientation fix script
      */
    const JS_ORIENTATION_FIX_FILE = 'lib/ios-orientationchange-fix.js';
    /**
      * @var Path to assets directory folder (relative to extension directory)
      */
    const ASSETS_FOLDER = 'XSwipebox/assets';
	
    /**
      * Registers all css and javascript files
      */
	protected static function registerClientScript() {
		$clientScript = Yii::app()->clientScript;
		$clientScript->registerCoreScript('jquery');
		$assets = Yii::app()->extensionPath . DIRECTORY_SEPARATOR . XSwipebox::ASSETS_FOLDER . DIRECTORY_SEPARATOR;
		$assetsUrl = Yii::app()->assetManager->publish($assets);
        $clientScript->registerScriptFile($assetsUrl . '/' . XSwipebox::JS_ORIENTATION_FIX_FILE);
        $clientScript->registerScriptFile($assetsUrl . '/' . XSwipebox::JS_FILE);
		$clientScript->registerCssFile($assetsUrl . '/' . XSwipebox::CSS_FILE);
	}

    /**
      * Assigns Swipebox to your links
      * @param string $selector jQuery selector at which swipebox will be applied
      * @param array $options additional parameters to Swipebox plug in
      */
    public static function add($selector = ".swipebox", $options = array()) {
 
        self::registerClientScript();
 
        Yii::app()->clientScript->registerScript(__CLASS__,'        
            $("' . $selector . '").swipebox(' . CJavaScript::encode($options) . ');
        ',CClientScript::POS_READY);
    }
	
}
