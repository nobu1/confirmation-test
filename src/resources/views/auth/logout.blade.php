<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__h1">
                FashionablyLate
            </h1>
            <a href="/register"><button class="form__button-submit" type="submit">register</button></a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Logout</h2>
            </div>

            <form action="{{ route('logout') }}" method="post">
                @csrf 
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </main>
</body>

</html>
