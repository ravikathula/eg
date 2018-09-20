<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * StoreController
 * 
 * Handles the actions for store related tasks
 * 
 * @package MailWizz EMA
 * @author Serban George Cristian <cristian.serban@mailwizz.com> 
 * @link https://www.mailwizz.com/
 * @copyright 2013-2018 MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.3.7.2
 */
 
class StoreController extends Controller
{
    public function actionIndex()
    {
        $cacheCount = (int)Yii::app()->params['store.cache.count'];
        $cache = Yii::app()->cache;
        $url   = 'https://www.mailwizz.com/api/store?cache-count=' . $cacheCount;
        $key   = sha1($url . __METHOD__);
        
        if (($items = $cache->get($key)) === false) {
            $response = AppInitHelper::simpleCurlGet($url, 10);
            $items    = !empty($response['message']) ? @json_decode($response['message']) : array();
            $items    = is_array($items) ? $items : array();
            $cache->set($key, $items, 3600 * 24);
        }
        
        $this->setData(array(
            'pageMetaTitle'     => $this->data->pageMetaTitle . ' | '. Yii::t('store', 'View store items'),
            'pageHeading'       => Yii::t('store', 'View store items'),
            'pageBreadcrumbs'   => array(
                Yii::t('store', 'Store items') => $this->createUrl('store/index'),
                Yii::t('app', 'View all')
            )
        ));
        
        $this->render('index', compact('items'));
    }
}