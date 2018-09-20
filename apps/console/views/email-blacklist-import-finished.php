<?php if ( ! defined('MW_PATH')) exit('No direct script access allowed');?>

<?php echo Yii::t('email_blacklist', 'Hello {name}', array(
    '{name}' => $user->getFullName(),
));?>,
<br />
<?php echo Yii::t('email_blacklist', 'This is a notification to let you know that the import process for the email blacklist has finished! The imported file is "{name}"', array(
    '{name}' => $fileName,
));?>
<br />
<?php echo Yii::t('email_blacklist', 'Click {here} to see the overview page!', array(
    '{here}' => CHtml::link(Yii::t('email_blacklist', 'here'), $overviewUrl),
));?>
