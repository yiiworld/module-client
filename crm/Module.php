<?php
/**
 * Module.php
 * @author Revin Roman
 * @link https://rmrevin.com
 */

namespace cookyii\modules\Client\crm;

use cookyii\modules\Client;
use rmrevin\yii\fontawesome\FA;

/**
 * Class Module
 * @package cookyii\modules\Client\crm
 */
class Module extends \yii\base\Module implements \crm\interfaces\CrmModuleInterface, \yii\base\BootstrapInterface
{

    /**
     * @inheritdoc
     */
    public function menu($Controller)
    {
        return [
            [
                'label' => \Yii::t('account', 'Clients'),
                'url' => ['/client/list/index'],
                'icon' => FA::icon('users'),
                'visible' => User()->can(Client\crm\Permissions::ACCESS),
                'selected' => $Controller->module->id === 'client',
                'sort' => 2000,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->getI18n()
            ->translations['client'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => \Yii::$app->sourceLanguage,
            'basePath' => '@app/messages',
        ];
    }
}