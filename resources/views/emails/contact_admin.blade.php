<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Eagle Networks</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <table width="700" border="0" cellspacing="0" cellpadding="0"
        style="font-family: 'Open Sans', sans-serif; font-size:14px; border:1px solid #06C;">
        <tr>
            <td align="center" style="padding:20px;">
                <img src="backend_assets/eaglenetworks-logo.png'" alt="Eagle Networks" width="fit-content"
                    height="100%" />
                <p style="margin: 20px 0;">You have a new enquiry via the contact form.</p>
            </td>
        </tr>
        <tr>
            <td style="background: #fff; padding: 20px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="10"
                    style="border-collapse: collapse; color: #333;">
                    <tr>
                        <td colspan="2" style="font-weight: bold;">Personal Details</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $details['name'] }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{ $details['email'] }}</td>
                    </tr>
                    <tr>
                        <td>Team</td>
                        <td>{{ $details['team'] }}</td>
                    </tr>
                    <tr>
                        <td>Service</td>
                        <td>{{ $details['service'] }}</td>
                    </tr>
                    <tr>
                        <td>Package</td>
                        <td>{{ $details['package'] }}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>{{ $details['message'] }}</td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
</body>

</html>
