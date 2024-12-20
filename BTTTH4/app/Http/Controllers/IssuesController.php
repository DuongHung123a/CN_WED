<?php

namespace App\Http\Controllers;

use App\Models\issues;
use App\Models\computers;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = issues::with('computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('theses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            $computers = computers::all(); // Lấy danh sách sinh viên để chọn
            return view('issues.create', compact('computers'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        issues::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $issues = issues::findOrFail($id);
        $computers = computers::all();
        return view('issues.edit', compact('issues', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required',
            'status' => 'required',
        ]);
    
        // Tìm đối tượng Thesis cần cập nhật
        $thesis = issues::find($id);
        
        // Cập nhật thông tin
        $thesis->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Đồ án được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thesis = issues::findOrFail($id);
        $thesis->delete();

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được xóa thành công!');
    }
}
