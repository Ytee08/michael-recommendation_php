<?php

    
    

    require_once __DIR__  . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); 
    $dotenv->load(); 


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    function sendRecommendationEmail($name, $skill, $phone, $reciepientEmail){


        $emailHTML = <<<HTML


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email Invitation</title>
            <style>
                body {
                    font-family: 'Segoe UI', Arial, sans-serif;
                    background: linear-gradient(135deg, #f6f9fc, #eef2f7);
                    color: #2c3e50;
                    margin: 0;
                    padding: 30px;
                    min-height: 100vh;
                }

                .email-container {
                    max-width: 650px;
                    margin: 20px auto;
                    background-color: #ffffff;
                    border: none;
                    border-radius: 16px;
                    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
                    overflow: hidden;
                }

                .email-header {
                    background: linear-gradient(135deg, #2c3e50, #3498db);
                    color: #ffffff;
                    padding: 40px 30px;
                    text-align: center;
                    position: relative;
                    overflow: hidden;
                }

                .email-header::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.1) 50%, transparent 52%);
                    background-size: 200% 200%;
                    animation: shine 3s infinite;
                }

                @keyframes shine {
                    0% { background-position: 200% 0; }
                    100% { background-position: -200% 0; }
                }

                .email-header h1 {
                    margin: 0;
                    font-size: 32px;
                    font-weight: 600;
                    letter-spacing: 0.5px;
                    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }

                .email-body {
                    padding: 40px 35px;
                    font-size: 16px;
                    line-height: 1.8;
                    color: #34495e;
                    background: linear-gradient(to bottom, #ffffff, #fcfcfc);
                }

                .email-body p {
                    margin: 20px 0;
                }

                .job {
                    position: relative;
                    display: inline-block;
                    color: #3498db;
                    font-weight: 600;
                    padding: 4px 12px;
                    background: rgba(52, 152, 219, 0.08);
                    border-radius: 6px;
                    transition: all 0.3s ease;
                    margin: 0 2px;
                    border: 1px solid rgba(52, 152, 219, 0.2);
                }

                .job::after {
                    content: '';
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 2px;
                    background: linear-gradient(90deg, #3498db, #2980b9);
                    transform: scaleX(0);
                    transition: transform 0.3s ease;
                }

            
                .signature {
                    margin-top: 40px;
                    padding: 20px;
                    border-left: 4px solid #3498db;
                    background: linear-gradient(to right, rgba(52, 152, 219, 0.05), transparent);
                    border-radius: 0 8px 8px 0;
                }

                .company-name {
                    font-weight: 700;
                    color: #2c3e50;
                    font-size: 20px;
                    margin: 0;
                    letter-spacing: 0.5px;
                }

                .contact-info {
                    color: #7f8c8d;
                    font-size: 14px;
                    line-height: 1.6;
                    margin: 8px 0;
                }


                .email-footer {
                    background: linear-gradient(to bottom, #f8f9fa, #f1f4f7);
                    padding: 25px;
                    text-align: center;
                    font-size: 14px;
                    color: #7f8c8d;
                    border-top: 1px solid rgba(236, 240, 241, 0.8);
                }

                .email-footer p {
                    margin: 5px 0;
                }

                @media (max-width: 600px) {
                    body {
                        padding: 15px;
                    }
                    
                    .email-header h1 {
                        font-size: 24px;
                    }

                    .email-body {
                        padding: 25px 20px;
                    }

                    .signature {
                        margin-top: 30px;
                        padding: 15px;
                    }
                }
            </style>
        </head>
        <body>

        <div class="email-container">
            <div class="email-header">
                <h1>Join Our Family!</h1>
            </div>
            <div class="email-body">
                <p>Hi $name,</p>
                <p>We're reaching out because you were recommended as a fantastic creative person fit to join our company <span class="job">SMART TECH ENT</span>. 
                    We'd love to see your creativity in action, and we 
                    believe your skills in $skill would make a big impact.
                </p>
                <p>Looking forward to working with you!</p>
                
                <div class="signature">
                    <p class="company-name">SMART TECH ENT</p>
                    <p class="contact-info">
                        Big Papa<br>
                        Senior Recruiter<br>
                        Phone: (233) 054-125-283<br>
                        Email: recruiting@smarttech.com
                    </p>
                    
                </div>
            </div>
            <div class="email-footer">
                <p>Have a great day!</p>
                <p>&copy; 2024 SMART TECH ENT</p>
            </div>
        </div>

        </body>
        </html>
        HTML; 

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->SMTPAuth = true;

        //SMPT CONFIG
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
        $mail->Port = $_ENV['SMTP_PORT'];


        //SMPT USERNAME AND PASSWORD
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];

        //RECIEPIENT
        $mail->addAddress($reciepientEmail, $name);
        $mail->setFrom($_ENV['SMTP_FROM'], $_ENV['SMTP_FROM_NAME']);

        //EMAIL CONTENT
        $mail->Subject = "$name, You have been recommended as a creative person";
        $mail->Body =$emailHTML;

        if ($mail->send()) {
            echo 'Email has been sent sucessfully';
        }else {
            echo 'Unable to send email';
        }


    }

?> 