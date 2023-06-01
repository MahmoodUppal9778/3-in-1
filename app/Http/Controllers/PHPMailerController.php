<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use App\Models\User;
use App\Models\Post;
use App\Models\EmailSetting;
use App\Services\EmailSettingService;
use File;

class PHPMailerController extends Controller
{
 
    // =============== [ Email ] ===================
    public function email() {
        return view("email");
    }
 
 
    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request, EmailSettingService $emailSettingService) {

        try {
 



			$fetchUser = User::all();
            $tempLocal = $fetchUser->implode('email', ', ');
//               dd($tempLocal);
            $mailVar = $emailSettingService->emailCredientials($tempLocal);
//            dd($postId);
            if(!(is_null($mailVar)))
            {    
                $fetchPost = Post::where('api_insertion', '0')->where('id',$request->post)->first();
        //            dd($fetchPost);

                $mailVar->Subject = $fetchPost->title;
                $mailVar->Body    = $fetchPost->body;
                $local = $fetchPost->featured_image;
        		$file = public_path($local);			  	
                $mailVar->addAttachment($file);
        //            dd($mailVar);
                if( !($mailVar->send()) ) {
                    return back()->with("failed", "Email not sent.")->withErrors($mailVar->ErrorInfo);
                }
                
                else {
                    return back()->with("success", "Email has been sent.");
                }
            }
            else{
                return back()->with("error", "Please first fill email credientials in email setting section");
            }    

        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }

    }

    public function emailSetting(){
        return view('frontendmain.emailsetting');
    }

    public function SMTPSetting(Request $request, EmailSettingService $emailSettingService){
//        dd($request->all());
        $smtpHost = $request->smtp;
        $email = $request->email;
        $password = $request->password;
        $type = $request->type;
        $port = $request->port;
        $emailSetting = new EmailSetting;
        $emailSetting->smtpHost = $smtpHost;
        $emailSetting->email = $email;
        $emailSetting->password = $password;
        $emailSetting->type = $type;
        $emailSetting->port = $port;
        $emailSetting->save();
        return redirect()->back();
    }



    public function EmailTest(Request $request, EmailSettingService $emailSettingService){
                try {

                    $recipient = $request->emailRecipient;   
                    $mailVar = $emailSettingService->emailCredientials($recipient);

                    if(!(is_null($mailVar)))
                    {    

//                    dd($mailVar);
                        $mailVar->Subject = $request->emailSubject;
                        $mailVar->Body    = $request->emailBody;
    //                    dd($mailVar);
                        if(!(empty($request->emailAttachments))) {
                            for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                                $mailVar->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                            }
                        }
    //                    dd($mailVar);
                        if( !($mailVar->send()) ) {
    //                                    dd($mailVar->ErrorInfo);

                            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                        }
                        
                        else {
      //                                  dd($mailVar->ErrorInfo);

                            return back()->with("success", "Email has been sent.");
                        }

                    }
                    
                    else
                    {
                        return back()->with("error", "Please first fill email credientials in email setting section");
                    }    


                } catch (Exception $e) {
//            dd($mailVar);
//                                    dd($mailVar->ErrorInfo);

                     return back()->with('error','Message could not be sent.');
            }        

        }        


}

