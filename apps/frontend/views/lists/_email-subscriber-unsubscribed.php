<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the MailWizz EMA application.
 * 
 * @package MailWizz EMA
 * @author Serban George Cristian <cristian.serban@mailwizz.com> 
 * @link https://www.mailwizz.com/
 * @copyright 2013-2018 MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.2
 */
 
?>

<div class="notification">
    <?php echo Yii::t('lists', 'A subscriber has been unsubscribed from your list.');?><br />
    <?php echo Yii::t('lists', 'List name');?>: <?php echo $list->name;?><br />
    <?php echo Yii::t('lists', 'Subscriber email');?>: <?php echo $subscriber->displayEmail;?><br />
</div>