<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Private Announcement - AcademiTrack</title>
</head>
<body style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background-color: #f3f4f6; font-family: Arial, Helvetica, sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        <!-- Header -->
        <tr>
            <td align="center" bgcolor="#3b82f6" style="padding: 20px;">
                <!--[if mso]>
                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:150px;height:50px;">
                    <v:fill type="tile" src="http://localhost:8000/img/logo.jpg" color="#3b82f6" />
                    <v:textbox inset="0,0,0,0">
                <![endif]-->
                <img src="http://localhost:8000/img/logo.jpg" alt="AcademiTrack Logo" width="150" height="50" style="display: block; max-width: 150px; height: auto; border: 0; outline: none; -ms-interpolation-mode: bicubic;" />
                <!--[if mso]>
                    </v:textbox>
                </v:rect>
                <![endif]-->
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td style="padding: 24px;">
                <h1 style="font-size: 24px; font-weight: bold; color: #1f2937; margin: 0 0 12px 0; font-family: Arial, Helvetica, sans-serif;">New Private Announcement</h1>
                <h2 style="font-size: 18px; font-weight: 600; color: #374151; margin: 0 0 8px 0; font-family: Arial, Helvetica, sans-serif;">{{ $announcement->title }}</h2>
                <p style="font-size: 16px; color: #4b5563; line-height: 1.5; margin: 0 0 16px 0; font-family: Arial, Helvetica, sans-serif;">{!! nl2br(e($announcement->content)) !!}</p>
                <p style="font-size: 14px; color: #6b7280; margin: 0 0 24px 0; font-family: Arial, Helvetica, sans-serif;">Posted on: {{ $announcement->posted_date->format('M d, Y') }}</p>
                <!-- Button with VML for Outlook -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center">
                            <!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://localhost:8000/login" style="height:44px;v-text-anchor:middle;width:200px;" arcsize="10%" strokecolor="#3b82f6" fillcolor="#3b82f6">
                                <w:anchorlock/>
                                <center style="color:#ffffff;font-family:Arial, Helvetica, sans-serif;font-size:16px;font-weight:500;">View All Announcements</center>
                            </v:roundrect>
                            <![endif]-->
                            <a href="http://localhost:8000/login" style="display: inline-block; padding: 12px 24px; background-color: #3b82f6; color: #ffffff; font-size: 16px; font-weight: 500; text-decoration: none; border-radius: 6px; font-family: Arial, Helvetica, sans-serif; mso-hide: all;">View All Announcements</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#f9fafb" style="padding: 16px; text-align: center; font-size: 12px; color: #6b7280; font-family: Arial, Helvetica, sans-serif;">
                <p style="margin: 0;">© {{ date('Y') }} AcademiTrack. All rights reserved.</p>
                <p style="margin: 4px 0 0 0;">This is an automated message. Please do not reply directly to this email.</p>
            </td>
        </tr>
    </table>
</body>
</html>