<?php
namespace App\Services;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;


class EmailSettingService{
	
	public function emailCredientials(string $sentTo)
	{
//        dd($sentTo);
        require_once base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` 		
        $count = EmailSetting::all()->count();
        if($count>0)
        {

                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $emailSetting = EmailSetting::latest()->first();
                //  smtp host
                $mail->Host = $emailSetting->smtpHost; 
                $mail->SMTPAuth = true;
   				//  sender username                
                $mail->Username = $emailSetting->email;
       			// sender password                
                $mail->Password = $emailSetting->password;
                // encryption - ssl/tls                
                $mail->SMTPSecure = $emailSetting->tls;
                // port - 587/465                
                $mail->Port = $emailSetting->port;
                $mail->Sender = $emailSetting->email;

                $mail->setFrom('hussnainshah@gmail.com','Muhammad Mahmood');
                $mail->Sender = "hussnainshah@gmail.com";
//                dd($mail);
//                DD($sentTo);
// for sending multiple emails
                if(str_contains($sentTo, ', '))
                {
//                    
                    $arraySent = explode(', ',$sentTo);
                    
                    $counter = count($arraySent);

                    $mail->addAddress($arraySent[0]);
                    if($counter>1)
                    {   
                        for ($i=1; $i<2 ; $i++) {
                            $mail->addCC($arraySent[$i]);
                        }
                    }
                }
// for sending single email                
                else
                {   
//                    dd($sentTo);
                    $mail->addAddress($sentTo);
//                    dd($mail); 
                }    
//		        dd($sentTo);

                $mail->isHTML(true);  
//                dd($mail);
                return $mail;


		}
		else
		{
				return NULL;	
		}	
	}	


}

?>