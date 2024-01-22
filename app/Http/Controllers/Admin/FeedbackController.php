<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use Illuminate\Support\Facades\DB;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListVoucher= DB::table('feedback')
                    ->select('feedback.*');
        if(isset(request()->Key_Feedback))
        {
            $ListVoucher = $ListVoucher->where('ma_feedback', 'like', '%'.request()->Key_Feedback.'%');
            $ListVoucher = $ListVoucher->orwhere('ho_ten', 'like', '%'.request()->Key_Feedback.'%');
            $ListVoucher = $ListVoucher->orwhere('noi_dung', 'like', '%'.request()->Key_Feedback.'%');
            $ListVoucher = $ListVoucher->orwhere('email', 'like', '%'.request()->Key_Feedback.'%');
            $ListVoucher = $ListVoucher->orwhere('so_dien_thoai', 'like', '%'.request()->Key_Feedback.'%');
        }
        if(isset(request()->NameSort))
            $ListVoucher = $ListVoucher->orderBy(request()->NameSort, request()->Sort);
        $ListVoucher = $ListVoucher->latest('created_at')->paginate(5);
        return view('Admin.Feedback.Feedback', ['Data_Feedback'=> $ListVoucher,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedbackRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedbackRequest  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy( $mafeedback)
    {
        Feedback::Where('ma_feedback', $mafeedback)->delete();
        return redirect('Admin/Feedback')->with('XoaFeedback_ThanhCong', 'Xóa thành công mã Feedback: '.$mafeedback);
    }
}
