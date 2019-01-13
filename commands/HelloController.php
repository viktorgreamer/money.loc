<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\modules\admin\models\Faqs;
use app\utils\D;
use Faker\Factory;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionGenerateFaqs()
    {
       D::$isConsole = true;
       $faker = Factory::create();
       foreach (range(1,30) as $item) {
           $faq = new Faqs();
           $faq->question = $faker->text(50);
           $faq->answer = $faker->text(400);
           $faq->lg = 1;
           $faq->save();
       }
        return ExitCode::OK;
    }
}
