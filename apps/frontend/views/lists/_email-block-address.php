<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the MailWizz EMA application.
 * 
 * @package MailWizz EMA
 * @author Serban George Cristian <cristian.serban@mailwizz.com> 
 * @link https://www.mailwizz.com/
 * @copyright 2013-2018 MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.5.5
 */

$confirmationUrl = Yii::app()->apps->getAppUrl('frontend', sprintf('lists/block-address-confirmation/%s', $model->confirmation_key), true); 
?>

<div class="notification">
    <?php echo Yii::t('email_blacklist', 'Please click the link below in order to confirm the block email request.');?><br />
    <br />
    <a href="<?php echo $confirmationUrl;?>"><?php echo $confirmationUrl;?></a>
    <br /><br />
    <?php echo Yii::t('email_blacklist', 'If for some reason the link is not clickable, please copy and paste it in your browser address bar!');?>
</div>