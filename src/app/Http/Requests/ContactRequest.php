<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel-1' => ['required', 'numeric', 'digits_between:1,4'],
            'tel-2' => ['required', 'numeric', 'digits_between:1,4'],
            'tel-3' => ['required', 'numeric', 'digits_between:1,4'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'categories' => ['required'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '苗字を文字列で入力してください',
            'last_name.max' => '苗字を255文字以下で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'first_name.max' => '名前を255文字以下で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'tel-1.required' => '電話番号を入力してください',
            'tel-1.numeric' => '電話番号を数値で入力してください',
            'tel-1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel-2.required' => '電話番号を入力してください',
            'tel-2.numeric' => '電話番号を数値で入力してください',
            'tel-2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel-3.required' => '電話番号を入力してください',
            'tel-3.numeric' => '電話番号を数値で入力してください',
            'tel-3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'categories.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.string' => 'お問い合わせ内容を文字列で入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}
