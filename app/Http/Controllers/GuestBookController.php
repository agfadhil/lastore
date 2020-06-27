<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GuestBookController extends Controller
{
    public function index()
    {
        $list_feedback = DB::table('guest_book')->select('name', 'student_id', 'department', 'message')->get();
    	return view('guestBook', compact('list_feedback'));
    }

    public function save_feedback(Request $request)
    {
    	$validatedData = $request->validate([
            'inputNama' => 'required',
            'inputNIM' => 'required',
            'inputFakultas' => 'required',
        ]);
        $save_status = DB::table('guest_book')->insert(
            [
                'name' => $request->inputNama,
                'student_id' => $request->inputNIM,
                'department' => $request->inputFakultas,
                'message' => $request->inputPesan,
            ]
        );
        if ($save_status) {
            // session(['message' => 'Sukses mengirim feedback. Terima kasih banyak.']);
            $request->session()->flash('message', 'Sukses mengirim feedback. Terima kasih banyak.');
            return redirect()->route('guest-book.index');
        }
        else{
            // session(['message' => 'Gagal mengirim feedback. Silahkan coba kembali.']);
            $request->session()->flash('message', 'Gagal mengirim feedback. Silahkan coba kembali.');
            return back()->withInput();
        }
    }

    public function download_feedback(Request $request)
    {
    	# code...
    }
}
