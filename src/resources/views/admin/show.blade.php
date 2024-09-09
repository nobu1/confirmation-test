<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
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
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>Confirm</h2>
            </div>

            <form class="form" action="{{ route('admin.destory', $contacts->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <p>{{ $contacts->last_name }}　{{ $contacts->first_name }}</p>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                @if ($contacts->gender == 1)
                                    <p>男性</p>
                                @elseif ($contacts->gender == 2)
                                    <p>女性</p>
                                @elseif ($contacts->gender == 3)
                                    <p>その他</p>
                                @endif
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                {{ $contacts->email }}
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <p>{{ $contacts->tell }}</p>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                {{ $contacts->address }}
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                {{ $contacts->building }}
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                @if ($contacts->category->content == 'delivery')
                                    商品のお届けについて
                                @elseif ($contacts->category->content == 'replace')
                                    商品の交換について
                                @elseif ($contacts->category->content == 'trouble')
                                    商品トラブル
                                @elseif ($contacts->category->content == 'contact')
                                    ショップへのお問い合わせ
                                @elseif ($contacts->category->content == 'others')
                                    その他
                                @endif
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                {{ $contacts->detail }}"
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">削除</button>
                    <a href="/admin">閉じる</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
