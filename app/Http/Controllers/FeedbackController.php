<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function detail($id)
    {
        $feedback = Feedback::find($id);
        return view('admin.feedbacks.detail',compact('feedback'));
    }

    public function delete($id)
    {
        $feedback = Feedback::find($id);
        $isDelete = $feedback->delete();

        if ($isDelete) {
            session()->flash('success', 'Xóa thành công');
        } else {
            session()->flash('error', 'Xóa thất bại');
        }
        return redirect('admin/feedback/index');
    }
}
