<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>

<body>

    <header class="header">
        <div class="header__left">
            <h1 class="header__h1">
                FashionablyLate
            </h1>
        </div>
        <div class="header__right">
            <a href="/logout"><button class="form__button-logout" type="submit" name="logout">logout</button></a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Admin</h2>
            </div>

            
            <form class="form" action="" method="POST">
                @csrf
                <div class="form__group">
                    <div class="form__group-content">
                        <div class="form__input--search">
                            <input class="form__input-keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
                                value="{{ old('keyword') }}" />
                            <select class="form__select-gender" name="gender">
                                <option value="">性別</option>
                                <option value="">全て</option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                                <option value="3">その他</option>
                            </select>
                            <select class="form__option-categories" name="categories">
                                <option value="">お問い合わせの種類</option>
                                <option value="delivery">商品のお届けについて</option>
                                <option value="replace">商品の交換について</option>
                                <option value="trouble">商品トラブル</option>
                                <option value="contact">ショップへのお問い合わせ</option>
                                <option value="others">その他</option>
                            </select>
                            <input class="form__input-date" type="date" name="date" value="" />
                            <button class="form__button-search" type="submit" name="search">検索</button>
                            <button class="form__button-reset" type="submit" name="reset">リセット</button>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__button-content">
                        <div class="form__button--left">
                            <button class="form__button-export" type="submit" name="export">エクスポート</button>
                        </div>
                        <div class="form__button--right flex justify-center">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>

                <div class="admin-table">
                    <table class="admin-table__inner">
                        <thead class="admin-table__head">
                            <tr class="admin-table__row">
                                <th scope="col" class="admin-table__header">お名前</th>
                                <th scope="col" class="admin-table__header">性別</th>
                                <th scope="col" class="admin-table__header">メールアドレス</th>
                                <th scope="col" class="admin-table__header">お問い合わせの種類</th>
                                <th scope="col" class="admin-table__header"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="admin-table__content">
                                        {{ $contact->last_name }}　{{ $contact->first_name }}</td>
                                    <td class="admin-table__content">
                                        @if ($contact['gender'] == 1)
                                            男性
                                        @elseif ($contact['gender'] == 2)
                                            女性
                                        @elseif ($contact['gender'] == 3)
                                            その他
                                        @else
                                            <p>　</p>
                                        @endif
                                    </td>
                                    <td class="admin-table__content">{{ $contact->email }}</td>
                                    <td class="admin-table__content">
                                        @if ($contact->category->content == 'delivery')
                                            商品のお届けについて
                                        @elseif ($contact->category->content == 'replace')
                                            商品の交換について
                                        @elseif ($contact->category->content == 'trouble')
                                            商品トラブル
                                        @elseif ($contact->category->content == 'contact')
                                            ショップへのお問い合わせ
                                        @elseif ($contact->category->content == 'others')
                                            その他
                                        @else
                                            <p>　</p>
                                        @endif
                                    </td>
                                    <td class="admin-table__button">
                                        <a href="{{ route('admin.show', $contact->id) }}"><button type="button">詳細</button></a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </form>

            <!-- Modal -->
            {{-- <div class="modal fade" id="modal<?= $contact->id ?>" tabindex="-1" role="dialog" aria-labelledby="label1"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label1">ID : {{ $contact->id }} が表示されてます</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $contact->first_name }}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
</body>

</html>
