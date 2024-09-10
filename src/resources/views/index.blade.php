<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>

            @if(session('validation_error'))
                <div class="form__error">
                    {{ session('validation_error') }}
                </div>
            @endif
            <form class="form" action="/confirm" method="POST">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input class="form__input--last-name" type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
                            <input class="form__input--first-name" type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            <input type="radio" id="man" name="gender" value="1"
                                {{ old('gender', 1) == 1 ? 'checked' : '' }} />
                            <label for="man">男性</label>
                            <input type="radio" id="woman" name="gender" value="2"
                                {{ old('gender') == 2 ? 'checked' : '' }} />
                            <label for="woman">女性</label>
                            <input type="radio" id="other" name="gender" value="3"
                                {{ old('gender') == 3 ? 'checked' : '' }} />
                            <label for="other">その他</label>
                        </div>
                        <div class="form__error">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input class="form__input--email" type="email" name="email" placeholder="例：test@example.com"
                                value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input class="form__input--tell" type="tel" name="tel-1" placeholder="090" value="{{ old('tel-1') }}" />
                            <label class="form__label--tell">-</label>
                            <input class="form__input--tell" type="tel" name="tel-2" placeholder="1234" value="{{ old('tel-2') }}" />
                            <label class="form__label--tell">-</label>
                            <input class="form__input--tell" type="tel" name="tel-3" placeholder="5678" value="{{ old('tel-3') }}" />
                        </div>
                        <div class="form__error">
                            @error('tel-1')
                                {{ $message }}
                            @enderror
                            @error('tel-2')
                                {{ $message }}
                            @enderror
                            @error('tel-3')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input class="form__input--address" type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"
                                value="{{ old('address') }}" />
                        </div>
                        <div class="form__error">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input class="form__input--building" type="text" name="building" placeholder="例：千駄ヶ谷マンション101"
                                value="{{ old('building') }}" />
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <select class="form__select--categories" name="categories">
                            <option value="">選択してください</option>
                            <option value="delivery" @if ('delivery' === old('categories')) selected @endif>商品のお届けについて
                            </option>
                            <option value="replace" @if ('replace' === old('categories')) selected @endif>商品の交換について
                            </option>
                            <option value="trouble" @if ('trouble' === old('categories')) selected @endif>商品トラブル</option>
                            <option value="contact" @if ('contact' === old('categories')) selected @endif>ショップへのお問い合わせ
                            </option>
                            <option value="others" @if ('others' === old('categories')) selected @endif>その他</option>
                        </select>
                        <div class="form__error">
                            @error('categories')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea  name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
