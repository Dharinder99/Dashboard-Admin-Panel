<?php
$copyRiteDate = date('Y');
// $logoUrl =  url('img/favicon_img.png');

?>

<body style="height: 100%;margin: 0;padding: 0;width: 100%;">
   <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background: #f7f9fa;">
      <tr style="background: #18277A;">
         <td style="padding: 30px 0;">
            <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="max-width: 600px;height: auto;">
               <tr></tr>
            </table>
         </td>
      </tr>
      <tr style="background: #18277A;">
         <td>
            <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="max-width: 600px;height: auto;">
               <tr>
                  <td style="padding: 0 15px;height: auto;">
                     <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="border-radius: 8px 8px 0 0;background: #fff;padding: 0 20px;">
                        <tr>
                           {{-- <td style="padding: 30px 30px 20px 30px; text-align: center;"><img style=" max-width: 100%; height: 75px;" src="{!!$logoUrl!!}" alt="{!!\Config('global.APP_NAME')!!}"></td> --}}
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <td>
         <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="max-width: 600px;height: auto;">
            <tr>
               <td style="padding: 0 15px;height: auto;">
                  <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="border-radius: 0 0 8px 8px;background: #fff;overflow: hidden;padding: 0 20px;">
                     <tr>
                        <td style="padding: 0 20px;">
                           <p style="margin-top:5px;font-size:14px;">Hello {!!$toUserName!!}</span>,</p>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding: 0 20px;padding-bottom: 30px;">
						   {!!$bodyText!!}
                           <!--<p style="margin-top:5px;font-size:14px;">You have requested to verify your email address. Please use the below code to verify your request.</p>
                           <p style="font-size: 24px;margin-top:5px;"><b>$otp</b></p>
                           <p style="margin-top:5px;font-size:14px;">Enter this code to complete the signup process.</p> -->
                           {{-- <p style="margin-bottom: 30px;font-size:14px;"><i>{!!\Config('global.APP_NAME')!!} Team</i></p> --}}
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </td>
      </tr>
      <tr>
         <td>
            <table valign="top" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" style="max-width: 600px;height: auto;">
               <tr>
                  <td>
                     {{-- <p style="text-align: center; padding: 30px 15px;color: #999;font-size:14px;">For help with any of our services, please email our customer support: <a href="mailto: {!!\Config('global.SUPPORT_EMAIL')!!}" style="text-decoration: underline;">{!!\Config('global.SUPPORT_EMAIL')!!}</a></p> --}}
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
</body>








