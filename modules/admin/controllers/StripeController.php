<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 19.01.2020
 * Time: 23:45
 */

namespace app\modules\admin\controllers;


class StripeController extends AppAdminController
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCharge()
    {
        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_3SFREJy3Pla0AW4tWJXb4euo00B75ruITD');
        $post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        $first_name = $post['first_name'];
        $last_name = $post['last_name'];
        $email = $post['email'];
        $token = $post['stripeToken'];

        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source' => $token
        ));

        $charge = \Stripe\Charge::create(array(
            'amount' => 5000,
            'currency' => 'usd',
            'description' => 'Intro to React course',
            'customer' => $customer->id
        ));

        echo "<pre>"; print_r($charge);


    }
}