<?php

namespace jberall\signaturefont;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SignatureFontController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 
	 *in your view add:
	 * use yii\helpers\Url;
	 * <img src="<?=Url::to(['/signfont','font'=>'AlexBrush-Regular.ttf','message'=>'Your Signature Here!'])?>"/>
	 
     * @param string $message   default 'Signature Font Message'
     * @param string $font  default = 'learning_curve_regular_ot_tt.ttf'
     * @param string $font_folder default __Dir__.'/fonts/'
     * @param int $image_width default 500
     * @param int $image_height default  30
     */
    public function actionIndex($message='Signature Font Message',$font = 'learning_curve_regular_ot_tt.ttf',$image_width=500,$image_height=30,$font_folder=__DIR__.'/fonts/') {
//        echo($font_folder .'<br>');
        if (!is_file($font = $font_folder . $font)) {
            $font = __DIR__. '/fonts/learning_curve_regular_ot_tt.ttf';
        }
//        die($font);
        if (!is_integer($image_height)) $image_height = 30;
        if (!is_integer($image_width)) $image_width = 500;

        // Create the image size
        $im = imagecreatetruecolor($image_width, $image_height);

        // Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 0, 0, 0);
//        imagecolortransparent($im, $black);
        imagefilledrectangle($im, 0, 0, 500, 300, $white);

        // Add some shadow to the text
        imagettftext($im, 20, 0, 11, 21, $grey, $font, $message);

        // Add the text
        imagettftext($im, 20, 0, 10, 20, $black, $font, $message);

        // Using imagepng() results in clearer text compared with imagejpeg()
        imagepng($im);
        imagedestroy($im);

    }

}
