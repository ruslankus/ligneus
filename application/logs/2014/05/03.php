<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-03 11:48:13 --- EMERGENCY: Swift_TransportException [ 0 ]: Failed to authenticate on SMTP server with username "info@ligneus.ru" using 1 possible authenticators ~ MODPATH/email/vendor/swiftmailer/lib/classes/Swift/Transport/Esmtp/AuthHandler.php [ 184 ] in /home/fabricum/domains/ligneus.ru/public_html/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/EsmtpTransport.php:312
2014-05-03 11:48:13 --- DEBUG: #0 /home/fabricum/domains/ligneus.ru/public_html/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/EsmtpTransport.php(312): Swift_Transport_Esmtp_AuthHandler->afterEhlo(Object(Swift_SmtpTransport))
#1 /home/fabricum/domains/ligneus.ru/public_html/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/AbstractSmtpTransport.php(120): Swift_Transport_EsmtpTransport->_doHeloCommand()
#2 /home/fabricum/domains/ligneus.ru/public_html/modules/email/vendor/swiftmailer/lib/classes/Swift/Mailer.php(80): Swift_Transport_AbstractSmtpTransport->start()
#3 /home/fabricum/domains/ligneus.ru/public_html/modules/email/classes/Kohana/Email.php(405): Swift_Mailer->send(Object(Swift_Message), Array)
#4 /home/fabricum/domains/ligneus.ru/public_html/application/classes/Controller/Index/Email.php(24): Kohana_Email->send()
#5 /home/fabricum/domains/ligneus.ru/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Email->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /home/fabricum/domains/ligneus.ru/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Email))
#8 /home/fabricum/domains/ligneus.ru/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /home/fabricum/domains/ligneus.ru/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 /home/fabricum/domains/ligneus.ru/public_html/index.php(118): Kohana_Request->execute()
#11 {main} in /home/fabricum/domains/ligneus.ru/public_html/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/EsmtpTransport.php:312