<?php
namespace common\components;
use yii\base\Component;
class AngularSockets extends Component
{
    

    public $appId = null;
    public $appKey = null;
    public $appSecret = null;
    public $host = null;
    public $port = null;
    

    private $_selectableOptions = ['host', 'port', 'timeout', 'encrypted'];

    public $options = [];

    public function init()
    {
        parent::init();

        /*
         * Mandatory config parameters.
         */
        if (!$this->appId) {
            throw new InvalidConfigException('AppId cannot be empty!');
        }

        if (!$this->appKey) {
            throw new InvalidConfigException('AppKey cannot be empty!');
        }

        if (!$this->appSecret) {
            throw new InvalidConfigException('AppSecret cannot be empty!');
        }
        if (!$this->host) {
            throw new InvalidConfigException('AppSecret cannot be empty!');
        }
        
    }
    
}

