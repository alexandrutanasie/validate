 <?php

include 'ValidateClass.php';

$name = 'test';
$first_name = 'test';
$phone = '123456789';
$postcode = '12345';
$email = 'alex@demo.ro';
$cnp = "1234567890123";
$password = "alex";
$confirm_password = "alex";

$validate = new Validate();
$validate->init($password,'Password')->min(4)->compare($confirm_password,'Confirm password');
$validate->init($name,'Name')->min(6)->varchar();
$validate->init($first_name,'Name')->min(6)->text();
$validate->init($email,'Email')->email();
$validate->init($phone,'Phone')->min(9)->number();
$validate->init($postcode,'Postcode')->length(5)->number();
$validate->init($cnp,'Cnp')->length(13)->number();
echo '<pre>';
print_r($validate->errors);