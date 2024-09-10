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

            <form class="form" action="thanks" method="POST">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['last_name'] ?? old('last_name') }}　{{ $contact['first_name'] ?? old('first_name') }}</p>
                                <input type="text" name="last_name" value="{{ $contact['last_name'] ?? old('last_name') }}" readonly
                                    hidden />
                                <input type="text" name="first_name" value="{{ $contact['first_name'] ?? old('first_name') }}" readonly
                                    hidden />
                            </td>
                            <div class="form__error">
                                @error('last_name')
                                    {{ $message }}
                                @enderror
                                @error('first_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                @if ($contact['gender'] ?? '1' == 1)
                                    <p>男性</p>
                                @elseif ($contact['gender'] == 2)
                                    <p>女性</p>
                                @elseif ($contact['gender'] == 3)
                                    <p>その他</p>
                                @else
                                    <p>　</p>
                                @endif
                                <input type="text" name="gender" value="{{ $contact['gender'] ?? old('gender') }}" readonly hidden />
                            </td>
                            <div class="form__error">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['email'] ?? old('email') }}</p>
                                <input type="email" name="email" value="{{ $contact['email'] ?? old('email') }}" readonly hidden/>
                            </td>
                            <div class="form__error">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['tel-1'] ?? old('tel-1') }}{{ $contact['tel-2'] ?? old('tel-2') }}{{ $contact['tel-3'] ?? old('tel-3') }}</p>
                                <input type="tel" name="tel-1" placeholder="090" value="{{ $contact['tel-1'] ?? old('tel-1') }}" hidden />
                                <input type="tel" name="tel-2" placeholder="1234" value="{{ $contact['tel-2'] ?? old('tel-2') }}" hidden />
                                <input type="tel" name="tel-3" placeholder="5678" value="{{ $contact['tel-3'] ?? old('tel-3') }}" hidden />
                                <input type="tel" name="tell"
                                    value="{{ $contact['tel-1'] ?? old('tel-1') }}{{ $contact['tel-2'] ?? old('tel-2') }}{{ $contact['tel-3'] ?? old('tel-3') }}" readonly
                                    hidden />
                            </td>
                            <div class="form__error">
                                @error('tell')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['address'] ?? old('address') }}</p>
                                <input type="text" name="address" value="{{ $contact['address'] ?? old('address') }}" readonly hidden />
                            </td>
                            <div class="form__error">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['building'] ?? old('building') }}</p>
                                <input type="text" name="building" value="{{ $contact['building'] ?? old('building') }}" readonly hidden />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                @if ($contact['categories'] ?? 'delivery' == 'delivery')
                                    <p>商品のお届けについて</p>
                                @elseif ($contact['categories'] == 'replace')
                                    <p>商品の交換について</p>
                                @elseif ($contact['categories'] == 'trouble')
                                    <p>商品トラブル</p>
                                @elseif ($contact['categories'] == 'contact')
                                    <p>ショップへのお問い合わせ</p>
                                @elseif ($contact['categories'] == 'others')
                                    <p>その他</p>
                                @endif
                                <input type="text" name="categories" value="{{ $contact['categories'] ?? old('categories') }}" readonly
                                    hidden />
                            </td>
                            <div class="form__error">
                                @error('categories')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['detail'] ?? old('detail') }}</p>
                                <input type="text" name="detail" value="{{ $contact['detail'] ?? old('detail') }}" readonly hidden />
                            </td>
                            <div class="form__error">
                                @error('detail')
                                    {{ $message }}
                                @enderror
                            </div>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                    <button class="form__button-submit-fix" type="submit" name="fix">修正</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
