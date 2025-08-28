<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style> .l-page { visibility: hidden; } </style>
    <link rel="preload" as="style" href="{{ asset('assets/front/page.min.css') }}" onload="this.onload=null;this.rel='stylesheet'">

    @yield('head')

    <style>
        .l-contents__in {
            background-color: #000000;
            color: #ffffff;
        }

        .join-us-section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .join-us-section .title-2 {
            font-weight: bold;
        }

        .join-us-section .c-section__content, .l-gf .c-section__content {
            width: 100%;
        }
        
        .btn-grad {
            background-image: linear-gradient(to top, #bc1a1d 0%, #d9191d 51%, #ecd0c0 100%);
            margin: 10px;
            padding: 15px 45px;
            width: fit-content;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            /*box-shadow: 0 0 20px #eee;*/
            border-radius: 30px;
            display: block;
        }

        @media (min-width: 768px) {
            .c-section {
                margin-bottom: 7.64129%;
            }
        }

        @media (max-width: 550px) {
            .p-contents-header-bg {
                background-size: 195% 60%;
                background-position: center;
                background-repeat: no-repeat;
            }
            .c-section__head {
                font-size: 4.5625vw;
            }

            .join-us-section .title-2 {
                text-align: center;
            }
        }

        #newContent {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
        }

        #stripe-payment {
            padding: 20px;
        }

        h4 {
            color: #333;
            margin-bottom: 20px;
        }

        .p-detail {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: black;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #card-element {
            height: auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }

        .alert {
            margin-top: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            border-radius: 4px;
            padding: 10px;
            display: none;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success strong {
            font-weight: bold;
        }

        .alert-success a {
            color: #0c743e;
            text-decoration: underline;
        }

        .btn_wrap {
            text-align: right;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .button-white {
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
        }

        .button-primary {
            background-color: #4CAF50;
            color: #fff;
        }

        select.form-control {
            -webkit-appearance: menulist-button;
            -moz-appearance: menulist-button;
            appearance: menulist-button;
            background-color: #fff;
            color: #333;
        }

        .l-gf {
            padding-top: 35px;
            padding-bottom: 35px;
        }
    </style>
</head>
<body>
<div class="l-page" data-page-id="index">
    <div class="l-gh"></div>
    <div class="l-contents js-contents">

        @yield('content')

    </div>
    <div class="l-dummy-scroll js-dummy-scroll"></div>
    <div class="p-contents-header-bg"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    window.mobileCheck = function() {
        let check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    };
</script>

<script src="{{ asset('landing/js/main.min.js') }}"></script>

<script src="https://js.stripe.com/v3/"></script>

@yield('page-bottom')

</body>
</html>
