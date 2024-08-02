</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        body, .wrapper, .content, .inner-body, .content-cell, .footer, .footer .content-cell {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            margin: 0;
            padding: 0;
            width: 100%;
            position: relative;
        }
        body {
            -webkit-text-size-adjust: none;
            background-color: #ffffff;
            color: #718096;
            height: 100%;
            line-height: 1.4;
        }
        .wrapper {
            background-color: #edf2f7;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }
        .content {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
        }
        .header {
            padding: 25px 0;
            text-align: center;
        }
        .header a {
            color: #3d4852;
            font-size: 19px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .header img {
            max-width: 100%;
            border: none;
            height: 75px;
            max-height: 75px;
            width: 75px;
        }
        .body {
            background-color: #edf2f7;
            border-bottom: 1px solid #edf2f7;
            border-top: 1px solid #edf2f7;
            border: hidden !important;
        }
        .inner-body {
            -premailer-width: 570px;
            background-color: #ffffff;
            border-color: #e8e5ef;
            border-radius: 2px;
            border-width: 1px;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
            margin: 0 auto;
            width: 570px;
        }
        .content-cell {
            max-width: 100vw;
            padding: 32px;
        }
        h1 {
            color: #3d4852;
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }
        p {
            font-size: 16px;
            line-height: 1.5em;
            margin-top: 0;
            text-align: left;
        }
        .footer {
            -premailer-width: 570px;
            margin: 0 auto;
            text-align: center;
            width: 570px;
        }
        .footer p {
            line-height: 1.5em;
            color: #b0adc5;
            font-size: 12px;
            text-align: center;
        }
        .button {
            -webkit-text-size-adjust: none;
            border-radius: 4px;
            color: #fff;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
            background-color: #2d3748;
            border: solid 8px #2d3748;
            padding: 5px 5px;
        }
        @media only screen and (max-width: 600px) {
            .inner-body, .footer {
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <table class="wrapper" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Email Body -->
                    <tr>
                        <td class="body" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <h1>Halo!</h1>
                                        <h4>Pesan Kontak</h4>
                                        <p><strong>Nama:</strong> {{ is_string($nama) ? $nama : 'N/A' }}</p>
                                        <p><strong>Email:</strong> {{ is_string($email) ? $email : 'N/A' }}</p>
                                        <p><strong>Telepon:</strong> {{ is_string($telepon) ? $telepon : 'N/A' }}</p>
                                        <p><strong>Pesan:</strong> {{ is_string($pesan) ? $pesan : 'N/A' }}</p>
                                        <p>Terima kasih.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

