<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the MailWizz EMA application.
 * 
 * @package MailWizz EMA
 * @author Serban George Cristian <cristian.serban@mailwizz.com> 
 * @link https://www.mailwizz.com/
 * @copyright 2013-2018 MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.0
 */

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderContent} to false 
 * in order to stop rendering the default content.
 * @since 1.3.3.1
 */
$hooks->doAction('before_view_file_content', $viewCollection = new CAttributeCollection(array(
    'controller'    => $this,
    'renderContent' => true,
)));

// and render if allowed
if ($viewCollection->renderContent) { 
    /**
     * This hook gives a chance to prepend content before the active form or to replace the default active form entirely.
     * Please note that from inside the action callback you can access all the controller view variables 
     * via {@CAttributeCollection $collection->controller->data}
     * In case the form is replaced, make sure to set {@CAttributeCollection $collection->renderForm} to false 
     * in order to stop rendering the default content.
     * @since 1.3.3.1
     */
    $hooks->doAction('before_active_form', $collection = new CAttributeCollection(array(
        'controller'    => $this,
        'renderForm'    => true,
    )));
    
    // and render if allowed
    if ($collection->renderForm) {
        $form = $this->beginWidget('CActiveForm');
        ?>
        <div class="login-flex">
            <div class="login-form login-flex-col">
                <div class="login-box-body">
					<div class="col-md-5 logo-shadow">
<img src="http://demo.office24by7.com/User/striker-img/login-icon.png" alt="login icon" class="login-logo-ato">
</div>

<div class="col-md-7 login-form-office text-left vcenter">
                   <!-- <p class="login-box-msg"><?php //echo Yii::t('users', 'Sign in to start your session');?></p>-->
                    <?php
                    /**
                     * This hook gives a chance to prepend content before the active form fields.
                     * Please note that from inside the action callback you can access all the controller view variables
                     * via {@CAttributeCollection $collection->controller->data}
                     * @since 1.3.3.1
                     */
                    $hooks->doAction('before_active_form_fields', new CAttributeCollection(array(
                        'controller'    => $this,
                        'form'          => $form
                    )));
                    ?>
					<div class="row">
                        <div class="col-lg-12 logintitlediv">
						<h4 class="login-title">Login</h4>
						</div>
						</div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group custominput">
                                <?php //echo $form->labelEx($model, 'email');?>
                                <?php echo $form->emailField($model, 'email', $model->getHtmlOptions('email')); ?>
								<label for="UserLogin_email"><span>Email</span></label>
                                <?php echo $form->error($model, 'email');?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group custominput">
                                <?php //echo $form->labelEx($model, 'password');?>
                                <?php echo $form->passwordField($model, 'password', $model->getHtmlOptions('password')); ?>
								<label for="UserLogin_password"><span>Password</span></label>
                                <?php echo $form->error($model, 'password');?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>
                                    <?php echo $form->checkBox($model, 'remember_me') . ' ' . $model->getAttributeLabel('remember_me');?>
                                </label>
                            </div>
                            <div class="clearfix"><!-- --></div>
                            <div class="form-group text-right">
                                <a href="<?php echo $this->createUrl('guest/forgot_password')?>" class="btn btn-default btn-flat"><?php echo IconHelper::make('fa-lock') . '&nbsp;' . Yii::t('users', 'Forgot password?');?></a>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-flat"><?php echo IconHelper::make('next') . '&nbsp;' .Yii::t('app', 'Login');?></button>
                            </div>
                            <div class="clearfix"><!-- --></div>
                        </div>
                    </div>
</div>
                    <?php
                    /**
                     * This hook gives a chance to append content after the active form fields.
                     * Please note that from inside the action callback you can access all the controller view variables
                     * via {@CAttributeCollection $collection->controller->data}
                     *
                     * @since 1.3.3.1
                     */
                    $hooks->doAction('after_active_form_fields', new CAttributeCollection(array(
                        'controller'    => $this,
                        'form'          => $form
                    )));
                    ?>
                </div>
            </div>
           <!-- <div class="login-billboard login-flex-col" style="background-image: url('<?php echo $loginBgImage; ?>');">

            </div>-->
			<script>
						$(document).ready(function(){
							
						$('#UserLogin_email, #UserLogin_password').prop('required',true);
						
						$('#UserLogin_email').keyup(function(){
						if($(this).val()==''){
							$(this).removeClass('keyvalue');
							
						}else{
							$(this).addClass('keyvalue');
						}	
							
						});
					});
						</script>
        </div>
        <?php 
        $this->endWidget(); 
    } 
    /**
     * This hook gives a chance to append content after the active form.
     * Please note that from inside the action callback you can access all the controller view variables 
     * via {@CAttributeCollection $collection->controller->data}
     * @since 1.3.3.1
     */
    $hooks->doAction('after_active_form', new CAttributeCollection(array(
        'controller'      => $this,
        'renderedForm'    => $collection->renderForm,
    )));
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * @since 1.3.3.1
 */
$hooks->doAction('after_view_file_content', new CAttributeCollection(array(
    'controller'        => $this,
    'renderedContent'   => $viewCollection->renderContent,
)));