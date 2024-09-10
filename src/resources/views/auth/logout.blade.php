<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/logout.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__h1">
                FashionablyLate
            </h1>
        </div>
    </header>

    <main>
        <div class="logout-form__content">
            <div class="logout-form__heading">
                <h2>Logout</h2>
            </div>

            <form action="{{ route('logout') }}" method="post">
                @csrf 
                <button class="form__button-logout" type="submit">ログアウト</button>
            </form>
        </div>
    </main>
</body>

</html>
