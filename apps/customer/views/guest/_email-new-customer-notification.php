<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the MailWizz EMA application.
 * 
 * @package MailWizz EMA
 * @author Serban George Cristian <cristian.serban@mailwizz.com> 
 * @link https://www.mailwizz.com/
 * @copyright 2013-2018 MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.3.4.6
 */
$customerUrl = Yii::app()->options->get('system.urls.backend_absolute_url') . 'customers/update/id/' . $customer->customer_id; 
?>

<!-- START CONTENT -->
<?php echo Yii::t('customers', 'A new customer registration has been made as follows:');?><br />
<?php foreach ($customer->getAttributes(array('first_name', 'last_name', 'email')) as $attributeName => $attributeValue) { ?>
<?php echo $customer->getAttributeLabel($attributeName);?>: <?php echo $attributeValue;?> <br />
<?php } ?>
<br />
<?php echo Yii::t('customers', 'The customer details url is as follows:');?><br />
<?php echo CHtml::link($customerUrl, $customerUrl);?> <br />
<!-- END CONTENT-->