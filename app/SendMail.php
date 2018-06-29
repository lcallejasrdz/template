<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Sentinel;
use URL;
use App\User;

class SendMail extends Model
{
    public static function SMTPMail()
    {
        $mail = new PHPMailer(true);
        
        if(env('APP_ENV') == 'local'){
            $mail->isSMTP();
        }
        $mail->SMTPAuth = true;

        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Host = env('MAIL_HOST');
        $mail->Port = env('MAIL_PORT');
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

        return $mail;
    }

    public static function createMailTest()
    {
        $subject = 'Prueba Mail';
        $msg = '<p>Prueba Mail</p>';

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress('lcallejas@fabricadesoluciones.com', 'Eduardo Callejas');
            // $mail->addBCC('email', 'name');
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailForgotPassword($data)
    {
        $user = $data['user'];
        $forgotPasswordUrl = $data['forgotPasswordUrl'];

        $subject = trans('mail.forgot_password.subject');
        
        $msg = "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>";
            $msg .= "<tbody>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<img src='". URL::to('assets/images/logo.png') ."' alt='".env('APP_NAME')."' style='margin-top: 15px; margin-bottom: 15px;'>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 15px; margin-bottom: 15px; font-size: 16px;'><strong>Recuperar Contraseña</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<td style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $user->first_name ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.last_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<td style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $user->last_name ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.recovery_link') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<td style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'><a href='". $forgotPasswordUrl ."' target='_blank'>Recuperar Contraseña</a></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 25px; margin-bottom: 25px;'></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
            $msg .= "</tbody>";
        $msg .= "</table>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress($user->email, $user->first_name.' '.$user->last_name);
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailContact($data)
    {
        $subject = trans('mail.contact_user.subject');
        $msg = "<p>". trans('mail.contact_user.thanks') ."</p>";
        $msg .= "<p>". trans('mail.contact_user.contact_you') ."</p>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress($data->email, $data->name);
            // $mail->addBCC('email', 'name');
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailContactAdmin($data)
    {
        $subject = trans('mail.contact_admin.subject');
        $msg = "<p>". trans('mail.contact_admin.new_contact') ."</p>";
        $msg .= "<ul>";
        $msg .= "<li>". trans('mail.title.first_name') .": ".$data->name."</li>";
        $msg .= "<li>". trans('mail.title.phone') .": ".$data->phone."</li>";
        $msg .= "<li>". trans('mail.title.email') .": ".$data->email."</li>";
        $msg .= "<li>". trans('mail.title.message') .": ".$data->message."</li>";
        $msg .= "</ul>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress(env('MAIL_ADMIN_ADDRESS'), env('MAIL_ADMIN_NAME'));
            // $mail->addBCC('email', 'name');
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailSale($sale, $items, $customer)
    {
        $subject = trans('mail.sale_user.subject');
        
        $msg = "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>";
            $msg .= "<tbody>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<img src='". URL::to('assets/images/logo.png') ."' alt='".env('APP_NAME')."' style='margin-top: 15px; margin-bottom: 15px;'>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 15px; margin-bottom: 15px; font-size: 16px;'><strong>". trans('mail.sale_user.details') ."</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.total') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->first_name ." ". $customer->last_name ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>$". number_format($sale->total, 2, '.', ',') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                if(count($items) > 0){
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<tbody>";
                                    $msg .= "<tr>";
                                        $msg .= "<td style='text-align: center;'>";
                                            $msg .= "<p style='margin-top: 25px; margin-bottom: 25px; font-size:16px;'><strong>". trans('mail.title.products') ."</strong></p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<thead>";
                                    $msg .= "<tr>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.quantity') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.price') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.subtotal') ."</p>";
                                        $msg .= "</th>";
                                    $msg .= "</tr>";
                                $msg .= "</thead>";
                                $msg .= "<tbody>";
                                    $total = 0;
                                    foreach($items as $item){
                                        $msg .= "<tr>";
                                            $msg .= "<td style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->product_id ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: center; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->quantity ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>$". number_format($item->price, 2, '.', ',') ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>$". number_format($item->price * $item->quantity, 2, '.', ',') ."</p>";
                                            $msg .= "</td>";
                                        $msg .= "</tr>";
                                        $total += $item->price * $item->quantity;
                                    }
                                    $msg .= "<tr>";
                                        $msg .= "<td colspan='3' style='text-align: right; width: 450px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'><strong>". trans('mail.title.total') .":</strong></p>";
                                        $msg .= "</td>";
                                        $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>$". number_format($total, 2, '.', ',') ."</p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                }
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 25px; margin-bottom: 25px;'></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='font-size: 9px;'>". trans('mail.sale_user.note') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
            $msg .= "</tbody>";
        $msg .= "</table>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress(Sentinel::getUser()->email, Sentinel::getUser()->first_name.' '.Sentinel::getUser()->last_name);
            // $mail->addBCC('email', 'name');
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailSaleAdmin($sale, $items, $customer)
    {
        $subject = trans('mail.sale_admin.subject');
        
        $msg = "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>";
            $msg .= "<tbody>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<img src='". URL::to('assets/images/logo.png') ."' alt='".env('APP_NAME')."' style='margin-top: 15px; margin-bottom: 15px;'>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 15px; margin-bottom: 15px; font-size: 16px;'><strong>". trans('mail.sale_admin.sale_details') ."</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.id') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.date') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $sale->id ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $sale->created_at ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.total') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->first_name ." ". $customer->last_name ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>$". number_format($sale->total, 2, '.', ',') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.email') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.phone') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->email ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->phone ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                if(count($items) > 0){
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<tbody>";
                                    $msg .= "<tr>";
                                        $msg .= "<td style='text-align: center;'>";
                                            $msg .= "<p style='margin-top: 25px; margin-bottom: 25px; font-size:16px;'><strong>". trans('mail.title.products') ."</strong></p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<thead>";
                                    $msg .= "<tr>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.quantity') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.price') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.subtotal') ."</p>";
                                        $msg .= "</th>";
                                    $msg .= "</tr>";
                                $msg .= "</thead>";
                                $msg .= "<tbody>";
                                    $total = 0;
                                    foreach($items as $item){
                                        $msg .= "<tr>";
                                            $msg .= "<td style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->product_id ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: center; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->quantity ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>$". number_format($item->price, 2, '.', ',') ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>$". number_format($item->price * $item->quantity, 2, '.', ',') ."</p>";
                                            $msg .= "</td>";
                                        $msg .= "</tr>";
                                        $total += $item->price * $item->quantity;
                                    }
                                    $msg .= "<tr>";
                                        $msg .= "<td colspan='3' style='text-align: right; width: 450px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'><strong>". trans('mail.title.total') .":</strong></p>";
                                        $msg .= "</td>";
                                        $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>$". number_format($total, 2, '.', ',') ."</p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                }
            $msg .= "</tbody>";
        $msg .= "</table>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress(env('MAIL_ADMIN_ADDRESS'), env('MAIL_ADMIN_NAME'));
            if(env('APP_ENV') == 'production'){
                $admins = User::where('role_id', '<=', 2)->get();
                foreach($admins as $admin){
                    if($admin->email != env('MAIL_ADMIN_ADDRESS')){
                        $mail->addBCC($admin->email, $admin->first_name.' '.$admin->last_name);
                    }
                }
            }
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailItemCanceled($sale, $items, $customer)
    {
        $subject = trans('mail.item_canceled_user.subject');
        
        $msg = "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>";
            $msg .= "<tbody>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<img src='". URL::to('assets/images/logo.png') ."' alt='".env('APP_NAME')."' style='margin-top: 15px; margin-bottom: 15px;'>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 15px; margin-bottom: 15px; font-size: 16px;'><strong>". trans('mail.item_canceled_user.details') ."</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.total') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->first_name ." ". $customer->last_name ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>$". number_format($sale->total, 2, '.', ',') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                if(count($items) > 0){
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<tbody>";
                                    $msg .= "<tr>";
                                        $msg .= "<td style='text-align: center;'>";
                                            $msg .= "<p style='margin-top: 25px; margin-bottom: 25px; font-size:16px;'><strong>". trans('mail.title.products') ."</strong></p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<thead>";
                                    $msg .= "<tr>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.quantity') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.price') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.subtotal') ."</p>";
                                        $msg .= "</th>";
                                    $msg .= "</tr>";
                                $msg .= "</thead>";
                                $msg .= "<tbody>";
                                    $total = 0;
                                    foreach($items as $item){
                                        $msg .= "<tr>";
                                            $msg .= "<td style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->product_id ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: center; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->quantity ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>$". number_format($item->price, 2, '.', ',') ."</p>";
                                            $msg .= "</td>";
                                            if($item->sale_status_id == \App\SaleStatus::find(5)->name){
                                                $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                    $msg .= "<p style='font-size: 12px; color: #c9302c;'>". $item->sale_status_id ."</p>";
                                                $msg .= "</td>";
                                            }else{
                                                $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                    $msg .= "<p style='font-size: 12px;'>$". number_format($item->price * $item->quantity, 2, '.', ',') ."</p>";
                                                $msg .= "</td>";
                                            }
                                        $msg .= "</tr>";
                                        if($item->sale_status_id != \App\SaleStatus::find(5)->name){
                                            $total += $item->price * $item->quantity;
                                        }
                                    }
                                    $msg .= "<tr>";
                                        $msg .= "<td colspan='3' style='text-align: right; width: 450px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'><strong>". trans('mail.title.total') .":</strong></p>";
                                        $msg .= "</td>";
                                        $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>$". number_format($total, 2, '.', ',') ."</p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                }
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 25px; margin-bottom: 25px;'></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='font-size: 9px;'>". trans('mail.item_canceled_user.note') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
            $msg .= "</tbody>";
        $msg .= "</table>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress(Sentinel::getUser()->email, Sentinel::getUser()->first_name.' '.Sentinel::getUser()->last_name);
            // $mail->addBCC('email', 'name');
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailItemCanceledAdmin($sale, $items, $customer)
    {
        $subject = trans('mail.item_canceled_admin.subject');
        
        $msg = "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>";
            $msg .= "<tbody>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<img src='". URL::to('assets/images/logo.png') ."' alt='".env('APP_NAME')."' style='margin-top: 15px; margin-bottom: 15px;'>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 15px; margin-bottom: 15px; font-size: 16px;'><strong>". trans('mail.item_canceled_admin.sale_details') ."</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.id') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.date') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $sale->id ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $sale->created_at ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.total') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->first_name ." ". $customer->last_name ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>$". number_format($sale->total, 2, '.', ',') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.email') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.phone') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->email ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->phone ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                if(count($items) > 0){
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<tbody>";
                                    $msg .= "<tr>";
                                        $msg .= "<td style='text-align: center;'>";
                                            $msg .= "<p style='margin-top: 25px; margin-bottom: 25px; font-size:16px;'><strong>". trans('mail.title.products') ."</strong></p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                    $msg .= "<tr>";
                        $msg .= "<td>";
                            $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                                $msg .= "<thead>";
                                    $msg .= "<tr>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.quantity') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.price') ."</p>";
                                        $msg .= "</th>";
                                        $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>". trans('mail.title.subtotal') ."</p>";
                                        $msg .= "</th>";
                                    $msg .= "</tr>";
                                $msg .= "</thead>";
                                $msg .= "<tbody>";
                                    $total = 0;
                                    foreach($items as $item){
                                        $msg .= "<tr>";
                                            $msg .= "<td style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->product_id ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: center; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>". $item->quantity ."</p>";
                                            $msg .= "</td>";
                                            $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                $msg .= "<p style='font-size: 12px;'>$". number_format($item->price, 2, '.', ',') ."</p>";
                                            $msg .= "</td>";
                                            if($item->sale_status_id == \App\SaleStatus::find(5)->name){
                                                $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                    $msg .= "<p style='font-size: 12px; color: #c9302c;'>". $item->sale_status_id ."</p>";
                                                $msg .= "</td>";
                                            }else{
                                                $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                                    $msg .= "<p style='font-size: 12px;'>$". number_format($item->price * $item->quantity, 2, '.', ',') ."</p>";
                                                $msg .= "</td>";
                                            }
                                        $msg .= "</tr>";
                                        if($item->sale_status_id != \App\SaleStatus::find(5)->name){
                                            $total += $item->price * $item->quantity;
                                        }
                                    }
                                    $msg .= "<tr>";
                                        $msg .= "<td colspan='3' style='text-align: right; width: 450px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'><strong>". trans('mail.title.total') .":</strong></p>";
                                        $msg .= "</td>";
                                        $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                            $msg .= "<p style='font-size: 12px;'>$". number_format($total, 2, '.', ',') ."</p>";
                                        $msg .= "</td>";
                                    $msg .= "</tr>";
                                $msg .= "</tbody>";
                            $msg .= "</table>";
                        $msg .= "</td>";
                    $msg .= "</tr>";
                }
            $msg .= "</tbody>";
        $msg .= "</table>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress(env('MAIL_ADMIN_ADDRESS'), env('MAIL_ADMIN_NAME'));
            if(env('APP_ENV') == 'production'){
                $admins = User::where('role_id', '<=', 2)->get();
                foreach($admins as $admin){
                    if($admin->email != env('MAIL_ADMIN_ADDRESS')){
                        $mail->addBCC($admin->email, $admin->first_name.' '.$admin->last_name);
                    }
                }
            }
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function createMailUpdateStatusItem($sale, $item, $customer)
    {
        $subject = trans('mail.sale_user.subject');
        
        $msg = "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>";
            $msg .= "<tbody>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<img src='". URL::to('assets/images/logo.png') ."' alt='".env('APP_NAME')."' style='margin-top: 15px; margin-bottom: 15px;'>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 15px; margin-bottom: 15px; font-size: 16px;'><strong>". trans('mail.sale_user_update.details') ."</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.total') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $customer->first_name ." ". $customer->last_name ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 300px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>$". number_format($sale->total, 2, '.', ',') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 25px; margin-bottom: 25px; font-size:16px;'><strong>". trans('mail.title.products') ."</strong></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<thead>";
                                $msg .= "<tr>";
                                    $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.first_name') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.quantity') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.price') ."</p>";
                                    $msg .= "</th>";
                                    $msg .= "<th style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". trans('mail.title.subtotal') ."</p>";
                                    $msg .= "</th>";
                                $msg .= "</tr>";
                            $msg .= "</thead>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $item->product_id ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: center; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>". $item->quantity ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px;'>$". number_format($item->price, 2, '.', ',') ."</p>";
                                    $msg .= "</td>";
                                    $msg .= "<td style='text-align: right; width: 150px; padding-top: 10px; padding-bottom: 5px;'>";
                                        $msg .= "<p style='font-size: 12px; color: #449d44;'>". $item->sale_status_id ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='margin-top: 25px; margin-bottom: 25px;'></p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
                $msg .= "<tr>";
                    $msg .= "<td>";
                        $msg .= "<table border='0' cellspacing='0' cellpadding='0' style='width: 600px; margin: 0 auto;'>";
                            $msg .= "<tbody>";
                                $msg .= "<tr>";
                                    $msg .= "<td style='text-align: center;'>";
                                        $msg .= "<p style='font-size: 9px;'>". trans('mail.sale_user.note') ."</p>";
                                    $msg .= "</td>";
                                $msg .= "</tr>";
                            $msg .= "</tbody>";
                        $msg .= "</table>";
                    $msg .= "</td>";
                $msg .= "</tr>";
            $msg .= "</tbody>";
        $msg .= "</table>";

        try {
            $mail = self::SMTPMail();
            $mail->CharSet = 'UTF-8'; // set charset to utf8
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->addAddress($customer->email, $customer->first_name.' '.$customer->last_name);
            // $mail->addBCC('email', 'name');
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
