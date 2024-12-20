<?php

namespace App\Http\Controllers;
use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }


    public function create()
    {
        $computers = Computer::all();
        return view('issues.create',compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer_id'=> 'required',
            'reported_by'=> 'required|max:50',
            'reported_date'=> 'required|date',
            'description'=> 'required',
            'urgency'=> 'required',
            'status'=> 'required',
        ]);
        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success','Thêm vấn đề cần xử lý thành công!');
    }
    
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.index',compact('issue','computers'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'computer_id'=> 'required',
            'reported_by'=> 'required|max:50',
            'reported_date'=> 'required|date',
            'description'=> 'required',
            'urgency'=> 'required',
            'status'=> 'required',
        ]);
        $issue = Issue::find($id);
        $issue-> update($request->all());
        return redirect()->route('issues.index')->with('success','Vấn đề đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue -> delete();
        return redirect()->route('issues.index')->with('success','Vấn đề đã được xóa thành công!');
    }
}
