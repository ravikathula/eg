<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the MailWizz EMA application.
 * 
 * @package MailWizz EMA
 * @author Serban George Cristian <cristian.serban@mailwizz.com> 
 * @link https://www.mailwizz.com/
 * @copyright 2013-2018 MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.5.2
 */

$url = Yii::app()->apps->getAppUrl('customer', sprintf('campaigns/%s/reports/abuse-reports', $campaign->campaign_uid), true);
?>

<?php echo Yii::t('campaigns', 'Hi {to_name}!', array('{to_name}' => $campaign->customer->fullName));?>
<br />
<?php echo Yii::t('campaigns', 'A new abuse report has been created for the campaign "{campaign}"', array(
    '{campaign}' => $campaign->name,
));?>
<br />
<?php echo Yii::t('campaigns', 'Please visit the "{url}" area to handle it!', array('{url}' => CHtml::link(Yii::t('campaigns', 'Abuse Reports'), $url, array('target' => '_blank'))));?>
