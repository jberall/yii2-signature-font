Signature Font 
===============
Displays images using php gd

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jberall/yii2-signature-font: "dev-master"
```

or add

```
"jberall/yii2-signature-font": "dev-master"
```

to the require section of your `composer.json` file.

composer update jberall/yii2-signature-font will only update this file.


Usage
-----

To use the SignatureFontController
in your config file add
    'controllerMap' => [
        'signfont' => 'jberall\signaturedraw\SignatureFontController',
        
    ],
	
to add an signature Font

use yii\helpers\Url;

<img src="<?=Url::to(['/signfont','font'=>'AlexBrush-Regular.ttf','message'=>'Your Signature Here!'])?>"/>


$message   default 'Signature Font Message'
$font  default = 'learning_curve_regular_ot_tt.ttf'
$image_width default 500
$image_height default  30
$font_folder = 'c:\fonts\\' path to your font. if windows make sure you have \\


