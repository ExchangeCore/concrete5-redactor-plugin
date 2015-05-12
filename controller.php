<?php

namespace Concrete\Package\EcRedactorPluginSample;

use AssetList;
use Concrete\Core\Editor\Plugin;
use Concrete\Core\Package\Package;
use Core;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

    protected $pkgHandle = 'ec_redactor_plugin_sample';
    protected $appVersionRequired = '5.7.4';
    protected $pkgVersion = '0.9.0';

    public function getPackageName()
    {
        return t('ExchangeCore Redactor Plugin Sample');
    }

    public function getPackageDescription()
    {
        return t('A super simple example of including a redactor plugin');
    }

    public function on_start()
    {
        $this->registerAssets();
        $plugin = new Plugin();
        $plugin->setKey('ec_redactor_plugin_sample_alert');
        $plugin->setName(t('Alert'));
        $plugin->requireAsset('editor/plugin/ec_alert');
        Core::make('editor')->getPluginManager()->register($plugin);
        Core::make('editor')->getPluginManager()->select($plugin->getKey());
    }

    public function registerAssets()
    {
        $assetList = AssetList::getInstance();
        $assetList->register(
            'javascript',
            'editor/plugin/ec_alert',
            'assets/js/redactor_alert.js',
            array(),
            $this->pkgHandle
        );

        $assetList->registerGroup(
            'editor/plugin/ec_alert',
            array(
                array('javascript', 'editor/plugin/ec_alert')
            )
        );
    }

}
