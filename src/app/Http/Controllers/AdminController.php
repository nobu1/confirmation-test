<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(7);
        return view('admin.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        // Get inputs data in the admin page
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $category = $request->input('categories');
        $inputDate = $request->input('date');

        
        // Connect Category Table
        $query = Contact::query();
        $query->join('categories', function($query) use ($request) {
            $query->on('contacts.category_id', '=', 'categories.id');
        });

        // Make query
        if (!empty($keyword)) {
            $query->where('contacts.first_name', 'LIKE', "%{$keyword}%")->
                    orwhere('contacts.last_name', 'LIKE', "%{$keyword}%")->
                    orwhere('contacts.email', 'LIKE', "%{$keyword}%");
        }
        if (!empty($gender)) {
            $query->where('contacts.gender', "{$gender}");
        }
        if (!empty($category)) {
            $query->where('categories.content', "{$category}");
        }          
        if (!empty($inputDate)) {
            $query->whereDate('contacts.created_at', "{$inputDate}");
        }


        if ($request->has('search')) {
            $contacts = $query->Paginate(7);
            return view('admin.index', compact('contacts'));

        } elseif ($request->has('reset')) {
            $contacts = Contact::Paginate(7);
            return view('admin.index', compact('contacts'));

        } elseif ($request->has('export')) {
            $csvHeader = [
                'ID','姓','名','性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類','お問い合わせ内容'
            ];
            $temps = [];
            array_push($temps, $csvHeader);

            $contacts = $query->get();
            
            foreach ($contacts as $contact) {
                $genderName = "";
                if ($contact->gender == 1) {
                    $genderName = "男性";
                } elseif ($contact->gender == 2) {
                    $genderName = "女性";
                } elseif ($contact->gender == 3) {
                    $genderName = "その他";
                }

                $temp = [
                    $contact->id,
                    $contact->last_name,
                    $contact->first_name,
                    $genderName,
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $contact->category->content,
                    $contact->detail,
                ];
                array_push($temps, $temp);
            }

            $stream = fopen('php://temp', 'r+b');
            foreach ($temps as $temp) {
                fputcsv($stream, $temp);
            }
            rewind($stream);
            $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
            $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
            $now = new Carbon();
            $filename = "お問い合わせ内容一覧（全件：" . $now->format('Y年m月d日'). "）.csv";
            $headers = array(
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename='.$filename,
            );
            return response()->make($csv, 200, $headers);
        }
    }

    public function show($id)
    {
        $contacts = Contact::find($id);
        return view('admin.show', compact('contacts'));
    }

    public function destory($contact_id)
    {
        $contacts = Contact::find($contact_id);
        $contacts->delete();
        $contacts = Contact::Paginate(7);
        
        return redirect()->route('admin.index', compact('contacts'));
    }
}
